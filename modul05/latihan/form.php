<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

<?php
    $conn = mysqli_connect('localhost', 'root', '', 'informatika')
?>
<body>
    <center>
        <h3>Masukkan Data Mahasiswa :</h3>
        <table border='0' width='30%'>
            <form action="form.php" method='POST'>
                <tr>
                    <td width='25%'>NIM</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <input type="text" name='nim' size='10'>
                    </td>
                </tr>
                
                <tr>
                    <td width='25%'>Nama</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <input type="text" name='nama' size='30'>
                    </td>
                </tr>

                <tr>
                    <td width='25%'>Kelas</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <input type="radio" name='kelas' value='A' checked>A
                        <input type="radio" name='kelas' value='B'>B
                        <input type="radio" name='kelas' value='C'>C
                    </td>
                </tr>
                
                <tr>
                    <td width='25%'>Alamat</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <input type="text" name='alamat' size='40'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value='Masukkan' name='submit'>
                    </td>
                </tr>
            </form>
        </table>
        <?php
            error_reporting(E_ALL ^ E_NOTICE);

            if(isset($_POST['submit'])) {
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $kelas = $_POST['kelas'];
                $alamat = $_POST['alamat'];
                $submit = $_POST['submit'];
                
                $check_query = "SELECT COUNT(*) FROM mahasiswa WHERE nim='$nim'";
                $check_result = mysqli_query($conn, $check_query);
                $count = mysqli_fetch_array($check_result)[0];

                if($count > 0) {
                    echo "</br>NIM sudah ada dalam database.";
                } else {
                    $input = "INSERT INTO mahasiswa (nim, nama, kelas, alamat) VALUES ('$nim', '$nama', '$kelas', '$alamat')";
                    
                    if($nim == '') {
                        echo "</br>Nama tidak boleh kosong, diisi dulu";
                    } elseif ($alamat == '') {
                        echo "</br>Alamat tidak boleh kosong, diisi dulu";
                    } else {
                        mysqli_query($conn, $input);
                        echo "</br>Data berhasil dimasukkan";
                    }
                }
                
                /*
                $input = "insert into mahasiswa (nim, nama, kelas, alamat) values ('$nim', '$nama', '$kelas', '$alamat')";

                if($nim =='') {
                    echo "</br>Nama tidak boleh kosong, diisi dulu";
                } elseif ($alamat == '') {
                    echo "</br>Alamat tidak boleh kosong, diisi dulu";
                } else {
                    mysqli_query($conn, $input);
                    echo "</br>Data berhasil dimasukkan";
                }
                */
            }

            if(isset($_GET['delete'])) {
                $nim_to_delete = $_GET['delete'];
                $delete_query = "DELETE FROM mahasiswa WHERE nim='$nim_to_delete'";
                mysqli_query($conn, $delete_query);
                echo "</br>Data berhasil dihapus";
            }
            ?>

            <hr>
            <h3>Data Mahasiswa</h3>
            <table border='1' width='50%'>
                <tr>
                    <td align="center" width='20%'>
                        <b>NIM</b>
                    </td>
                    <td align="center" width='30%'>
                        <b>Nama</b>
                    </td>
                    <td align="center" width='10%'>
                        <b>Kelas</b>
                    </td>
                    <td align="center" width='30%'>
                        <b>Alamat</b>
                    </td>
                    <td align="center" width='10%'>
                        <b>Action</b>
                    </td>
                    
                </tr>

                <?php
                    $cari = "select * from mahasiswa order by nim";
                    $hasil_cari = mysqli_query($conn, $cari);
                    while($data = mysqli_fetch_row($hasil_cari)) {
                        echo "
                            <tr>
                                <td width='20%'>$data[0]</td>
                                <td width='30%'>$data[1]</td>
                                <td width='10%'>$data[2]</td>
                                <td width='30%'>$data[3]</td>
                                <td width='10%'>
                                    <a href='edit.php?nim=$data[0]'>Edit</a>
                                    <a href='form.php?delete=$data[0]'>Delete</a>
                                </td>

                            </tr>";
                    }
                ?>
            </table>
    </center>
</body>
</html>