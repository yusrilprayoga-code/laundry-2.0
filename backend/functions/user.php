<?php 
    
    function register_user($nama, $pass) {
        
        global $konek;
        //mencegah sql injection
        $nama = escape($nama);
        $pass = escape($pass);

        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password) VALUES ('$nama', '$pass')";

        if(mysqli_query($konek, $query)) return true;
        else return false;
    }

    function cek_nama($nama) {
        global $konek;

        $nama = escape($nama);
        $query = "SELECT * FROM users WHERE username = '$nama'";

        if($result = mysqli_query($konek, $query)) {
            return mysqli_num_rows($result);
        }
    }


?>