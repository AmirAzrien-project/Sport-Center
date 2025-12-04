<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Centre Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(to right, #ececec, #ffffff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .hero {
            padding: 50px 0;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #555;
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

        .image-container {
            margin-top: 50px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="hero">
            <h1>Welcome to Sport Centre Management System</h1>
            <p>Manage your sport center bookings with ease and efficiency.</p>
            <a href="{{ route('login') }}" class="btn btn-primary">Next</a>
        </div>
        <div class="image-container">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>