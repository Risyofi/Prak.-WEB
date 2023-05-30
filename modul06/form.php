<html>
    <head>
        <title>Data Barang</title>
    </head>
    <body>
        <center>
            <h3>Masukkan Data Barang :</h3>
            <form action="form.php" method='POST'>
                <table border='0' width='30%'>
                    <tr>
                        <td width='25%'>Kode Barang</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type="text" name='kode_barang' size='10'></td>
                    </tr>
                    <tr>
                        <td width='25%'>Nama Barang</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type="text" name='nama_barang' size='30'></td>
                    </tr>
                    <tr>
                        <td width='25%'>Gudang</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'gudangdb');
                            $sql = "SELECT * FROM gudang";
                            $retval = mysqli_query($conn, $sql);
                            echo "<select name='kode_gudang'>";
                            while ($row = mysqli_fetch_array($retval)) {
                                echo "<option value='$row[kode_gudang]'>$row[nama_gudang]</option>";
                            }
                            echo "</select>";
                            ?>
                        </td>
                    </tr>
                </table>
                <input type="submit" value='Masukkan' name='submit'>
            </form>
            <?php
            error_reporting(E_ALL ^ E_NOTICE);
            $conn = mysqli_connect('localhost', 'root', '', 'gudangdb');
            $kode_barang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $kode_gudang = $_POST['kode_gudang'];
            $submit = $_POST['submit'];
            if ($submit) {
                $input = "INSERT INTO barang (kode_barang, nama_barang, kode_gudang) VALUES ('$kode_barang', '$nama_barang', '$kode_gudang')";
                if (mysqli_query($conn, $input)) {
                    echo "<br>Data berhasil dimasukkan.";
                } else {
                    echo "Error: " . $input . "<br>" . mysqli_error($conn);
                }
            }
            ?>
            <hr>
            <h3>Data Barang</h3>
            <table border='1' width='50%'>
            <tr>
                <td align='center' width='20%'><b>Kode Barang</b></td>
                <td align='center' width='30%'><b>Nama Barang</b></td>
                <td align='center' width='10%'><b>Lokasi Gudang</b></td>
            </tr>
            <?php
            $cari = "SELECT barang.kode_barang, barang.nama_barang, gudang.lokasi FROM barang JOIN gudang ON barang.kode_gudang = gudang.kode_gudang";
            $hasil_cari = mysqli_query($conn, $cari);
            while ($data = mysqli_fetch_row($hasil_cari)) {
                echo"
                <tr>
                <td width='20%'>$data[0]</td>
                <td width='30%'>$data[1]</td>
                <td width='10%'>$data[2]</td>
                </tr>";
            }
            ?> 
            </table>
        </center>                
    </body>
</html>

