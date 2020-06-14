<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container">
        <a href="https://github.com/chrix95/google-sheets-project">GitHub</a>
        <h1>Google Sheets</h1>
        <div class="row">
            <div class="col-sm">
                <form action="{{ route('sheet.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">Name</label>
                        <input name="firstname" type="text" class="form-control" id="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Name</label>
                        <input name="lastname" type="text" class="form-control" id="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input name="age" type="number" min="1" class="form-control" id="age" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input name="location" type="text" min="1" class="form-control" id="location" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="col-sm">
                <div class="list-group mt-3">
                    @foreach($users as $user)
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">
                                    <strong>Name: </strong>{{ data_get($user, 'firstName') . ' ' . data_get($user, 'lastName') }}
                                </h5>
                                <span style="float: right">({{ data_get($user, 'age') }})</span>
                            </div>
                            <p class="mb-1">
                                <strong>Email: </strong>{{ data_get($user, 'email') }}
                            </p>
                            <small>
                                <strong>Location: </strong>{{ data_get($user, 'location') }}
                            </small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>