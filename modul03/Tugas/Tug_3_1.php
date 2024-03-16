<html>
<head>
    <title>Program Penjumlahan</title>
</head>

<body>
    <form method="POST" action="tugas_3_1.php">
        <label for="nilaiA">Nilai A adalah : </label>
        <input type="number" id="nilaiA" name="nilaiA">
        <br><br>
        <label for="nilaiB">Nilai B adalah : </label>
        <input type="number" id="nilaiB" name="nilaiB">
        <br><br>
        <input type="submit" value="Jumlahkan" name="submit">
    </form>
    <?php
    error_reporting(E_ALL^E_NOTICE);
    if(isset($_POST['submit'])) {
        $nilaiA = intval($_POST['nilaiA']);
        $nilaiB = intval($_POST['nilaiB']);
        $sum = $nilaiA + $nilaiB;
        echo "Nilai A adalah $nilaiA </br>";
        echo "Nilai B adalah $nilaiB </br>";
        echo "Jadi Nilai A ditambah Nilai B adalah $sum";
    }
    ?>
</body>
</html>
