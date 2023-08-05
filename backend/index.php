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
		<a href="index.php" class="brand">
			<img width="60px" src="../images/icon.png" alt="LaundryQuh">
			<span class="text">LaundryQuh</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
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
			<li>
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
			
			<?php 
				include "koneksi.php";
			?>

			<ul class="box-info">
				<a href="pelanggan.php">
				<li>
				<?php 
					$query = "SELECT * FROM pelanggan";
					$hasil_mysql = mysqli_query($con, $query); 
					$total = mysqli_num_rows($hasil_mysql);
				?>
					<i class='bx bxs-group' ></i>
						<span class="text">
							<h3><?php echo $total ?></h3>
							<p>Pelanggan</p>
						</span>
					</li>
				</a>
				<li>
				<?php 
					$query = "SELECT pelanggan.pelanggan_nama, transaksi.transaksi_tgl, transaksi.transaksi_status FROM transaksi JOIN pelanggan ON transaksi.transaksi_pelanggan = pelanggan.pelanggan_id WHERE transaksi.transaksi_status = 1;";
					$hasil_mysql = mysqli_query($con, $query); 
					$total = mysqli_num_rows($hasil_mysql);
				?>
					<i class='bx bxs-pie-chart' ></i>
					<span class="text">
						<h3><?php echo $total ?></h3>
						<p>Proses Cucian</p>
					</span>
				</li>
				<li>
				<?php 
					$query = "SELECT pelanggan.pelanggan_nama, transaksi.transaksi_tgl, transaksi.transaksi_status FROM transaksi JOIN pelanggan ON transaksi.transaksi_pelanggan = pelanggan.pelanggan_id WHERE transaksi.transaksi_status = 2;";
					$hasil_mysql = mysqli_query($con, $query); 
					$total = mysqli_num_rows($hasil_mysql);
				?>	
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $total ?></h3>
						<p>Siap Ambil</p>
					</span>
				</li>
				<li>
				<?php 
					$query = "SELECT pelanggan.pelanggan_nama, transaksi.transaksi_tgl, transaksi.transaksi_status FROM transaksi JOIN pelanggan ON transaksi.transaksi_pelanggan = pelanggan.pelanggan_id WHERE transaksi.transaksi_status = 2;";
					$hasil_mysql = mysqli_query($con, $query); 
					$total = mysqli_num_rows($hasil_mysql);
				?>	
					<i class='bx bxs-check-circle' ></i>
					<span class="text">
						<h3><?php echo $total ?></h3>
						<p>Cucian Selesai</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Riwayat Pemesanan</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<?php 
							$no = 1;
							$query = "SELECT pelanggan.pelanggan_nama, transaksi.transaksi_tgl, transaksi.transaksi_status FROM transaksi JOIN pelanggan ON transaksi.transaksi_pelanggan = pelanggan.pelanggan_id;";
							$hasil_mysql = mysqli_query($con, $query);
							while ($baris = mysqli_fetch_row($hasil_mysql)) {
								$nama = $baris[0];
								$tgl_pesan = $baris[1];
								$state = $baris[2];
								switch ($state) {
									case '2':
										$status = "completed";
										break;
									case '1':
										$status = "process";
										break;
									case '0':
										$status = "pending";
										break;
								}
							?>
							
						<tbody>
							<tr>
								<td><?php echo $no++ ?> </td>
								<td><p><?php echo $nama ?></p></td>
								<td><?php echo $tgl_pesan ?></td>
								<td><span class="status <?php echo $status ?>"><?php echo ucfirst($status) ?></span></td>
							</tr>
							<?php
							}	
						?>
						</tbody>
					</table>
				</div>
				<!-- <div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div> -->
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="javascript/script.js"></script>
</body>
</html>