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
			<li>
				<a href="laporan.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Laporan</span>
				</a>
			</li>
			<li  class="active">
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
			</div>


			<div class="table-data">
				<div class="todo">
					<div class="head">
						<h3>Pengaturan Harga Laundry</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<hr>
					<br><br>
					<?php 
						include "koneksi.php";
						if (isset($_POST['harga'])) {
							$harga = $_POST['harga'];
							$query = "UPDATE harga set harga_per_kilo";
							mysqli_query($con,"update harga set harga_per_kilo='$harga'");
						}
						
						$query = "SELECT harga_per_kilo FROM harga";
						$result = mysqli_query($con, $query);
						$data = mysqli_fetch_array($result);


					?>
					<div class="harga">
						<form action="harga.php" method="POST">
							<input class="input-harga" type="text" name="harga" id="harga" value="<?php echo $data['harga_per_kilo'] ?>">
							<button class="btn-harga" type="submit">Changes</button>
						</form>
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="javascript/script.js"></script>
</body>
</html>