 <?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from tb_akun where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai rt
	if($data['role']=="rt"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "rt";
		// alihkan ke halaman dashboard rt
		header("location:dashboard_rt.php");
 
	// cek jika user login sebagai warga
	}else if($data['role']=="warga"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "warga";
		// alihkan ke halaman dashboard warga
		header("location:dashboard_warga.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>