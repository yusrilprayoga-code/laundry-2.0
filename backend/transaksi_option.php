<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    <div class="panel-body">
                        <div class="col-md-12 col-md-offset-2">    
                            <?php
                                include "koneksi.php";
                                $action = $_GET['action'];
                                if ($action == 'add_trans') {
                                    $t['transaksi_berat'] = $t['transaksi_tgl_selesai'] = $t['pelanggan_hp'] = $t['transaksi_pelanggan'] = "";
                                }else {
                                    $id = $_GET['id'];
                                    $query = "SELECT * FROM transaksi WHERE transaksi_id = '$id'";
                                    $result = mysqli_query($con, $query);
                                    $t=mysqli_fetch_array($result);
                                    if ($action == 'edit_trans') {
                                        
                                    } else if($action == 'delete_trans'){
                                        header("location:proses.php?id=$id&&action=delete_trans&&scope=transaksi");
                                    }
                                }
                                
                            ?>
                            <form method="GET" action="proses.php">

                                    <div class="form-group">
                                        <label class="form-label">Pelanggan</label>
                                        <select class="form-control" name="pelanggan" required="required">
                                            <option value="">- Pilih Pelanggan</option>
                                            <?php
                                            $data = mysqli_query($con,"select * from pelanggan");
                                            while($d=mysqli_fetch_array($data)){
                                                ?>
                                            <option <?php if($d['pelanggan_id']==$t['transaksi_pelanggan']){echo "selected='selected'";} ?> value="<?php echo $d['pelanggan_id']; ?>"><?php echo $d['pelanggan_nama']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Berat</label>
                                        <input type="number" class="form-control" name="berat" placeholder="Masukkan berat cucian .." required="required" value="<?php echo $t['transaksi_berat']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Tgl. Selesai</label>
                                        <input type="date" class="form-control" name="tgl_selesai" required="required" value="<?php echo $t['transaksi_tgl_selesai']; ?>">
                                    </div>

                                    <br/>

                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Jenis Pakaian</th>
                                            <th width="20%">Jumlah</th>
                                        </tr>

                                        <?php
                                        
                                        if ($action == 'add_trans') {
                                            $t['jenis_pakaian'] =  $t['transaksi_id'] = "";
                                        }else {
                                            $id_transaksi = $id;
                                            $pakaian = mysqli_query($con,"select * from pakaian where pakaian_transaksi='$id_transaksi'");
                                            if ($action == 'edit_trans') {
                                                
                                            } else if($action == 'delete'){
                                                header("location:proses.php?pelanggan_id=$id&&action=delete");
                                            }
                                            while($p=mysqli_fetch_array($pakaian)){
                                                ?>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="jenis_pakaian[]" value="<?php echo $p['pakaian_jenis']; ?>"></td>
                                                    <td><input type="number" class="form-control" name="jumlah_pakaian[]" value="<?php echo $p['pakaian_jumlah']; ?>"></td>
                                                </tr>
                                                <?php 
                                            } 
                                        }
                                        ?>
                                            <tr>
                                                <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                                <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                                <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                                <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                                <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                            </tr>
                                        </table>

                                        <?php 
                                        switch ($action) {
                                            case 'add_trans':

                                                break;
                                            case 'edit_trans':
                                                ?>
                                                    <div class="form-group alert alert-info">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status" required="required">
                                                            <option <?php if($t['transaksi_status']=="0"){echo "selected='selected'";} ?> value="0">Pending</option>
                                                            <option <?php if($t['transaksi_status']=="1"){echo "selected='selected'";} ?> value="1">Process</option>
                                                            <option <?php if($t['transaksi_status']=="2"){echo "selected='selected'";} ?> value="2">Completed</option>
                                                        </select>
                                                    </div>
                                                    <?php 
                                                break;
                                            
                                        }
                                            ?>
                                        <input type="hidden" name="scope" value="transaksi">
                                        <input type="hidden" name="action" value="<?php echo $action; ?>">
                                        <input type="hidden" name="transaksi_id" value="<?php echo $id; ?>">
                                        <input type="submit" class="btn btn-primary" value="<?php echo ucfirst($action) ?>">
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