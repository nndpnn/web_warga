<?php
	include('koneksi.php');
	$id_warga = $_GET['id_warga'];	
	$cek = mysqli_query($koneksi, "SELECT * FROM tb_data_warga WHERE id_warga='$id_warga'") or die(mysqli_error($koneksi));
	if(mysqli_num_rows($cek) > 0)
	{
		$del = mysqli_query($koneksi, "DELETE FROM tb_data_warga WHERE id_warga='$id_warga'") or die(mysqli_error($koneksi));
		if($del)
		{
			echo '<script>alert("Berhasil menghapus data."); document.location="data_warga.php";</script>';
		}
		else
		{
			echo '<script>alert("Gagal menghapus data."); document.location="data_warga.php";</script>';
		}
	}
	else
	{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="data_warga.php";</script>';
	}
?>