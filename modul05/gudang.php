<html>
    <head>
        <title>Data Gudang</title>
    </head>
    <body>
        <center>
            <h3>Masukkan Data Gudang :</h3>
            <form action="gudang.php" method='POST'>
                <table border='0' width='30%'>
                    <tr>
                        <td width='25%'>Kode Gudang</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type="text" name='kode_gudang' size='10'></td>
                    </tr>
                    <tr>
                        <td width='25%'>Nama Gudang</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type="text" name='nama_gudang' size='30'></td>
                    </tr>
                    <tr>
                        <td width='25%'>Lokasi</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type="text" name='lokasi' size='30'></td>
                    </tr>
                </table>
                <input type="submit" value='Masukkan' name='submit'>
            </form>
            <?php
            error_reporting(E_ALL ^ E_NOTICE);
            $conn = mysqli_connect('localhost', 'root', '', 'gudangdb');
            $kode_gudang = $_POST['kode_gudang'];
            $nama_gudang = $_POST['nama_gudang'];
            $lokasi = $_POST['lokasi'];
            $submit = $_POST['submit'];
            if ($submit) {
                $input = "INSERT INTO gudang (kode_gudang, nama_gudang, lokasi) VALUES ('$kode_gudang', 
                '$nama_gudang', '$lokasi')";
                if (mysqli_query($conn, $input)) {
                    echo "<br>Data berhasil dimasukkan.";
                } else {
                    echo "Error: " . $input . "<br>" . mysqli_error($conn);
                }
            }

            
            if (isset($_POST['delete_submit'])) {
                $delete_kode_gudang = $_POST['delete_kode_gudang'];
                $delete_query = "DELETE FROM gudang WHERE kode_gudang='$delete_kode_gudang'";
                if (mysqli_query($conn, $delete_query)) {
                    echo "<br>Data berhasil dihapus.";
                } else {
                    echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
                }
            }

            ?>
            <hr>
            <h3>Data Gudang</h3>
            <table border='1' width='50%'>
            <tr>
                <td align='center' width='20%'><b>Kode Gudang</b></td>
                <td align='center' width='30%'><b>Nama Gudang</b></td>
                <td align='center' width='10%'><b>Lokasi</b></td>
                <td align='center' width='10%'><b>Keterangan</b></td>
            </tr>
            <?php
            $cari = "SELECT * FROM gudang";
            $hasil_cari = mysqli_query($conn, $cari);
            while ($data = mysqli_fetch_row($hasil_cari)) {
                echo"
                <tr>
                    <td width='20%'>$data[0]</td>
                    <td width='30%'>$data[1]</td>
                    <td width='10%'>$data[2]</td>
                    <td>
                        <form action='gudang_update.php' method='GET'>
                        <input type='hidden' name='kode_gudang' value='$data[0]'>
                        <input type='submit' value='Edit'>
                    </form>
                    <form action='gudang.php' method='POST'>
                        <input type='hidden' name='delete_kode_gudang' value='$data[0]'>
                        <input type='submit' name='delete_submit' value='Delete'>
                    </form>
                    </td>
                </tr>";
                }
            ?> 
            </table>
        </center>                
    </body>
</html>

