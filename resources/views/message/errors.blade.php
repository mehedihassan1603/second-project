@extends('layouts.template')

@section('title', 'Error')

@section('content')
@if (session('success'))
<p class="text-success">
    {{ session('success') }}
</p>
@endif

<div class="container mt-5">
<h2 class="mb-4">Error Messages</h2>
<table id="messagesTable" class="display">
    <thead>
        <tr>
            <th>Serial</th>
            <th>Error Message</th>
            <th>Solution</th>
            <th>Screenshot</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($messages as $key => $message)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $message->error_message }}</td>
                <td>{{ $message->solution }}</td>
                <td>
                    @if ($message->error_screenshot)
                        <a href="{{ asset($message->error_screenshot) }}"
                            data-lightbox="screenshot-{{ $message->id }}" data-title="Error Screenshot">
                            <img src="{{ asset($message->error_screenshot) }}" width="100px" alt="Screenshot">
                        </a>
                    @else
                        No Screenshot
                    @endif
                </td>
                <td>
                    <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                        <a href="{{ route('error_edit', $message->id) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('error_destroy', $message->id) }}"
                            class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
