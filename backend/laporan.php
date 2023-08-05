<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="icon" href="../images/icon.png">
	<link rel="stylesheet" href="css/dashboard.css">

	<title>LaundryQuh</title>
</head>
<body>
	<?php
		session_start();

		if ($_SESSION['User'] == "admin") {
			echo '<a href="logout.php?logout"></a>';
		} else {
			header("location:login.php");
	}
	?>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.html" class="brand">
			<img width="60px" src="../images/icon.png" alt="LaundryQuh">
			<span class="text">LaundryQuh</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="pelanggan.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Data Pelanggan</span>
				</a>
			</li>
			<li class="active">
				<a href="laporan.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Laporan</span>
				</a>
			</li>
			<li>
				<a href="harga.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Pengaturan Harga</span>
				</a>
			</li>
			<li>
				<a href="transaksi.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Transaksi</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="setting.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="logout.php?logout" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<div class="dropdown">
				<button class="dropbtn"><img src="img/people.png"></button>
				<div class="dropdown-content">
				  <a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				  </a>
				  <a href="logout.php?logout" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
				</div>
			  </div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Filter Laporan</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<hr>
					<table>
                        <thead>
                            <th>Dari Tanggal</th>
                            <th>Sampai Tanggal</th>
                            <th>Opsi</th>
                        </thead>
						<tbody>
							<form action="laporan.php" method="POST">
							<tr>
								<td>
									<div class="card">
										<input name="tglAwal" type="date">
									</div>
								</td>
								<td>
									<div class="card">
										<input name="tglAkhir" type="date">
									</div>
								</td>
								<td>
									<a href=""><button class="edit" style="padding: 12px 15%;" type="submit">Filter</button></a>
								</td>
							</tr>
							</form>
						</tbody>
					</table>
					
					<?php
					if(isset($_POST['tglAwal']) && isset($_POST['tglAkhir'])){
						$tglAwal = $_POST['tglAwal'];
						$tglAkhir = $_POST['tglAkhir'];
						?>
						<div class="container col-md-12">
						<div class="panel">
							<div class="panel-body">
								<br/>
								<br/>
								<div class="">
									<h4>Data Laporan Laundry dari <b><?php echo $tglAwal; ?></b> sampai <b><?php echo $tglAkhir; ?></b></h4>
								</div>
								
								<table class="table table-bordered table-striped">
									<tr>
										<th width="1%">No</th>
										<th>Invoice</th>
										<th>Tanggal</th>
										<th>Pelanggan</th>
										<th>Berat (Kg)</th>
										<th>Tgl. Selesai</th>
										<th>Harga</th>
										<th>Status</th>
									</tr>
									<?php
									include "koneksi.php";
									$query = "SELECT * FROM pelanggan JOIN transaksi ON transaksi_pelanggan=pelanggan_id WHERE transaksi.transaksi_tgl BETWEEN '$tglAwal' AND '$tglAkhir'";
									$data = mysqli_query($con, $query);
									$no = 1;
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
											<td><?php echo $d['transaksi_tgl']; ?></td>
											<td><?php echo $d['pelanggan_nama']; ?></td>
											<td><?php echo $d['transaksi_berat']; ?></td>
											<td><?php echo $d['transaksi_tgl_selesai']; ?></td>
											<td><?php echo "Rp. ".number_format($d['transaksi_harga']) ." ,-"; ?></td>
											<td>
												<?php
												if($d['transaksi_status']=="0"){
													echo "<div class='btn btn-warning'><i class='bx bx-loader'></i> PROSES</div>";
												}else if($d['transaksi_status']=="1"){
													echo "<div class='btn btn-info'><i class='bx bxs-washer'> </i>DICUCI</div>";
												}else if($d['transaksi_status']=="2"){
													echo "<div class='btn btn-success'><i class='bx bx-check-square'></i> SELESAI</div>";
												}
												?>
											</td>
										</tr>
										<?php
										}
									?>
								</table>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="javascript/script.js"></script>
</body>
</html>