<!doctype html>
<html lang="en">

<?php
include '../Config/DBconnect.php';
session_start();
$email = $_SESSION['email'];

if (isset($_POST['btnSubmit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $msg = $_POST['message'];

    $sql = "INSERT INTO contact (firstname, lastname, email, message) VALUES ('$fname', '$lname', '$email', '$msg')";
    if (mysqli_query($conn, $sql)) {
        header("Location: Contact.php");
        echo "Message send successfully.";
    }
}
?>

<head>
    <title>Viral Wave | Social Media Campaigns Ltd.</title>
    <link rel="icon" href="../Images/FavtIcon-removebg-preview.png">
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <!-- Main CSS -->
    <link rel="stylesheet" href="../CSS/vwstyle.css">

    <!-- FlatIcon Cdn -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <!-- Bootstrap Icon Cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <div class="head" id="header">
            <div class="Navigation">
                <div class="col-md-12">
                    <!-- This is for the black Info Bar. -->
                    <div class="info-bar">

                        <!-- This is for the Left side of the black Info Bar. -->
                        <div class="info-bleft">

                            <!-- This is for the Phone No. info. -->
                            <div class="info-bph">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary)" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                                <span class="info-btext">+(95)9 888 218 097</span>
                            </div>

                            <!-- This is for the Address info. -->
                            <div class="info-badd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary)" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                </svg>
                                <span>U Wisara Rd, Myaynigone Tsp, Yangon</span>
                            </div>
                        </div>

                        <!-- This is for the right side of the black Info Bar. -->
                        <div class="info-bright">

                            <!-- This is for the Working Hour. -->
                            <div class="info-bhour">
                                <span>
                                    We're Available Daily 6:00 am - 9:00 pm
                                </span>
                            </div>

                            <!-- This is for the Language Dropdown. -->
                            <div class="infolang">
                                <div class="dropdown open text-drop">
                                    <a class="dropdown-toggle dropdown" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0,0 25,15">
                                            <rect width="25" height="15" fill="#00247d" />
                                            <path d="M 0,0 L 25,15 M 25,0 L 0,15" stroke="#fff" stroke-width="3" />
                                            <path d="M 12.5,0 V 15 M 0,7.5 H 25" stroke="#fff" stroke-width="5" />
                                            <path d="M 12.5,0 V 15 M 0,7.5 H 25" stroke="#cf142b" stroke-width="3" />
                                        </svg>
                                        <span>
                                            English
                                        </span>
                                    </a>
                                    <div class="drop-bg dropdown-menu bg-dark" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="#">
                                            <img src="https://i.pinimg.com/564x/24/a3/af/24a3af7fc241c6c75bd0e5e8447a8c1e.jpg" alt="flag" width="20" height="15">
                                            <span class="info-btext">
                                                မြန်မာ
                                            </span>
                                        </a>

                                        <a class="dropdown-item" href="#">
                                            <img src="https://i.pinimg.com/564x/80/65/aa/8065aae906a04fd786b80aeaa551e74f.jpg" alt="Flag" width="20" height="15">
                                            <span class="info-btext">
                                                中文
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <nav class="navbar navbar-expand-lg bg-white">
                        <div class="container-fluid">

                            <!-- This is the Logo -->
                            <a class="navbar-brand" href="Home.php">
                                <img src="../Images/Web-logo-removebg-preview.png" alt="logo" width="150">
                            </a>

                            <!-- This is Toggle -->
                            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- This is SideBar -->
                            <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                                <!-- Sidebar Head -->
                                <div class="offcanvas-header text-white border-bottom">
                                    <h3 class="offcanvas-title" id="offcanvasNavbarLabel">Viral Wave</h3>

                                    <!-- The Close Button -->
                                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close" onclick="event.preventDefault();">
                                    </button>
                                </div>

                                <!-- Sidebar Body -->
                                <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0">
                                    <ul class="navbar-nav justify-content-center align-items-center fs-8 flex-grow-1 pe-3">

                                        <li class="nav-item mx-2">
                                            <a id="tcolor" class="nav-link" href="Home.php">Home</a>
                                        </li>

                                        <li class="nav-item mx-2">
                                            <a id="tcolor" class="nav-link" href="Services.php">Services</a>
                                        </li>

                                        <li class="nav-item mx-2">
                                            <a id="tcolor" class="nav-link" href="SocialMediaApp.php">Social Media Apps</a>
                                        </li>

                                        <li class="nav-item mx-2">
                                            <a id="tcolor" class="nav-link" href="ParentHub.php">Parent Hub</a>
                                        </li>

                                        <li class="nav-item mx-2">
                                            <a id="tcolor" class="nav-link" href="liveStreaming.php">LiveStreaming</a>
                                        </li>

                                        <li class="nav-item mx-2">
                                            <a id="tcolor" class="nav-link" href="Information.php">Information</a>
                                        </li>

                                        <li class="nav-item mx-2">
                                            <a id="tcolor" class="nav-link active" aria-current="page" href="#">Contact Us</a>
                                        </li>
                                    </ul>

                                    <!-- User Account -->
                                    <div class="dropdown open">
                                        <a class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="#" width="36" height="36" class="rounded-5">
                                            <?php echo $email ?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a class="dropdown-item" href="#">
                                                <i class="fi fi-rr-circle-user"></i>
                                                &nbsp;Profile</a>
                                            <a class="dropdown-item" href="../Log/logout.php">
                                                <i class="fi fi-rr-power"></i>
                                                &nbsp;Log Out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main>
        <!-- This is the About Us Section -->
        <section id="Contactus">
            <div class="container mb-5">
                <div class="row align-items-stretch no-gutters contact-wrap">
                    <div class="col-md-6">

                        <div class="form h-100">
                            <h3>Contact Us from HERE!</h3>
                            <form class="mb-5" method="POST" id="contactForm" name="contactForm" action="#">
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="fname" class="col-form-label">First Name *</label>
                                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Your First name" required>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="lname" class="col-form-label">Last Name *</label>
                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Your Last name" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="" class="col-form-label">Email *</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="message" class="col-form-label">Message *</label>
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="3" placeholder="Write your message" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group mt-4">
                                        <input type="submit" name="btnSubmit" value="Send Message" class="btn btn-danger rounded-4 py-2 px-4">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1350.3765435649884!2d96.14146588512875!3d16.804432573562547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb5b34c3e1e7%3A0x3868066c7b2c32d3!2sStrategy%20First%20University%20-%20Teaching%20Centre%202%20(UWisara)!5e0!3m2!1sen!2smm!4v1719323267399!5m2!1sen!2smm" width="100%" height="100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="py-2"></iframe>
                    </div>
                </div>
            </div>

            <!-- This is for the Sponsorship. -->
            <div class="sponsorship mb-3">
                <h3 class="text-center fw-bold text-decoration-underline">Meet Our Sponsors</h3>

                <div class="logos">
                    <div class="long-slide">
                        <img src="https://purepng.com/public/uploads/large/purepng.com-ibm-logologobrand-logoiconslogos-251519939176ka7y8.png" alt="IBM">

                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Cisco_logo_blue_2016.svg/1280px-Cisco_logo_blue_2016.svg.png" alt="CISCO">

                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/F-Secure_Logo.png/1200px-F-Secure_Logo.png" alt="F-SECURE">

                        <img src="https://companieslogo.com/img/orig/NVDA_BIG.D-ffbdc3fe.png?t=1633073585" alt="Nvidia">

                        <img src="../Images/microsoft_PNG16.png" alt="Microsoft">

                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Blackberry_Logo.svg/2560px-Blackberry_Logo.svg.png" class="bg-white" alt="BlackBerry">

                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Logo_da_Rolex.png/2560px-Logo_da_Rolex.png" alt="ROLEX">

                        <img src="https://seeklogo.com/images/R/rolls-royce-logo-24811DB90B-seeklogo.com.png" class="bg-white" alt="RR">

                        <img src="https://i0.wp.com/precisiondriversunlimited.com/wp-content/uploads/2018/03/toyota-logo-free-download-png.png?fit=1200%2C852&ssl=1&w=640" alt="toyota" height="100px">

                        <img src="https://pngimg.com/uploads/bmw_logo/bmw_logo_PNG19711.png" alt="bmw">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <a id="topBtn" href="#header"><i class="bi bi-arrow-up-square-fill"></i></a>

    <footer>
        <section id="footer">
            <div class="foot-logo">
                <img src="../Images/Web-logo-removebg-textwhite.png" alt="logo">
            </div>
            <div class="foot-info mb-3">

                <!-- Info footer phone and address -->
                <div class="finfo">

                    <!-- This is for the Phone No. info. -->
                    <div class="info-bph">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary)" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                        </svg>
                        <p class="d-inline info-subtext ms-2">
                            <strong>Call us 24/7</strong><br>
                            <span class="info-btext ms-4">+(95)9 888 218 097</span>
                        </p>
                    </div>

                    <!-- This is for the Address info. -->
                    <div class="info-badd">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary)" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <p class="d-inline info-subtext ms-2">
                            <strong>We are Here</strong><br>
                            <span class="info-btext ms-4">U Wisara Rd, Myaynigone Tsp,</span><br>
                            <span class="info-btext ms-4">Yangon.</span>
                        </p>
                    </div>
                </div>

                <!-- Open Hour -->
                <div class="finfo">
                    <h4>Open Hours</h4>
                    <span>
                        Mon - Fri :&emsp;6:00 am - 9:00 pm<br>
                        Saturday&ensp;:&emsp;6:00 am - 11:00 pm<br>
                        Sunday&ensp;:&emsp;Closed
                    </span>
                </div>

                <!-- Contact Us -->
                <div class="finfo">
                    <h4>Need Help? We are</h4>
                    <h4>Here to Help You!</h4>
                </div>
            </div>

            <div class="cright border-top py-2">
                <span>
                    Copyright &copy; 2024 ViralWave by <a class="text-light" href="#header">SocialMediaCampaignsLtd</a>.
                    All Rights Reserved.
                </span>
            </div>
        </section>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script src="../JS/script.js"></script>
</body>

</html>