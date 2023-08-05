<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png">
    <title>LaundryQuh</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins:wght@200;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/laundry2.0/style.css">
</head>

<style>
    /* Form Pemesanan */
    form {
        max-width: 70%;
        padding: 10px 20px 10px 20px;
        margin: auto;
        border: 2px solid lightgray;
        background-color: #f2f2f2;
        border-radius: 10px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="date"],
    select,
    input[type="submit"],
    textarea,
    input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 2px solid lightgray;
        margin: 10px;
        border-radius: 6px;
    }

    button {
        font-family: 'poppins', sans-serif;
        font-weight: 600;
        background-color: #2282a2;
        padding: 15px 7%;
        color: white;
        font-size: 120%;
        border-radius: 20px;
        border: 0;
        cursor: pointer;
    }

    form p {
        font-family: 'poppins', sans-serif;
        font-size: 1.4rem;
        font-weight: 400;
    }

    .container a {
        font-family: 'poppins', sans-serif;
        font-weight: 600;
        background-color: #2282a2;
        padding: 15px 7%;
        color: white;
        font-size: 120%;
        border-radius: 20px;
        border: 0;
        cursor: pointer;
        border: 0px solid #000;
    }

    .table {
        margin-top: 12px;
        padding-top: 12px;
        padding-bottom: 12px;
        border-top: 2px solid #000;
    }
</style>

<body>
    <?php 
        session_start();

		if (isset($_SESSION['User'])) {

			echo '<a href="logout.php?logout"></a>';
		} else {
			header("location:login.php");
        }

        include 'koneksi.php';
        $username = $_SESSION['User'];
        $query = "SELECT * FROM users JOIN pelanggan ON users.nama_lengkap = pelanggan.pelanggan_nama";
        $result = mysqli_query($con, $query);
        $pelanggan = mysqli_fetch_array($result);
        
    ?>
    <div class="container" style="margin-top: 5rem ;">
        <form action="proses.php" method="GET">
            <center>
                <h1>Form Pemesanan</h1>
            </center>
            <p>Pelanggan : 
                <select class="form-control" name="pelanggan" required="required">
                    <option value="">- Pilih Pelanggan</option>
                    <?php
                    $data = mysqli_query($con,"select * from pelanggan");
                    while($d=mysqli_fetch_array($data)){
                        ?>
                    <option <?php if($d['pelanggan_id']==$pelanggan['pelanggan_id']){echo "selected='selected'";} ?> value="<?php echo $d['pelanggan_id']; ?>"><?php echo $d['pelanggan_nama']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>
            <!-- <p>Nama Lengkap :<input type="text" name="username" id="username" value="<?php echo $pelanggan['pelanggan_nama'] ?>" placeholder="Masukkan Nama Lengkap..." required></p>
            <p>Nomor Telepon :<input type="text" name="no_hp" id="no_hp" value="<?php echo $pelanggan['pelanggan_hp'] ?>" placeholder="Masukkan Nama Nomor telepon..." required></p>
            <p>Address: <textarea name="alamat" id="alamat" cols="100" rows="10" placeholder="Masukkan Alamat...."><?php echo $pelanggan['pelanggan_alamat'] ?></textarea> </p> -->
            <p>Berat :<input type="number" name="berat"  required placeholder="00"></p>
            <p>tanggal Selesai :<input type="date" name="tgl_selesai"></p>
            <table class="table">
                <tr>
                    <th>Jenis Pakaian</th>
                    <th width="20%">Jumlah</th>
                </tr>
                <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]" required></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]" required></td>
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
                <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                </tr>
                <tr>
                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                </tr>
            </table>
            <input type="hidden" name="scope" value="transaksi">
            <input type="hidden" name="action" value="add_trans">
            <button type="submit">Confirm</button>
            <a href="/laundry2.0/index.php">Back</a>
        </form>
    </div>
</body>

</html>