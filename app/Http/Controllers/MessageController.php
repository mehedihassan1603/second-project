<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function Errors(){
        $messages = Message::all();
        return view('message.errors', compact('messages'));
    }
    public function AddError(){
        return view('message.add_error');
    }

    public function PostError(Request $request){
        $validatedData = $request->validate([
            'error_message' => 'required|string',
            'solution' => 'required',
            'error_screenshot' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('error_screenshot');

        if ($image) {
            $img_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $img_name);
            $img_url = '/img/' . $img_name;
        } else {
            $img_url = null;
        }

        $message = Message::create([
            'error_message' => $validatedData['error_message'],
            'solution' => $validatedData['solution'],
            'error_screenshot' => $img_url,
        ]);
        return redirect('/')->with('success', 'Error info submitted successfully!');
    }

    public function ErrorEdit($id)
    {
        $message = Message::findOrFail($id);
        return view('message.edit_error', compact('message'));
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $imagePath = public_path($message->error_screenshot);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $message->delete();

        return redirect('/')->with('success', 'Error deleted successfully');
    }

    public function UpdateError(Request $request)
{
    $id = $request->error_id;
    $message = Message::findOrFail($id);

    $request->validate([
        'error_message' => 'required',
        'solution' => 'required',
        'error_screenshot' => 'image|nullable|max:1999'
    ]);

    $updateData = [
        'error_message' => $request->error_message,
        'solution' => $request->solution,
    ];

    if ($request->hasFile('error_screenshot')) {
        if ($message->error_screenshot) {
            $oldImagePath = public_path($message->error_screenshot);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $image = $request->file('error_screenshot');
        $img_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img'), $img_name);
        $updateData['error_screenshot'] = '/img/' . $img_name;
    }
    $message->update($updateData);

    return redirect('/')->with('success', 'Error Updated successfully');
}

}
