<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <?php
    $conn= mysqli_connect('localhost', 'root', '','stok_gudang')
    ?>
</head>
<body>
    <center>
        <h3>masukkan data :</h3>
        <table>
            <form action="" method="post">
                <tr>
                <td>kdoe barang</td>
                <td><input type="text" name="kb"></td>
                </tr>
                <tr>
                <td>nama barang</td>
                <td><input type="text" name="nb"></td>
                </tr>
                <tr>
                <td>GUDANG :</td>
                <td>
                <?php echo "<select name='kg' >"; ?>
                <?php
                    $sql = "select * from gudang";
                    $retval = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($retval)){
                        echo "<option value='$row[kode_gudang]'>$row[nama_gudang]</option>";
                    }
                ?>
                <?php echo "</select>"; ?>
                </td>
                </tr>
                <tr>
                    <input type="submit" name='submit' value="Masukkan">

                </tr>
            </form>
        </table>
        <br><br>
        <hr>
<h3>Data Barang</h3>
<table border='1' width='50%'>
    <tr>
        <td>kode barang</td>
        <td>nama barang</td>
        <td>lokasi</td>
    </tr>
    <!-- tampilkan data -->
<?php
$cari= "SELECT kode_barang, nama_barang, lokasi from barang, gudang where barang.kode_gudang=gudang.kode_gudang";
$hasil_cari=mysqli_query($conn,$cari);
while($data=mysqli_fetch_row($hasil_cari)){ echo"
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


<!-- kirim barang -->
<?php
error_reporting(0);
$kb = $_POST["kb"];
$nb = $_POST["nb"];
$kg = $_POST["kg"];
$submit = $_POST["submit"];
echo "$kb $nb $kg";
$input= "insert into barang (kode_barang, nama_barang, kode_gudang) values ('$kb', '$nb', '$kg') ";
if($submit){
    mysqli_query($conn,$input);
echo"</br>Data berhasil dimasukkan";
header("Refresh:0; url=index.php");
}
?>


