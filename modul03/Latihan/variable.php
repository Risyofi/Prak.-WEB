<!DOCTYPE html>
<html>
    <head>
        <title>Variable</title>
    </head>
    <body>
        <h1>Buku Tamu</h1>
        <form action="variable.php" method="POST">
            <p>Nama  : <input type="text" name="nama" size="20"></p>
            <p>Email : <input type="text" name="email" size="30"></p>
            <p>Komentar : <textarea name="komentar" cols="30" rows="3"></textarea></p>
            <p><input type="submit" value="Kirim" name="submit"></p>
        </form>
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $komentar = $_POST['komentar'];
            
            echo "<br>Nama : $nama";
            echo "<br>Email : $email";
            echo "<br>Komentar : $komentar";
        }
        ?>
    </body>
</html>
