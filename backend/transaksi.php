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
			<li>
				<a href="harga.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Pengaturan Harga</span>
				</a>
			</li>
			<li class="active">
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
				<div class="order">
					<div class="head">
						<h3>Data Transaksi</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<hr>
					<br><br>
					<a href="transaksi_option.php?action=add_trans" class="btn-tambah">
                        <span class="text">Tambah Transaksi</span>
                    </a>
					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>invoice</th>
								<th>Date Order</th>
								<th>User</th>
								<th>Heavy(kg)</th>
								<th>Date Completed</th>
								<th>Status</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$no = 1;
								include "koneksi.php";
								$query = "SELECT * FROM pelanggan,transaksi WHERE transaksi_pelanggan=pelanggan_id order by transaksi_id desc";
								$result = mysqli_query($con, $query);
								while($array = mysqli_fetch_array($result))
								{
									switch ($array['transaksi_status']) {
										case '2':
											$status = 'completed';
											break;
										case '1':
											$status = "process";
											break;
										case '0':
											$status = "pending";
											break;
									}
									?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td>INVOICE-<?php echo $array['transaksi_id']; ?></td>
											<td><?php echo $array['transaksi_tgl']; ?></td>
											<td><?php echo $array['pelanggan_nama']; ?></td>
											<td><?php echo $array['transaksi_berat']; ?></td>
											<td><?php echo $array['transaksi_tgl_selesai']; ?></td>
											<td><span class="status <?php echo $status ?>"><?php echo ucfirst($status) ?></span></td>
											<td>
												<a href="invoice.php?id=<?php echo $array['transaksi_id']; ?>" target="_blank"><button style="padding: 12px 4%;" class="invoice">invoice</button></a>
												<a href="transaksi_option.php?action=edit_trans&&id=<?php echo $array['transaksi_id'] ?>"><button style="padding: 12px 6%;" class="edit">Edit</button></a>
												<a href="transaksi_option.php?action=delete_trans&&id=<?php echo $array['transaksi_id'] ?>"><button style="padding: 12px 5%;" type="submit" onclick="return confirm('Are you sure want to delete ?')" name="action" value="delete" class="hapus">Hapus</button></a>
											</td>
										</tr>
									<?php 

								}; 
							?>
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