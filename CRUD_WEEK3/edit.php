<?php

// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))

{	
	$id = $_POST['id_produk'];
	$nama_produk=$_POST['nama_produk'];
	$kategori_produk=$_POST['kategori_produk'];
	$harga=$_POST['harga'];		

	// update user data
	$result = mysqli_query($conn, "UPDATE produk SET nama_produk='$nama_produk',harga='$harga',kategori_produk='$kategori_produk' WHERE id_produk=$id");

	// Redirect to homepage to display updated user in list
	header("Location: index.php");

}

?>

<?php

// Display selected user data based on id
// Getting id from url
$id = $_GET['id_produk']; 

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk=$id");
while($produk_data = mysqli_fetch_array($result))

{
	$nama_produk = $produk_data['nama_produk'];
	$kategori_produk = $produk_data['kategori_produk'];
	$harga = $produk_data['harga'];

}
?>

<html>
<head>	
	<title>Edit Product Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nama Produk</td>
				<td><input type="text" name="nama_produk" value="<?php echo $nama_produk; ?>"></td>
			</tr>

			<tr> 
				<td>Kategori Produk</td>
				<td><input type="text" name="kategori_produk" value="<?php echo $kategori_produk;?>"    ></td>
			</tr>

			<tr> 
				<td>Harga</td>
				<td><input type="text" name="harga" value=<?php echo $harga;?>></td>

			</tr>

			<tr>
				<td><input type="hidden" name="id_produk" value=<?php echo $_GET['id_produk'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>