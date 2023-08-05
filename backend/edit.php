<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="icon" href="../images/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
			<li class="active">
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
				<a href="#" class="logout">
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
				  <a href="#">
					<i class='bx bxs-log-out-circle' style="color: red;"></i>
					<span class="text" style="color:red;">Logout</span>
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
							<a class="active" href="#">Data Pelanggan</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="table-data">
				
				<div class="order">
					<div class="head">
						<h3>Data Pelanggan</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
                    <?php
                        include 'koneksi.php';
                        $action = $_GET['action'];
                        if ($action == 'add') {
                            $array['pelanggan_nama'] = $array['pelanggan_alamat'] = $array['pelanggan_hp'] = "";
                        }else {
                            $id = $_GET['pelanggan_id'];
                            $query = "SELECT * FROM pelanggan WHERE pelanggan_id = $id";
                            $result = mysqli_query($con, $query);
                            $array = mysqli_fetch_array($result); 
                            if ($action == 'edit') {
                                
                            } else if($action == 'delete'){
                                header("location:proses.php?scope=pelanggan&&pelanggan_id=$id&&action=delete");
                            }
                        }
                    ?>
					<div class="container">
						<div class="card-header">
							<h4><?php echo ucfirst($action) ?> Data Pelanggan <h4>
						</div>
						<div class="card-body">
							<form class="row g-3" method="GET" action="proses.php">
								<div class="col-md-6">
									<label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
									<input type="text" class="form-control" name="nama" placeholder="Masukkan nama .." value="<?php echo $array['pelanggan_nama']; ?>">
									
								</div>
								<div class="col-md-6">
									<label for="nomor_telepon" class="form-label">Nomor Telepon</label>
									<input type="text" class="form-control" name="pelanggan_hp" value="<?php echo $array['pelanggan_hp']; ?>">
								</div>
								<div class="col-12">
									<div class="form-outline w-20">
										<label for="textarea">Alamat</label>
										<textarea type="text" class="form-control" name="pelanggan_alamat" rows="3" placeholder="Masukkan alamat" value=""><?php echo $array['pelanggan_alamat']; ?></textarea>
									</div>
								</div>
								<input type="hidden" name="scope" value="pelanggan">
								<input type="hidden" name="action" value="<?php echo $action?>">
								<input type="hidden" name="pelanggan_id" value="<?php echo $id ?>">
								<div class="col-md-1">
									<button type="submit" class="btn btn-outline-dark" ><?php echo ucfirst($action)?></button>
								</div>
								<div class="col-md-6">
									<a href="pelanggan.php" type="reset" class="btn btn-outline-dark">Batal</a>
								</div>
							</form>
						</div>
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