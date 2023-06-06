<?php

// Koneksi ke database

$servername = "localhost";

$username = "username";

$password = "password";

$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi

if ($conn->connect_error) {

    die("Koneksi gagal: " . $conn->connect_error);

}

// Mendefinisikan variabel kosong untuk menyimpan pesan error

$error = "";

// Cek apakah form sign up telah disubmit

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form

    $username = $_POST["username"];

    $password = $_POST["password"];

    // Enkripsi password menggunakan bcrypt

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Query untuk insert data ke tabel

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {

        // Registrasi berhasil, redirect ke halaman login

        header("Location: login.php");

        exit;

    } else {

        $error = "Error: " . $sql . "<br>" . $conn->error;

    }

}

$conn->close();

?>

<!DOCTYPE html>

<html>

<head>

    <title>Sign Up</title>

</head>

<body>

    <h2>Sign Up</h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="username">Username:</label>

        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>

        <input type="password" name="password" required><br><br>

        <input type="submit" value="Sign Up">

    </form>

    <?php echo $error; ?>

</body>

</html>

