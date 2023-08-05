<?php
    require_once ('koneksi.php');
    session_start();

    if(isset($_POST['Login']))
    {
        if(empty($_POST['username']) || empty($_POST['password'])) 
        {
            header("location: login.php?Empty = isi data di bawah ini");
        }
        else
        {
            $username = $_POST['username'];
            $pass = $_POST['password'];

            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($con, $query);
            $baris = mysqli_fetch_array($result);
            $hash = $baris[3];
            $verify = password_verify($pass, $hash);
            if($verify)
            {
                $_SESSION['User'] = $_POST ['username'];
                if(!empty($_POST['remember'])){
                    setcookie("member_login", $post['username'], time()+(10*365*24*60*60));
                } else {
                    if(isset($_COOKIE["member_login"])) {
                        setcookie("member_login","");
                    }
                    if($username == "admin") {
                        header("location:index.php");
                    } else {
                        header("location:/laundry2.0/index.php");
                    }
                }
            }
            else
            {
                header("location:login.php?Invalid Nama atau password yang dimasukkan salah");
            }
        }
    }
    else
    {
        echo"error";
    }
 ?>