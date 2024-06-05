<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit Error</title>
    <style>
        .teacher-img-flex{
                display: flex;
                justify-content: space-around;
            }

            .current-image h5,
            .upload-new-image h5 {
                font-size: 1.1rem;
            }

            .img-thumbnail {
                border: 1px solid #ddd;
                padding: 4px;
                border-radius: 4px;
            }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Edit Error Form</h2>
        <form action="{{ route('update-error') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $message->id }}" name="error_id">
            <div class="form-group">
                <label for="error_message">Error Message</label>
                <textarea class="form-control" id="error_message" name="error_message" rows="3" required>{{ $message->error_message }}</textarea>
            </div>
            <div class="form-group">
                <label for="solution">Solution</label>
                <textarea class="form-control" id="solution" name="solution" rows="3" required>{{ $message->solution }}</textarea>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="d-block">Error Screenshot <span>(max:2MB)</span></label>
                    <div class="teacher-img-flex">
                        <div class="current-image">
                            <h6>Current Image:</h6>
                            <img src="{{ $message->error_screenshot }}" alt="No Image" width="100px"
                                class="mb-2 img-thumbnail">
                        </div>
                        <div class="upload-new-image mt-3">
                            <h6>Upload New Image:</h6>
                            <input id="error_screenshot" type="file" name="error_screenshot"
                                class="form-control-file">
                        </div>
                    </div>

                    @error('error_screenshot')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
