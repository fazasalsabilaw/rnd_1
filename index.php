<!DOCTYPE html>
<html>
<head>
	<title>RnD Pertemuan Pertama - Membuat CRUD Dengan PHP Dan MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="judul">		
		<h1>Creating CRUD with PHP Dan MySQL</h1>
		<h2>Displays Data From Database</h2>
		<h3>8st April, 2021 - RnD First Meeting</h3>
		<h4>Alhamdulillah Ramadhan Ngabuburit</h4>
		<h5>Faza Salsabilawahyu - A020022</h5>
	</div>
	<br/>
 
	<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data has been inputted.";
		}else if($pesan == "update"){
			echo "Data has been updated.";
		}else if($pesan == "hapus"){
			echo "Data has been removed.";
		}
	}
	?>
	<br/>
	<a class="tombol" href="input.php">+ Input a New Data</a>
 
	<h3>User Data</h3>
	<table border="1" class="table">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Address</th>
			<th>Job</th>
			<th>Option</th>		
		</tr>
		<?php 
		include "koneksi.php";
		$sql = "SELECT * FROM user";
		$query_mysql = mysqli_query($host, $sql)or die(mysqli_error());
		$nomor = 1;
		while($data = mysqli_fetch_array($query_mysql)){
		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td><?php echo $data['pekerjaan']; ?></td>
			<td>
				<a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
				<a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Remove</a>					
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>