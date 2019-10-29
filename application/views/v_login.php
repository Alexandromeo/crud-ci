<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>
	<?php
	if($_GET['m'])
	{
		echo $_GET['m'];
	}?>
	<form method="post" action="<?= site_url('login'); ?>">
		<table>
			<tr>
				<td>NIM</td>
				<td><input type="text" name="nim"></td>
			</tr>

			<tr>
				<td>Nama</td>
				<td><input type="text" name="name"></td>
			</tr>

			<tr>
				<td><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>