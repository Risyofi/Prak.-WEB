<html>
    <head>
        <title>Program Penjumlahan</title>
    </head>

    <body>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="nilaiA">Nilai A adalah : </label>
            <input type="number" id="nilaiA" name="nilaiA">
            <br><br>
            <label for="nilaiB">Nilai B adalah : </label>
            <input type="number" id="nilaiB" name="nilaiB">
            <br><br>
            <input type="submit" value="Jumlahkan" name="submit">
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nilaiA = $_POST['nilaiA'];
            $nilaiB = $_POST['nilaiB'];
            $jumlahkan = $_POST['submit'];
            if($jumlahkan){
                $sum = $nilaiA + $nilaiB;
                echo "Nilai A adalah $nilaiA </br>";
                echo "Nilai B adalah $nilaiB </br>";
                echo "Jadi Nilai A ditambah Nilai B adalah $sum";
            }
        }
        ?>
    </body>
</html>


