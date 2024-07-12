<!doctype html>
<html lang="en">

<?php
include '../Config/DBconnect.php';
session_start();
$email = $_SESSION['email'];

$sql_img = "SELECT profile, name, user_type FROM user WHERE email = '$email'";
$result_img = $conn->query($sql_img);
$card = $result_img->fetch_assoc();

$user = array(1, 2);
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

    <!-- Bootstrap CSS v5.3.2 -->
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
                            <a class="navbar-brand" href="#">
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
                                            <a id="tcolor" class="nav-link" aria-current="page" href="Home.php">Home</a>
                                        </li>

                                        <li class="nav-item mx-2">
                                            <a id="tcolor" class="nav-link" href="Services.php">Services</a>
                                        </li>

                                        <li class="nav-item mx-2">
                                            <a id="tcolor" class="nav-link" href="SocialMediaApp.php">Social Media
                                                Apps</a>
                                        </li>

                                        <?php
                                        if (($card['user_type'] <> $user[1]) && ($card['user_type'] <> $user[0])) {
                                        ?>
                                            <li class="nav-item mx-2">
                                                <a id="tcolor" class="nav-link" href="ParentHub.php">Parent Hub</a>
                                            </li>
                                        <?php
                                        }  ?>


                                        <!-- Only Free users do not have access to this page -->
                                        <?php
                                        if (($card['user_type'] <> $user[0])) {
                                        ?>
                                            <li class="nav-item mx-2">
                                                <a id="tcolor" class="nav-link" href="Newsletter.php">Newsletter</a>
                                            </li>
                                        <?php
                                        }  ?>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Other</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item mx-2">
                                                    <a id="tcolor" class="nav-link" href="liveStreaming.php">LiveStreaming</a>
                                                </li>
                                                <li class="nav-item mx-2">
                                                    <a id="tcolor" class="nav-link" href="Information.php">Information</a>
                                                </li>
                                                <li class="nav-item mx-2">
                                                    <a id="tcolor" class="nav-link active" href="#">How to Stay Safe Online</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li class="nav-item mx-2">
                                                    <a id="tcolor" class="nav-link" href="Contact.php">Contact Us</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                    <!-- User Account -->
                                    <div class="dropdown open">
                                        <a class="btn dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php if (empty($card['profile'])) { ?>
                                                <img src="../Images/default_profile.png" class="rounded-5" width="36" height="36" alt="image">
                                            <?php } else { ?>
                                                <img src="<?php echo "../Images/UploadedImages\\" . $card['profile']; ?>" class="rounded-5" width="36" height="36" alt="image">
                                            <?php }
                                            echo $card['name']; ?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a class="dropdown-item" href="#">
                                                <i class="fi fi-rr-circle-user"></i>
                                                &nbsp;<?php echo $email ?></a>
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
        <section id="content">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h2 class="fw-bold">
                            How to Stay Safe Online: <br>
                        </h2>
                        <span class="text-secondary fs-4">Essential Tips for Teenagers</span>
                        <!-- How to stay safe Online Tips and Tricks Articles -->
                        <div id="carouselExampleAutoplaying" class="carousel slide mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Images/protect_per_info.jpeg" class="d-block w-100 rounded-3" height="350" alt="Img1">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Images/Avoid_phising.jpg" class="d-block w-100 rounded-3" height="350" alt="Img2">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Images/staysafe.jfif" class="d-block w-100 rounded-3" height="350" alt="Img3">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <div class="container-fluid mb-3">
                            <div class="row p-3 bg-danger text-danger bg-opacity-10 border border-danger border-bottom-0 rounded-top">
                                <div class="col-md-12">
                                    <h4>
                                        Stay Safe on Any Social Media Platform
                                    </h4>
                                </div>
                            </div>
                            <div class="row p-3 bg-secondary bg-opacity-10 border border-dark border-top-0 rounded-bottom">
                                <div class="col-md-6">
                                    <!-- Article 1 -->
                                    <div class="article">
                                        <p class="text-dark"><strong>
                                                Protect Your Personal Information
                                            </strong></p>
                                        <p class="justify-text">
                                            &emsp; Your personal information is valuable, and it's important to keep it private. Avoid sharing sensitive details such as your home address, phone number, and financial information online. Be cautious about what you post on social media, as even seemingly harmless information can be used to piece together your identity.
                                        </p>
                                    </div>
                                    <div class="article">
                                        <p class="text-dark"><strong>
                                                Create Strong, Unique Passwords
                                            </strong></p>
                                        <p class="justify-text">
                                            &emsp; Using strong and unique passwords for your online accounts is one of the most effective ways to protect yourself from hacking. Avoid using easily guessable passwords such as "123456" or "password."
                                        </p>
                                    </div>
                                    <div class="article">
                                        <p class="text-dark"><strong>
                                                Be Cautious with Online Friends
                                            </strong></p>
                                        <p class="justify-text">
                                            &emsp; While the internet allows you to connect with people from all over the world, it's important to be cautious about forming relationships with strangers online. Not everyone may have good intentions.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Article 2 -->
                                    <div class="article">
                                        <p class="text-dark"><strong>
                                                Monitor Your Digital Footprint
                                            </strong></p>
                                        <p class="justify-text">
                                            &emsp; Everything you do online leaves a digital footprint, which can impact your reputation and future opportunities. Be mindful of your online activities and how they reflect on you.
                                        </p>
                                    </div>
                                    <div class="article my-3    ">
                                        <img src="../Images/stayTip.jpg" class="img-fluid" alt="image">
                                    </div>
                                    <div class="article">
                                        <p class="text-dark"><strong>
                                                Stay Safe During Live Streams
                                            </strong></p>
                                        <p class="justify-text">
                                            &emsp; Live streaming can be a fun way to share your experiences and interact with others in real time. However, it's important to take steps to protect your privacy and safety during live broadcasts.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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

    <!-- Main JS -->
    <script src="../JS/script.js"></script>
</body>

</html>