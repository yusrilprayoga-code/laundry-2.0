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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins:wght@200;400;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>


<?php
    session_start();

    if (isset($_SESSION['User'])) {
        echo '<a href="logout.php?logout"></a>';
    } 

?>

<body>
    <div class="overlay"></div>
    <div class="wrapper">
        <header>
            <a href="#"><img width="275" src="images/Untitled-3.png" alt="LaundryQuh Logo"></a>

            <nav>
                <ul>
                    <li><a href="#body">Home</a></li>
                    <li><a href="#service">Services</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <?php 
                if (isset($_SESSION['User'])) {
                    ?>
                    <div class="nav-extra">
                        <a class="login"><?php echo ucfirst($_SESSION['User']) ?></a>
                        <a href="backend/logout.php?logout" class="register">Log Out</a>
                    </div>
                    <?php
                } else {
                    ?> 
                    <div class="nav-extra">
                        <a href="backend/login.php" class="login">Login</a>
                        <a href="backend/register.php" class="register">Register</a>
                    </div>
                    <?php
                }
            ?>
        </header>

        <main>
            <div class="left-col">
                <h1>Laundry & Dry Cleaning
                    Pick Up & Delivery</h1>
                <p class="subhead">
                    Let’s get wet, tumble around, and dry off, together.
                </p>
                <div class="cta-btns">
                    <a href="backend/pemesanan.php" class="primary-cta">Get Started</a>

                    <a href="backend/pemesanan.php" class="secondary-cta">
                        <span>Order Now</span>
                        <svg viewBox="0 0 19 8" fill="none">
                            <path
                                d="M18.3536 4.35355C18.5488 4.15829 18.5488 3.84171 18.3536 3.64645L15.1716 0.464466C14.9763 0.269204 14.6597 0.269204 14.4645 0.464466C14.2692 0.659728 14.2692 0.976311 14.4645 1.17157L17.2929 4L14.4645 6.82843C14.2692 7.02369 14.2692 7.34027 14.4645 7.53553C14.6597 7.7308 14.9763 7.7308 15.1716 7.53553L18.3536 4.35355ZM0 4.5H18V3.5H0V4.5Z"
                                fill="black" />
                        </svg>
                    </a>
                </div>

                <div class="news">
                    <p class="employees">50K</p>
                    <p class="details">
                        We’re proud to announce that we now
                        employ a workforce of over <strong>50,000</strong>.
                        It’s all possible because of you.
                    </p>
                </div>
            </div>
            <div class="right-col">
                <div class="card card1">
                    <div class="card-details">
                        <div>
                            <a href="#" class="product-title">LaundryQuh</a>
                            <p>
                                Pickup & Delivery for<br />
                                Dry Cleaning
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card2">
                    <div class="card-details">
                        <div>
                            <a href="#" class="product-title">LaundryQuh</a>
                            <p>
                                Pickup & Delivery for<br />
                                Wash and Fold
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card3">
                    <div class="card-details">
                        <div>
                            <a href="#" class="product-title">LaundryQuh</a>
                            <p>Drop-Off</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>

    <div class="service" id="service">
        <div class="service-category">
            <div class="service-image">
                <img src="images/mujer 1.png">

                <div class="info">
                    <h2 class="name">Drop-Off</h2>
                    <p class="bio">Membawa Pakaian ke jasa laundry</p>
                </div>

            </div>

            <div class="service-image">
                <img src="images/I want you to start cleaning too!.png">

                <div class="info">
                    <h2 class="name">Pickup & Delivery for <br>
                        Dry Cleaning</h2>
                    <p class="bio">Layanan mencuci dan mengeringkan pakaian</p>
                </div>

            </div>

            <div class="service-image">
                <img src="images/Discussing all shipment details.png">

                <div class="info">
                    <h2 class="name">Pickup & Delivery for <br> Wash and Fold</h2>
                    <p class="bio">Layanan mencuci, mengeringkan, melipat dan mengantarkan kembali</p>
                </div>

            </div>

            <div class="service-image">
                <img src="images/Picking up an outfit isn_t easy thing to do.png">

                <div class="info">
                    <h2 class="name">Self-Service</h2>
                    <p class="bio">Layanan pencucian yang dilakukan sendiri</p>
                </div>
            </div>
        </div>
    </div>

    <!-- start tentang kami -->
    <section class="what-is-container" id="about">
        <div>
            <div>
                <h1>Why Choose Us?</h1>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution...</p>
            </div>
        </div>
        <img src="images/Group7.png" alt="what-is">
    </section>
    <!-- end tentang kami -->

    <!-- start gallary -->
    <div class="gallary" id="Gallary">
        <h1>Our<span>Gallery</span></h1>

        <div class="gallary_image_box">
            <div class="gallary_image">
                <img src="images/1.jpg">

                <h3>LaundryQuh</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

            <div class="gallary_image">
                <img src="images/2.jpg">

                <h3>LaundryQuh</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

            <div class="gallary_image">
                <img src="images/3.jpg">

                <h3>LaundryQuh</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

            <div class="gallary_image">
                <img src="images/4.jpg">

                <h3>LaundryQuh</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

            <div class="gallary_image">
                <img src="images/5.jpg">

                <h3>LaundryQuh</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

            <div class="gallary_image">
                <img src="images/6.jpg">

                <h3>LaundryQuh</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi sint eveniet laboriosam 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

        </div>

    </div>

    <!-- start contact -->
    <section id="contact" class="contact">
        <h2>Kontak<span>Kami</span></h2>
        <p>Guaranteed service and a tasty <br>
            time-off. What are you waiting <br>
            for to come get this?</p>
    
        <div class="row">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63245.98363670181!2d110.33973965422012!3d-7.803163966116165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta%2C%20Kota%20Yogyakarta%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1674030880314!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
            <form action="">
                <div class="input-group">
                    <i class='bx bx-user bx-md'></i>
                    <input type="text" name="" id="" placeholder="Nama">
                </div>
                <div class="input-group">
                    <i class='bx bx-envelope bx-md' ></i>
                    <input type="text" name="" id="" placeholder="Email">
                </div>
                <div class="input-group">
                    <i class='bx bx-phone bx-md' ></i>
                    <input type="text" name="" id="" placeholder="No Handphone">
                </div>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="footer_main">

            <div class="footer_tag">
                <h2>Location</h2>
                <p>Indonesia</p>
                <p>Yogyakarta</p>
                <p>Sleman</p>
            </div>

            <div class="footer_tag">
                <h2>Quick Link</h2>
                <p>Home</p>
                <p>Services</p>
                <p>About Us</p>
                <p>Contact</p>
            </div>

            <div class="footer_tag">
                <h2>Contact</h2>
                <p>+94 12 3456 789</p>
                <p>+94 25 5568456</p>
                <p>LaundryQuh@gmail.com</p>
            </div>

            <div class="footer_tag">
                <h2>Our Service</h2>
                <p>Fast Delivery</p>
                <p>Easy washing</p>
                <p>24 x 7 Service</p>
            </div>

            <div class="footer_tag">
                <h2>Follows</h2>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>

        </div>

        <p class="end">Design by<span><i class="fa-solid fa-face-grin"></i> LaundryQuh</span></p>

    </footer>

</body>

</html>