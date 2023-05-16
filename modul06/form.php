<html>
    <head>
        <title>Data Mahasiswa</title>
    </head>
    <?php
    $conn = mysqli_connect{'localhost', 'root', '', 'informatika'};
    ?>
    <body>
        <center>
            <h3>Masukkan Data Mahasiswa :</h3>
            <table border='0' width='30%'>
                <form action="form.php" method='POST'>
                    <tr>
                        <td width='25%'>NIM</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type="text" name='nim' size='10'></td>
                    </tr>
                    <tr>
                        <td width='25%'>Nama</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type="text" name='nama' size='10'></td>
                    </tr>
                    <tr>
                        <td width='25%'>Kelas</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type="radio" value='A' checked name='kelas'>A</td>
                    </tr>
                </form>
            </table>
        </center>
    </body>
</html>