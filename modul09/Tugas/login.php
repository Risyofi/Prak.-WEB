<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <form method="post" action="proses_login.php">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Submit">
        <p>Don't have an account? <a href="sign_up.php">Sign Up</a></p>
      </div>
    </form>
  </div>
  <footer class="footer">
    <p align="center">&copy; <?php echo date('Y'); ?> L200210021</p>
  </footer>
</body>
</html>
