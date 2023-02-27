<?php
	include('koneksi.php');
	$nik	= $_POST['nik']; 
	$nama	= $_POST['nama'];
	  $sql = mysqli_query($koneksi, "INSERT INTO tb_user(nik,nama) VALUES( '$nik', '$nama')") or die(mysqli_error($koneksi)); //GANTI
		if($sql)
		{
		  echo '<script>alert("Berhasil menambahkan data."); document.location="login.php";</script>'; //GANTI
		}
		  else
		{
		  echo '<script>alert("Gagal melakukan proses tambah data"); document.location="tambah_akun.php";</script>'; //GANTI
		}
	?>