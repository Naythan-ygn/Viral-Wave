<!DOCTYPE html>
<html lang="en">

<?php
include '../Config/DBconnect.php';
session_start();
$email = $_SESSION['email'];


$sql_show = "SELECT * FROM user_inquiries";
$result = mysqli_query($conn, $sql_show);

$sql_img = "SELECT profile, name FROM user_info WHERE email = '$email'";
$result_img = $conn->query($sql_img);
$card = $result_img->fetch_assoc();

// the related data row will be deleted when Delete button is clicked
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM user_inquiries WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Deleted Successfully";
        header("Location: ContactList.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$row_num = 1;
?>

<head>
    <title>Viral Wave | Social Media Campaigns Ltd.</title>
    <link rel="icon" href="../Images/FavtIcon-removebg-preview.png">
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- FlatIcons Cdn -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <!-- Bootstrap Cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- My CSS -->
    <link rel="stylesheet" href="../CSS/AdminDashboard.css">
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="Adminindex.php" class="brand">
            <img src="../Images/FavtIcon-removebg-preview.png" alt="Logo" width="50" class="mx-2">
            <span class="text mt-3">
                Viral Wave <br> (SMC Ltd.)
            </span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="Adminindex.php">
                    <i class="fi fi-rr-layout-fluid"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="SocialMediaSetup.php">
                    <i class="fi fi-rr-bookmark"></i>
                    <span class="text">Social Media Setup</span>
                </a>
            </li>
            <li>
                <a href="ParentHubSetup.php">
                    <i class="fi fi-rr-family"></i>
                    <span class="text">Parent Hub Setup</span>
                </a>
            </li>
            <li>
                <a href="ServiceSetup.php">
                    <i class="fi fi-rr-404"></i>
                    <span class="text">Service Setup</span>
                </a>
            </li>
            <li>
                <a href="NewsletterSetup.php">
                    <i class="fi fi-rr-add-document"></i>
                    <span class="text">Newsletter Setup</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu top">
            <li>
                <a href="UserList.php">
                    <i class="fi fi-rr-user-add"></i>
                    <span class="text">User List</span>
                </a>
            </li>
            <li>
                <a href="Sales.php">
                    <i class="fi fi-rr-chart-mixed-up-circle-dollar"></i>
                    <span class="text">Sales</span>
                </a>
            </li>
            <li class="active">
                <a href="ContactList.php">
                    <i class="fi fi-rr-comment-alt"></i>
                    <span class="text">Contact List</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="../Log/logout.php" class="logout">
                    <i class="fi fi-rr-power"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class="fi fi-rr-menu-burger"></i>
            <a href="#" class="nav-link">Categories</a>
            <div class="col-md-8"></div>

            <!-- This is message notification -->
            <?php
            $sql_msg = "SELECT * FROM user_inquiries";
            $result_msg = $conn->query($sql_msg);

            if ($result_msg) {
                $msg_no = $result_msg->num_rows;
            }
            ?>
            <div class="notification">
                <i class="fi fi-rr-bell"></i>
                <span class="num">
                    <?php echo $msg_no; ?>
                </span>
            </div>

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
                        &nbsp;<?php echo $email; ?></a>
                    <a class="dropdown-item" href="../Log/logout.php">
                        <i class="fi fi-rr-power"></i>
                        &nbsp;Log Out</a>
                </div>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Contact List</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class="fi fi-rr-angle-small-right"></i></li>
                        <li>
                            <a class="active" href="ContactList.php">Contact List</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Contact Message -->
            <section id="Cont-list">
                <h2>
                    Contact Messages & Feedback
                </h2>
                <table class="table table-bordered table-striped table-wrap mt-3">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row_num; ?></th>
                            <?php $row_num++; ?>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td>
                                <a href="ContactList.php?delete_id=<?php echo $row['id']; ?>" role="button" class="btn btn-danger" type="submit" name="btnDelete">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </section>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script src="../JS/sidebarmenu.js"></script>
</body>

</html>