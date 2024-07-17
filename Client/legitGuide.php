<!doctype html>
<html lang="en">

<?php
include '../Config/DBconnect.php';
session_start();
$email = $_SESSION['email'];

// Retrieve user information from the database
$sql_img = "SELECT profile, name, user_type_id FROM user_info WHERE email = '$email'";
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
                                            <a id="tcolor" class="nav-link" aria-current="page" href="#">Social
                                                Media Apps</a>
                                        </li>

                                        <?php if (($card['user_type_id'] <> $user[0]) && ($card['user_type_id'] <> $user[1])) { ?>
                                            <li class="nav-item mx-2">
                                                <a id="tcolor" class="nav-link" href="ParentHub.php">Parent Hub</a>
                                            </li>
                                        <?php } ?>

                                        <!-- Only Free users do not have access to this page -->
                                        <?php
                                        if (($card['user_type_id'] <> $user[0])) {
                                        ?>
                                            <li class="nav-item mx-2">
                                                <a id="tcolor" class="nav-link" href="Newsletter.php">Newsletter</a>
                                            </li>
                                        <?php
                                        }  ?>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" id="tcolor" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Other</a>
                                            <ul class="dropdown-menu bg-secondary">
                                                <li class="nav-item mx-2">
                                                    <a id="tcolor" class="nav-link" href="liveStreaming.php">LiveStreaming</a>
                                                </li>
                                                <li class="nav-item mx-2">
                                                    <a id="tcolor" class="nav-link" href="Information.php">Information</a>
                                                </li>
                                                <li class="nav-item mx-2">
                                                    <a id="tcolor" class="nav-link" href="htsso.php">How to Stay Safe Online</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li class="nav-item mx-2">
                                                    <a id="tcolor" class="nav-link" href="Contact.php">Contact Us</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item mx-2">
                                            <a id="tcolor" class="nav-link active" href="legitGuide.php">Legislation & Guidance</a>
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
                                            echo "<span id='tcolor'>" . $card['name'] . "</span>"; ?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a class="dropdown-item" href="#">
                                                <i class="fi fi-rr-circle-user"></i>
                                                &nbsp;<?php echo $email; ?></a>
                                            <a class="dropdown-item" href="../Log/logout.php">
                                                <i class="fi fi-rr-power"></i>
                                                &nbsp;Log Out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <div class="notification">
                        <!-- Notification -->
                        <?php
                        $sql_time = "SELECT * FROM user_info WHERE email = '$email'";
                        $result_time = mysqli_query($conn, $sql_time);
                        $row_time = $result_time->fetch_assoc();

                        $update_time = strtotime($row_time['created_at']);
                        $cur_time = strtotime(date('Y-m-d'));

                        $diff = $cur_time - $update_time;
                        $days = floor($diff / (60 * 60 * 24));

                        $filter = $row_time['user_type_id'] <> 1;

                        if ($filter && $days >= 23 && $days <= 30) {
                        ?>
                            <p class="text-warning bg-warning bg-opacity-10 border border-warning">
                                <strong>Dear <?php echo $card['name']; ?> , your subscription will drop to Free tier soon!</strong>
                            </p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 justify-text">
                    <header>
                        <h1>Legislation and Guidance: Ensuring Online Safety for Teenagers</h1>
                        <p class="intro text-dark">Understanding the legislation and guidance related to online safety is crucial for teenagers, parents, and educators. This page provides an overview of key laws and guidelines that help protect young people on the internet.</p>
                    </header>

                    <section class="legislation">
                        <h2>Child Online Protection Act (COPA)</h2>
                        <p class="text-dark">The Child Online Protection Act (COPA) was enacted to protect minors from harmful online content. It mandates that websites and online services restrict access to inappropriate materials for children under 13.</p>
                        <ul>
                            <li>Websites must use age verification mechanisms.</li>
                            <li>Violations can lead to fines and other penalties.</li>
                            <li>Parents have the right to monitor and control their children's online activities.</li>
                        </ul>
                    </section>

                    <section class="legislation">
                        <h2>Children's Online Privacy Protection Act (COPPA)</h2>
                        <p class="text-dark">The Children's Online Privacy Protection Act (COPPA) focuses on protecting the privacy of children under 13. It regulates how websites collect, use, and disclose personal information from young users.</p>
                        <ul>
                            <li>Websites must obtain verifiable parental consent before collecting personal data from children.</li>
                            <li>Parents can review, delete, and control the data collected about their children.</li>
                            <li>Operators must provide a clear privacy policy.</li>
                        </ul>
                    </section>

                    <section class="legislation">
                        <h2>General Data Protection Regulation (GDPR)</h2>
                        <p class="text-dark">The General Data Protection Regulation (GDPR) is a comprehensive data protection law in the European Union. It includes specific provisions to safeguard children's data online.</p>
                        <ul>
                            <li>Parental consent is required for processing personal data of children under 16.</li>
                            <li>Children have the right to be forgotten, meaning their data can be deleted upon request.</li>
                            <li>Websites must use age-appropriate language in their privacy notices.</li>
                        </ul>
                    </section>

                    <section class="legislation">
                        <h2>Digital Economy Act</h2>
                        <p class="text-dark">The Digital Economy Act is a UK law aimed at regulating digital services and ensuring online safety. It includes measures to protect children from harmful online content.</p>
                        <ul>
                            <li>Age verification is required for accessing adult content.</li>
                            <li>Platforms must take steps to prevent minors from accessing inappropriate material.</li>
                            <li>Enforcement mechanisms include fines and website blocking.</li>
                        </ul>
                    </section>

                    <section class="legislation">
                        <h2>Online Harms White Paper</h2>
                        <p class="text-dark">The Online Harms White Paper outlines the UK government's approach to tackling online harms and improving internet safety. It proposes a regulatory framework to hold companies accountable.</p>
                        <ul>
                            <li>Establishment of an independent regulator.</li>
                            <li>Duty of care for companies to protect users from harmful content.</li>
                            <li>Emphasis on transparency and accountability.</li>
                        </ul>
                    </section>

                    <section class="legislation">
                        <h2>Cyberbullying and Harassment Laws</h2>
                        <p class="text-dark">Various countries have specific laws to address cyberbullying and online harassment. These laws aim to protect individuals, especially teenagers, from online abuse.</p>
                        <ul>
                            <li>Cyberbullying is considered a criminal offense in many jurisdictions.</li>
                            <li>Victims can report incidents to law enforcement.</li>
                            <li>Schools and institutions often have policies and resources to support affected students.</li>
                        </ul>
                    </section>

                    <section class="legislation">
                        <h2>Parental Guidance and Responsibilities</h2>
                        <p class="text-dark">While legislation provides a framework for online safety, parental guidance is crucial in protecting children from online risks. Parents should be proactive in educating their children and monitoring their online activities.</p>
                        <ul>
                            <li>Encourage open communication about online experiences.</li>
                            <li>Set clear rules and boundaries for internet use.</li>
                            <li>Use parental control tools to restrict access to inappropriate content.</li>
                        </ul>
                    </section>

                    <section class="legislation">
                        <h2>Educational Resources and Programs</h2>
                        <p class="text-dark">Various organizations and programs offer resources to educate teenagers about online safety and digital citizenship. These initiatives aim to empower young users with the knowledge and skills to navigate the internet safely.</p>
                        <ul>
                            <li>Schools can integrate digital literacy into their curriculum.</li>
                            <li>Online platforms often provide safety centers with tips and guidelines.</li>
                            <li>Community programs and workshops can raise awareness and provide support.</li>
                        </ul>
                    </section>

                    <section class="legislation">
                        <h2>Conclusion</h2>

                        <p class="conclusion text-dark">Understanding the legislation and guidance related to online safety is essential for protecting teenagers in the digital world. By staying informed about the laws and utilizing available resources, young people, parents, and educators can work together to create a safer online environment. Stay educated, stay vigilant, and stay safe!</p>
                    </section>

                </div>
            </div>
        </div>
    </main>

    <a id="topBtn" href="#header"><i class="bi bi-arrow-up-square-fill"></i></a>

    <footer>
        <section id="footer">
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