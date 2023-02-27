<?php
	include('koneksi.php');
	$id_akun	= $_POST['id_akun']; 
	$nama		= $_POST['nama'];
	$alamat		= $_POST['alamat'];
				
	$sql = mysqli_query($koneksi, "INSERT INTO tb_data_warga(id_warga, id_akun, nama, alamat) VALUES('', '$id_akun', '$nama', '$alamat')") or die(mysqli_error($koneksi)); //GANTI
					
	if($sql)
	  {
		echo '<script>alert("Berhasil menambahkan data."); document.location="data_warga.php";</script>'; //GANTI
	  }
		else
	  {
		echo '<script>alert("Gagal melakukan proses tambah data"); document.location="data_warga_tambah.php";</script>'; //GANTI
	  }
	?>