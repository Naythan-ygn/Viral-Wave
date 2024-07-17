<!DOCTYPE html>
<html lang="en">
<?php
include '../Config/DBconnect.php';
session_start();
$email = $_SESSION['email'];

// Create Social Account
if (isset($_POST['btnSave'])) {

    $acc_type = $_POST['utype'];
    $price = $_POST['price'];

    $insert_sql = "INSERT INTO acc_lvl_revenue (user_type, price) VALUES ('$acc_type', '$price')";
    $result_sql = $conn->query($insert_sql);

    if ($result_sql) {
        echo "<script>alert('Account Level added successfully!');</script>";

        // Redirect to Sale Revenue Page
        header("Location: Sales.php");
    } else {
        echo "<script>alert('Failed to add Account level setting!');</script>";
    }
}

// Edit Account Level PriceList
// the id of the row will be selected (and show in url) when Edit button is clicked
if (isset($_GET['edit_id'])) {
    $Eid = $_GET['edit_id'];
    $sql_select = "SELECT * FROM acc_lvl_revenue WHERE acc_level = '$Eid'";
    $editResult = $conn->query($sql_select);
    $row = $editResult->fetch_assoc();
}

// the related data row will be updated when Update button is clicked
if (isset($_POST['btnEdit'])) {

    $acc_type = $_POST['utype'];
    $price = $_POST['price'];


    $sql_update = "UPDATE acc_lvl_revenue SET user_type = '$acc_type', price = '$price' WHERE acc_level = " . $_GET['edit_id'];
    $result_query = $conn->query($sql_update);

    if ($result_query) {
        echo "<script>alert('Account Level Updated');</script>";

        // Redirect to Sales.php After the update is completed
        header("Location: Sales.php");
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}

// Retrieve User Info from the Server
$sql_img = "SELECT profile, name FROM user_info WHERE email = '$email'";
$result_img = $conn->query($sql_img);
$show = $result_img->fetch_assoc();

// Retrieve Price Data
$sql_rev = "SELECT * FROM acc_lvl_revenue";
$result_rev = $conn->query($sql_rev);

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
            <li class="active">
                <a href="Sales.php">
                    <i class="fi fi-rr-chart-mixed-up-circle-dollar"></i>
                    <span class="text">Sales</span>
                </a>
            </li>
            <li>
                <a href="ContactList.php">
                    <i class="fi fi-rr-comment-alt"></i>
                    <span class="text">Contact List</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="/Log/logout.php" class="logout">
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
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class="fi fi-rr-search"></i></button>
                </div>
            </form>

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
                    <?php if (empty($show['profile'])) { ?>
                        <img src="../Images/default_profile.png" class="rounded-5" width="36" height="36" alt="image">
                    <?php } else { ?>
                        <img src="<?php echo "../Images/UploadedImages\\" . $show['profile']; ?>" class="rounded-5" width="36" height="36" alt="image">
                    <?php }
                    echo $show['name']; ?>
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
                    <h1>Sale Revenue</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class="fi fi-rr-angle-small-right"></i></li>
                        <li>
                            <a class="active" href="Sales.php">Sales</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Account Level price setup form -->
            <div class="container-fluid">
                <!-- Account Level Price Setup & List -->
                <div class="row">
                    <h2>
                        Account Level Setup
                    </h2>

                    <div class="col-md-4">
                        <!-- Price Setup form -->
                        <form action="#" method="POST" class="mt-3">
                            <div class="row">
                                <!-- Checking the User Type -->
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Enter Account Type *</label>
                                    <select class="form-select text-center" aria-label="Default select example" name="utype">
                                        <?php
                                        if (isset($_GET['edit_id'])) {
                                        ?>
                                            <option value="<?php echo ($row['user_type']); ?>"><?php echo ($row['user_type']); ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option selected hidden disabled>--- Select the Account Type ---</option>
                                        <?php } ?>

                                        <option value="Free">Free</option>
                                        <option value="Standard">Standard</option>
                                        <option value="Premium">Premium</option>
                                    </select>
                                </div>

                                <!-- Price Setup -->
                                <div class="mb-3">
                                    <label for="priceSetup" class="form-label">Set Price *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" name="price" id="priceSetup" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo (isset($row['price']) ? $row['price'] : ""); ?>" placeholder="Set the value (0.00)">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>

                                <!-- Control Button -->
                                <div class="text-end mb-4">
                                    <?php
                                    if (isset($_GET['edit_id'])) {
                                    ?>
                                        <input type="submit" id="submit" class="btn btn-danger mt-3 me-3 px-5 py-2" value="Update" name="btnEdit">
                                        <a href="Sales.php"><input type="button" class="btn btn-secondary mt-3 ms-3 px-5 py-2" value="Cancel"></a>
                                    <?php } else { ?>
                                        <input type="submit" id="submit" class="btn btn-danger mt-3 me-3 px-5 py-2" value="Save" name="btnSave">
                                        <input type="reset" class="btn btn-secondary mt-3 ms-3 px-5 py-2" value="Cancel">
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-8">
                        <!-- Price List -->
                        <?php if ($result_rev->num_rows > 0) { ?>
                            <table class="table table-bordered table-secondary text-center">
                                <thead class="table-danger">
                                    <tr>
                                        <th>#</th>
                                        <th>User Type</th>
                                        <th>Acc Level</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = $result_rev->fetch_assoc()) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $row_num . "."; ?></th>
                                            <?php $row_num++; ?>
                                            <td><?php echo $row['user_type']; ?></td>
                                            <td>
                                                <?php echo $row['acc_level']; ?>
                                            </td>
                                            <td><?php echo "$ " . $row['price'] . ".00 / Month"; ?></td>
                                            <td class="text-center">
                                                <!-- Edit Button -->
                                                <a class="btn btn-success" role="button" href="Sales.php?edit_id=<?php echo $row['acc_level']; ?>">
                                                    <i class="fi fi-rr-edit"></i>
                                                    &nbsp;Edit
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                } ?>
                            </table>
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h2>
                        User's Subscription History
                    </h2>
                    <div class="col-md-12">
                        <!-- List of Users Subscribed to Viralwave -->
                        <?php
                        $sql_users = "SELECT name, email, subs_times, user_type, acc_level, price FROM user_info, acc_lvl_revenue WHERE user_type_id = acc_level AND user_type_id <> 0 ORDER BY name DESC";
                        $result_users = $conn->query($sql_users);
                        $row_num1 = 1;
                        ?>
                        <table class="table table-bordered table-danger table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>User Type</th>
                                    <th>Account Level</th>
                                    <th>No. of Times Users Subscribed</th>
                                    <th>Total Amount</th>
                                </tr>
                            </thead>
                            <?php
                            while ($user_row = $result_users->fetch_assoc()) {
                            ?>
                                <tbody class="table-secondary">
                                    <tr>
                                        <th><?php echo $row_num1; ?></th>
                                        <?php $row_num1++; ?>
                                        <td><?php echo $user_row['name']; ?></td>
                                        <td><?php echo $user_row['email']; ?></td>
                                        <td><?php echo $user_row['user_type']; ?></td>
                                        <td><?php echo $user_row['acc_level']; ?></td>
                                        <td><?php echo $user_row['subs_times']; ?></td>
                                        <td>
                                            <?php
                                            $total = $user_row['subs_times'] * $user_row['price'];
                                            echo "$ " . $total . ".00";
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
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