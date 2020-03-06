<!-- Halaman ini adalah tampilan tabel user yang ditangkap dari tabel user pada database -->
<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center><h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1></center>
	<center><?php echo anchor('crud/tambah','Tambah Data'); ?></center>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		// Berikut adalah perulangan yang menampilkan tabel user sebanyak baris pada tabel
		foreach($user as $u){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->alamat ?></td>
			<td><?php echo $u->pekerjaan ?></td>
			<!-- Dibawah ini adalah isi tabel yang mengandung link aksi -->
			<td>
						<!-- link aksi yang ditulis dibawah berfungsi sebagai edit dan hapus, dibuat menggunakan helper acnhor -->
			      <?php echo anchor('crud/edit/'.$u->id,'Edit'); ?>
            <?php echo anchor('crud/hapus/'.$u->id,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>