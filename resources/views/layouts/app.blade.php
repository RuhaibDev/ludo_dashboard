<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel Dashboard') }}</title>
  <!-- Bootstrap CSS CDN for quick styling -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f0f8ff; /* light blueish background */
    }
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .btn-primary {
      background-color: #3490dc;
      border: none;
    }
    .btn-primary:hover {
      background-color: #2779bd;
    }
    .link-primary {
      color: #3490dc;
    }
    .link-primary:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
  
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
