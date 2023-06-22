<!DOCTYPE html>
<html>
<head>
    <title>Generate Schedule</title>
    <!-- Add Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Customize additional styles here */
        body {
            background-color: #f8f9fa;
            padding: 40px;
        }
        .container {
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        h1 {
            color: #343a40;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        p {
            color: #6c757d;
            font-size: 18px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to the tournament Results</h1>
                <p>Click the button below for leagues details and their results.</p>
                <a href="{{ route('results') }}" class="btn btn-primary btn-lg">Matches & Results</a>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
