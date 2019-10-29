<!DOCTYPE html>
<html>
<head>
	<title>Halaman index</title>
</head>
<body>
<h2>Daftar Mahasiswa</h2>
<a href="<?= site_url('home'); ?>"><button>Tambah Data</button></a>
<table border="1">
	<tr>
		<td>NIM</td>
		<td>Nama</td>
		<td>Jurusan</td>
		<td colspan="2"><center>Aksi</center></td>
	</tr>
	<?php foreach ($mahasiswas as $mhs) 
	{
		?><tr>
			<td><?= $mhs->nim; ?></td>
			<td><?= $mhs->nama; ?></td>
			<td><?= $mhs->jurusan; ?></td>
			<td><a href="?action=edit&nim=<?= $mhs->nim; ?>"><button>Ubah Data</button></a></td>
			<td><a href="?action=delete&nim=<?= $mhs->nim; ?>"><button>Hapus Data</button></a></td>
		</tr><?php
	}?>
</table>

<h2><?= $_GET['action'] == "edit" ? "Ubah Mahasiswa" : "Tambah Mahasiswa"; ?></h2>
<form method="post" action="<?= site_url('home'); ?>">
<table>
	<tr>
		<td>NIM</td>
		<td><input required type="text" name="nim" <?= $_GET['action'] == "edit" ? "readonly value=".$mahasiswa->nim : "" ; ?>></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td><input required type="text" name="nama" <?= $_GET['action'] == "edit" ? "value=".$mahasiswa->nama : "" ; ?>></td>
	</tr>
	<tr>
		<td>Jurusan</td>
		<td><input required type="text" name="jurusan" <?= $_GET['action'] == "edit" ? "value=".$mahasiswa->jurusan : "" ; ?>></td>
	</tr>
	<tr>
		<td><input type="submit" <?= $_GET['action'] == 'edit' ? 'name="ubah" value="Ubah Data"'  : 'name="tambah" value="Tambah Data"'; ?>></td>
	</tr>
</table>
<a href="<?= site_url('home/logout'); ?>">Logout</a>
</body>
</html>