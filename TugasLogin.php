<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UTS Pemrograman Web</title>
  <style>
    body, html {
      height: 100%;
      margin: 0;
    }
    .container-center {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      height: 100%;
    }
    p {
      justify-content: center;
      width: 320px;
      height: 50px;
      padding: 10px;
      border: 5px solid gray;
      margin: 10px 0;
      overflow: auto;
      display: flex;
      align-items: center;
      text-align: center;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-center">
  <p>Username: user <br> Password: user</p>
  <div class="container text-center">
    <img src="login.jpeg" alt="LOGIN" width="250" height="50">
    <h1 class="display-1">LOGIN</h1>
    <?php
    $errorMessage = '';
    $successMessage = ''; 
    $expectedUsername = 'user';
    $expectedPassword = 'user';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $inputUsername = $_POST["username"];
      $inputPassword = $_POST["password"];

      if ($inputUsername === $expectedUsername && $inputPassword === $expectedPassword) {
        header("Location: Assets dan HTML/Tugas Profil.html");
        exit();
      } else {
        $errorMessage = "Username atau password salah!";
      }
    }
    ?>
    <form method="post" id="loginForm">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
      <?php if (!empty($errorMessage)): ?>
        <div class="alert alert-danger mt-3" id="errorMessage"><?php echo $errorMessage; ?></div>
      <?php elseif (!empty($successMessage)): ?>
        <div class="alert alert-success mt-3"><?php echo $successMessage; ?></div>
      <?php endif; ?>
    </form>
  </div>
</div>

<script>
  document.getElementById('loginForm').addEventListener('submit', function(event) {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username !== '<?php echo $expectedUsername; ?>' || password !== '<?php echo $expectedPassword; ?>') {
      event.preventDefault();
      document.getElementById('errorMessage').innerText = 'Username atau password salah!';
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
