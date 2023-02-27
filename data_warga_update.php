<?php
	include('koneksi.php');
	$id_warga	= $_POST['id_warga']; 
	$id_akun	= $_POST['id_akun']; 
	$nama		= $_POST['nama'];
	$alamat		= $_POST['alamat'];
	
	$sql = mysqli_query($koneksi, "UPDATE tb_data_warga SET id_warga='$id_warga', id_akun='$id_akun', nama='$nama', alamat='$alamat' WHERE id_warga='$id_warga'") or die(mysqli_error($koneksi));
			
			if($sql)
			{
				echo '<script>alert("Berhasil menyimpan data."); document.location="data_warga.php";</script>';
			}
			else
			{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
?>