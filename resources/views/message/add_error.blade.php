@extends('layouts.template')

@section('title', 'Add-Error')

@section('content')
<h2 class="my-4">Submit Error Form</h2>
        <form action="{{ route('post-errors') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="error_message">Error Message</label>
                <textarea class="form-control" id="error_message" name="error_message" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="solution">Solution</label>
                <textarea class="form-control" id="solution" name="solution" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="error_screenshot">Error Screenshot</label>
                <input type="file" class="form-control-file" id="error_screenshot" name="error_screenshot" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

@endsection
