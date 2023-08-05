<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <link rel="icon" href="../images/icon.png">
    <title>LaundryQuh</title>
</head>

<body>

    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="../images/icon.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Sign Up</h1>
                <div>
                    <?php
                    if (@$_GET['Empty'] == true) {
                    ?>
                        <?php echo $_GET['Empty'] ?>
                    <?php
                    }else if (@$_GET['Used'] == true) {
                    ?>
                        <?php echo $_GET['Used'] ?>
                    <?php
                    }else if (@$_GET['Admin'] == true) {
                    ?>
                        <?php echo $_GET['Admin'] ?>
                    <?php
                    } else {
                    ?>
                        <?php echo "Please Register to use the platform" ?>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <form method="POST" action="cek_login.php" class="login-card-form">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" id="emailForm" 
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" name="username" placeholder="Username" id="username" 
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" name="alamat" placeholder="Alamat" id="alamat"
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" name="noHp" placeholder="No. Telp" id="alamat"
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" name="password" placeholder="Enter Password" id="password"
                     required>
                </div>
                <button name="Signup" type="submit">Sign Up</button>
            </form>
            <div class="login-card-footer">
                If You Already have an Account Login Please! <a href="login.php">Login.</a>
            </div>
        </div>
        <!-- <div class="login-card-social">
            <div>Other Sign-In Options</div>
            <div class="login-card-social-btns">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                    </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                    </svg>
                </a>
            </div>
        </div> -->
    </div>

</body>

</html>