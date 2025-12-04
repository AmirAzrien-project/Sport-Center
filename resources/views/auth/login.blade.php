<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sport Centre Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-image: url('/images/bg.jpg');
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background-repeat: no-repeat; 
            background-attachment: fixed; 
            background-size: cover; 
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            border-radius: 5px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }

        .btn-secondary:hover {
            background-color: #565e64;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        
        <hr>
        <div class="text-center">
            <p>Don't have an account?</p>
            <a href="{{ route('register') }}" class="btn btn-secondary btn-block">Register</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>