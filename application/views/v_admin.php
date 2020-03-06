<!-- Halaman berikut adalah halaman yang diakses ketika login berhasil dilakukan -->
<!DOCTYPE html>
<html>
<head>
	<title>Membuat login dengan codeigniter | www.malasngoding.com</title>
</head>
<body>
	<h1>Login berhasil !</h1>
	<!-- Berikut baris kode yang menampilkan username yang diambil dari session -->
	<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>
	<!-- Berikut adalah baris kode yang meengarahkan pengguna ke method logout pada controller login -->
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
</body>
</html>