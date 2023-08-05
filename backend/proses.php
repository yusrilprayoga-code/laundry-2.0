<?php

    session_start();

    if (isset($_SESSION['User'])) {

        echo '<a href="logout.php?logout"></a>';
    } else {
        header("location:login.php");
	}
    include 'koneksi.php';

    $action = $_GET['action'];
    $scope = $_GET['scope'];
    
    switch ($scope) {
        case 'pelanggan':
            $id = $_GET['pelanggan_id'];
            $nama = $_GET['nama'];
            $pelanggan_alamat = $_GET['pelanggan_alamat'];
            $pelanggan_hp = $_GET['pelanggan_hp'];
            if ($action == "add") {
                $query = "INSERT INTO `pelanggan`(`pelanggan_nama`, `pelanggan_hp`, `pelanggan_alamat`) VALUES ('$nama','$pelanggan_hp','$pelanggan_alamat')";
                $result = mysqli_query($con, $query);
                echo '<script>alert("Added successfully");window.location.href="pelanggan.php";</script>';
            }else if($action == "edit"){
                $query = "UPDATE pelanggan SET `pelanggan_nama`='$nama',`pelanggan_hp`='$pelanggan_hp',`pelanggan_alamat`='$pelanggan_alamat' WHERE pelanggan_id = '$id'";
                $result = mysqli_query($con, $query);
                echo '<script>alert("Updated successfully");window.location.href="pelanggan.php";</script>';
        
            }else if($action == 'delete'){
                $query = "DELETE FROM pelanggan WHERE pelanggan_id = '$id'";
                $result = mysqli_query($con, $query);
                header('location:pelanggan.php');
            }
            break;
        case 'transaksi':
            $pelanggan = $_GET['pelanggan'];
            $berat = $_GET['berat'];
            $tgl_selesai = $_GET['tgl_selesai'];


            switch ($action) {
                case 'add_trans':
                    $tgl_hari_ini = date('Y-m-d');
                    $status = 0;
                    $h = mysqli_query($con,"select harga_per_kilo from harga");
                    $harga_per_kilo = mysqli_fetch_assoc($h);
                    $harga = $berat * $harga_per_kilo['harga_per_kilo'];
                    mysqli_query($con,"insert into transaksi values('','$tgl_hari_ini','$pelanggan','$harga','$berat','$tgl_selesai','$status')");
                    $id_terakhir = mysqli_insert_id($con);
                    $jenis_pakaian = $_GET['jenis_pakaian'];
                    $jumlah_pakaian = $_GET['jumlah_pakaian'];
                    for($x=0;$x<count($jenis_pakaian);$x++){
                        if($jenis_pakaian[$x] != ""){
                            mysqli_query($con,"insert into pakaian values('','$id_terakhir','$jenis_pakaian[$x]','$jumlah_pakaian[$x]')");
                        }
                    }echo '<script>alert("Added successfully");</script>';
                    if ($_SESSION['User'] == 'admin') {
                        header('location: transaksi.php');
                    } else {
                        header('location: laundry2.0/index.php');
                    }
                     
                    break;
                case 'edit_trans':
                    $id = $_GET['transaksi_id'];
                    $status = $_GET['status'];
                    $h = mysqli_query($con,"select harga_per_kilo from harga");
                    $harga_per_kilo = mysqli_fetch_assoc($h);
                    $harga = $berat * $harga_per_kilo['harga_per_kilo'];
                    mysqli_query($con,"update transaksi set transaksi_pelanggan='$pelanggan', transaksi_harga='$harga', transaksi_berat='$berat', transaksi_tgl_selesai='$tgl_selesai', transaksi_status='$status' where transaksi_id='$id'");
                    $jenis_pakaian = $_GET['jenis_pakaian'];
                    $jumlah_pakaian = $_GET['jumlah_pakaian'];
                    mysqli_query($con,"delete from pakaian where pakaian_transaksi='$id'");
                    for($x=0;$x<count($jenis_pakaian);$x++){
                        if($jenis_pakaian[$x] != ""){
                            mysqli_query($con,"insert into pakaian values('','$id','$jenis_pakaian[$x]','$jumlah_pakaian[$x]')");
                            
                        }
                    }echo '<script>alert("Updated successfully");window.location.href="transaksi.php";</script>';
                    break;  
                case 'delete_trans':
                    $id = $_GET['id'];
                    mysqli_query($con,"delete from transaksi where transaksi_id='$id'");
                    mysqli_query($con,"delete from pakaian where pakaian_transaksi='$id'");
                    header('location:transaksi.php');
                    break; 
            }
            break;
        
    }
?>
