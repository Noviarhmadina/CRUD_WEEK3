<?php

// Create database connection using config file

include_once("config.php");

// Fetch all users data from database

$result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");

?>

<html>
<head>    
    <title>Homepage</title>
</head>
<body>
<h1 style="text-align: center;">List Produk Toko Nopi Gemas</h1>
<a href="add.php" style="text-align: center">Add New Product</a><br/><br/>
    <table width='80%' border=1>
    <tr>
        <th>No</th> <th>Nama Produk</th> <th>Kategori</th> <th>Harga</th> <th>Action</th>
    </tr>
    <?php  
    $counter=1;
    while($produk_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$counter."</td>";
        echo "<td>".$produk_data['nama_produk']."</td>";
        echo "<td>".$produk_data['kategori_produk']."</td>";
        echo "<td>Rp ".number_format($produk_data['harga'], 0, ',', '.')."</td>";
        echo "<td><a href='edit.php?id_produk=$produk_data[id_produk]'>Edit</a> | <a href='delete.php?id_produk=$produk_data[id_produk]'>Delete</a></td></tr>";
        $counter++;     
    }
    ?>
    </table>

</body>

</html>