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
					<a href="edit.php?action=add" class="btn-tambah">
						<span class="text">Tambah Pelanggan</span>
					</a>
					<table>
						<thead>
							<tr>
                                <th>No</th>
								<th>Nama</th>
                                <th>HP</th>
								<th>Alamat</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$no = 1;
							include 'koneksi.php';
							$query = "SELECT * FROM pelanggan";
							$hasil_mysql = mysqli_query($con, $query);
							while ($baris = mysqli_fetch_row($hasil_mysql)) {
								$id = $baris[0];
								$nama = $baris[1];
								$no_hp = $baris[2];
								$alamat = $baris[3];
								?>
								<tr>
									<td><?php echo $no++ ?> </td>
									<td><p><?php echo $nama ?></p></td>
									<td><?php echo $no_hp ?></td>
									<td><?php echo $alamat ?></td>
									<td>
									<form action="edit.php" method="GET">
										<input type="hidden" name="pelanggan_id" value="<?php echo $id ?>" >
										<a><button style="padding: 12px 15%;" type="submit" name="action" value="edit" class="edit">Edit</button></a>
										<a><button style="padding: 12px 12%;" type="submit" onclick="return confirm('Are you sure want to delete ?')" name="action" value="delete" class="hapus">Hapus</button></a>
									</form>
									</td>
								</tr>
								<?php
							} 
						?>
							<!-- <tr>
                                <td>1</td>
								<td><p>John Doe</p></td>
								<td>0822222222</td>
								<td>Jl. Sleman</td>
                                <td>
                                    <a href=""><button style="padding: 12px 15%;" class="edit">Edit</button></a>
                                    <a href=""><button style="padding: 12px 12%;" class="hapus">Hapus</button></a>
                                </td>
							</tr>
							<tr>
                                <td>1</td>
								<td><p>John Doe</p></td>
								<td>0822222222</td>
								<td>Jl. Sleman</td>
                                <td>
                                    <a href=""><button style="padding: 12px 15%;" class="edit">Edit</button></a>
                                    <a href=""><button style="padding: 12px 12%;" class="hapus">Hapus</button></a>
                                </td>
							</tr> -->
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="javascript/script.js"></script>
</body>
</html>