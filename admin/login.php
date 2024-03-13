<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .login-form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-top: 50px;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <form class="login-form" action="function.php" method="post">
          <h2 class="text-center mb-4">Login</h2>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control"  name="username" placeholder="Enter username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name = "login">Login</button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
