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
    <link rel="stylesheet" href="style.css">
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

    button[type="submit"] {
        font-family: 'poppins', sans-serif;
        font-weight: 600;
        background-color: #48ca7e;
        padding: 15px 7%;
        color: white;
        font-size: 120%;
        border-radius: 10px;
        cursor: pointer;
    }

    form p {
        font-family: 'poppins', sans-serif;
        font-size: 1.4rem;
        font-weight: 400;
    }

    .card a {
        font-family: 'poppins', sans-serif;
        font-weight: 600;
        background-color: #48ca7e;
        padding: 15px 7%;
        color: white;
        font-size: 120%;
        border-radius: 10px;
        cursor: pointer;
        border: 2px solid #000;
    }

    .table {
        margin-top: 12px;
        padding-top: 12px;
        padding-bottom: 12px;
        border-top: 2px solid #000;
    }
</style>

<body>

    <div class="card">
        <form action="" method="">
            <center>
                <h1>Form Pemesanan</h1>
            </center>
            <p>Pelanggan : <select name="state" id="state" required>
                    <option value="">--Pelanggan--</option>
                    <option value="mumbai">Mumbai</option>
                </select></p>
            <p>Nama Lengkap :<input type="text" name="username" id="username" placeholder="Masukkan Nama Lengkap..." required></p>
            <p>Nomor Telepon :<input type="text" name="no_hp" id="no_hp" placeholder="Masukkan Nama Nomor telepon..." required></p>
            <p>Address: <textarea name="alamat" id="alamat" cols="100" rows="10" placeholder="Masukkan Alamat...."></textarea> </p>
            <p>Berat :<input type="number" name="name" id="name" required placeholder="00"></p>
            <p>tanggal Selesai :<input type="date" name="email" id="email"></p>
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
            <button type="submit">Confirm</button>
            <a href="index.php"><--Back </a>
        </form>
    </div>
</body>

</html>