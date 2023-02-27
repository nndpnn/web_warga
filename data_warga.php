<?php
session_start();
if (!isset($_SESSION["username"])) 
{
	echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
	exit;
}
$username=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="copyright" content="MACode ID, https://macodeid.com">
  <title>PeduliDiri</title>
  <link rel="stylesheet" href="assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/maicons.css">
  <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
      <div class="container">
        <a href="" class="navbar-brand">Peduli<span class="text-primary">Diri.</span></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
            <li class="nav-item ">
              <a href="dashboard_rt.php" class="nav-link">Home</a>
            </li>
			<li class="nav-item">
              <a href="profil_rt.php" class="nav-link ">Profil</a>
            </li>
            <li class="nav-item active">
              <a href="data_warga.php" class="nav-link ">Data Warga</a>
            </li>
			<li class="nav-item">
              <a href="data_akunwarga.php" class="nav-link ">Data Akun dan Warga</a>
            </li>
            <li class="nav-item">
              <a href="informasi_rt.php" class="nav-link">Informasi</a>
            </li>
			<li class="nav-item">
              <a href="logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
          <div class="ml-auto">
            <a href="data_warga_print.php" class="btn btn-outline rounded-pill">Print PDF</a>
          </div>
		</div>

        <div class="ml-auto">
        </div>
      </div>
    </nav>
  </header>
	  
  <main>
    <div class="page-section">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <div class="subhead">
			  <div class="container">
				<div class="card-body"> <!--Tabel-->
					<br>
					<form method="GET" action="catatan_perjalanan.php" style="text-align: center;">
						<label>Kata Pencarian : </label>
						<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
						<button type="submit">Cari</button>
					</form>
					<br>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Id Warga</th>
								<th>Id Akun</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include('koneksi.php');
								if(isset($_GET['kata_cari'])) {
									$kata_cari = $_GET['kata_cari'];
									$query = "SELECT * FROM tb_data_warga WHERE id_warga like '%".$kata_cari."%' OR id_akun like '%".$kata_cari."%' OR nama like '%".$kata_cari."%' OR alamat like '%".$kata_cari."%' OR suhu_tubuh like '%".$kata_cari."%'  ORDER BY id_warga ASC";
								} else {
									$query = "SELECT * FROM tb_data_warga ORDER BY id_warga ASC";
								}
									
								$result = mysqli_query($koneksi, $query);

								if(!$result) {
									die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
								}
								while ($row = mysqli_fetch_assoc($result)) {
							?>
							<tr>
								<td><?php echo $row['id_warga']; ?></td>
								<td><?php echo $row['id_akun']; ?></td>
								<td><?php echo $row['nama']; ?></td>
								<td><?php echo $row['alamat']; ?></td>
								<td><?php echo '
								  <a href="data_warga_edit.php?id_warga='.$row['id_warga'].'" class="badge badge-warning">Edit</a> 
								  <a href="data_warga_delete.php?id_warga='.$row['id_warga'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
								  ';?>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a href="data_warga_tambah.php">+ Tambah Data Warga</a>
				</div>
			  </div>

		  </div>
		</div>
	  </div> <!-- .container -->
    </div> <!-- .page-section -->
 </main>   

</body>
</html>

<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/wow/wow.min.js"></script>
<script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/animateNumber/jquery.animateNumber.min.js"></script>
<script src="assets/js/google-maps.js"></script>
<script src="assets/js/theme.js"></script>