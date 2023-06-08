<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <form method="post" action="proses_sign_up.php">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
      </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama">
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select id="status" name="status">
          <option value="Member">Member</option>
          <option value="Administrator">Administrator</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Sign Up">
      </div>
    </form>
  </div>
  <footer class="footer">
    <p align="center">&copy; <?php echo date('Y'); ?> L200210021</p>
  </footer>
</body>
</html>
