<html>
<head>
    <title>Angka Ganjil atau Genap</title>
</head>

<body>
    <form action="tugas_3_2.php" method="POST">
        <label for="angka">Masukkan angka : </label>
        <input type="number" name="angka" id="angka">
        <br><br>
        <input type="submit" value="kirim" name="submit">
    </form>

    <?php
    error_reporting(E_ALL^E_NOTICE);
    if(isset($_POST['submit'])) {
        $angka = intval($_POST['angka']);
        if($angka % 2 == 0){
            echo "$angka adalah bilangan genap";
        } else{
            echo "$angka adalah bilangan ganjil";
        }
    }
    ?>
</body>
</html>
