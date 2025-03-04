<html>
<head>
	<title>Add Product</title>
</head>

<body>

	<a href="index.php">Go to Home</a>
	<br/><br/>


	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Produk</td>
				<td><input type="text" name="nama_produk"></td>
			</tr>

			<tr> 
				<td>Kategori Produk</td>
				<td><input type="text" name="kategori_produk"></td>
			</tr>

			<tr> 
				<td>Harga</td>
				<td><input type="text" name="harga"></td>
			</tr>

			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>

	<?php
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {

		$nama_produk = $_POST['nama_produk'];
		$kategori_produk = $_POST['kategori_produk'];
		$harga = $_POST['harga'];
	
		// include database connection file
		include_once("config.php");

		// Insert user data into table
		$result = mysqli_query($conn, "INSERT INTO produk(nama_produk,kategori_produk,harga) VALUES('$nama_produk','$kategori_produk','$harga')");

		// Show message when user added
		echo "Product added successfully. <a href='index.php'>View Products</a>";
	}
	?>
</body>
</html>