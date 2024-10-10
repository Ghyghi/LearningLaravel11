<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>ToDoApp Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 500px;
            margin: auto;
        }
        h1 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #28a745;
            text-align: center;
        }
        .form-group label {
            font-weight: bold;
            color: #555;
        }
        .alert-danger {
            border-radius: 5px;
            background-color: #f8d7da;
            color: #721c24;
            margin-top: 0.5rem;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-block {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container py-md-5">
        <h1>Register to the system</h1>
        <div class="row align-items-center">
            <div class="col-lg-12 py-3 py-md-5">
                <form action="/register" method="POST" id="registration-form">
                    @csrf
                    <div class="form-group">
                        <label for="name-register" class="text-muted mb-1"><small>Username</small></label>
                        <input value='{{old('name')}}' name="name" id="name-register" class="form-control" type="text" placeholder="Pick a name" autocomplete="off" />
                        @error('name')
                            <p class="m-0 small alert-danger shadow-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
                        <input value='{{old('email')}}' name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
                        @error('email')
                            <p class="m-0 small alert-danger shadow-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
                        <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
                        @error('password')
                            <p class="m-0 small alert-danger shadow-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
                        <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
                        @error('password_confirmation')
                            <p class="m-0 small alert-danger shadow-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Sign up for ToDo</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
