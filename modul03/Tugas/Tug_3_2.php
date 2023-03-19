<html>
    <head>
        <title>Angka Ganjil atau Genap</title>
    </head>

    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="angka">Masukkan angka : </label>
            <input type="number" name="angka" id="angka">
            <br><br>
            <input type="submit" value="kirim" name="submit">
        </form>

        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $angka = $_POST['angka'];
            $submit = $_POST['submit'];
            if($submit){
                if($angka % 2 == 0){
                    echo "$angka adalah bilangan genap";
                } else{
                    echo "$angka adalah bilangan ganjil";
                }
            }
        }
        ?>
    </body>
</html>