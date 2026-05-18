<!DOCTYPE html>
<html>
<head>
    <title>Soccer Player System</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
            background: #f4f4f4;
        }
        header, footer {
            background: #222;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        .card {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<header>
    <h1>⚽ Soccer Player List</h1>
</header>

<div class="container">
    @yield('content')
</div>

<footer>
    <p>© 2026 Soccer System</p>
</footer>

</body>
</html>