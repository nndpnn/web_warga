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
<div class="page-section">
      <div class="container">
        <h1 class="mb-4" style="text-align: center;">INFORMASI</h1>
        <div class="text-center wow fadeInUp">
          <div class="subhead">
			  <div class="container">
				<div class="card-body"> <!--Tabel-->
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Id Info</th>
								<th>Foto</th>
								<th>Tanggal</th>
								<th>Judul</th>
								<th>Penjelasan</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include('koneksi.php');
								if(isset($_GET['kata_cari'])) {
									$kata_cari = $_GET['kata_cari'];
									$query = "SELECT * FROM tb_data_info WHERE id_info like '%".$kata_cari."%' OR tgl like '%".$kata_cari."%' OR judul like '%".$kata_cari."%' OR penjelasan like '%".$kata_cari."%' OR suhu_tubuh like '%".$kata_cari."%'  ORDER BY id_info ASC";
								} else {
									$query = "SELECT * FROM tb_data_info ORDER BY id_info ASC";
								}
									
								$result = mysqli_query($koneksi, $query);

								if(!$result) {
									die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
								}
								while ($row = mysqli_fetch_assoc($result)) {
							?>
							<tr>
								<td><?php echo $row['id_info']; ?></td>
								<td><img src="images/<?php echo $row['foto'];?>" width="200px"></td>
								<td><?php echo $row['tgl']; ?></td>
								<td><?php echo $row['judul']; ?></td>
								<td><?php echo $row['penjelasan']; ?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			  </div>
		  </div>
		</div>
	  </div> <!-- .container -->
    </div> <!-- .page-section -->
</body>
<script>
window.print()
</script>
</html>
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/wow/wow.min.js"></script>
<script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/animateNumber/jquery.animateNumber.min.js"></script>
<script src="assets/js/google-maps.js"></script>
<script src="assets/js/theme.js"></script>