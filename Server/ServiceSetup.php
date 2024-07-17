<!DOCTYPE html>
<html lang="en">

<?php
include '../Config/DBconnect.php';
session_start();
$email = $_SESSION['email'];

// Create service
if (isset($_POST['btnCreate'])) {

    $desc = $_POST['desc'];
    $information = $_POST['info'];
    $price = $_POST['price'];

    // File upload Variable
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Read the file name
        $ser_image = $_FILES['image']['name'];
        // Read the file Path
        $tmp_name = $_FILES['image']['tmp_name'];
    }

    $insert_sql = "INSERT INTO web_services (description, information, price, image) VALUES ('$desc','$information','$price', '$ser_image')";
    $result_sql = $conn->query($insert_sql);

    if ($result_sql) {
        echo "<script>alert('New Service added successfully!');</script>";

        // Upload the image to the Safety_Media folder
        move_uploaded_file($tmp_name, "../Images/Safety_Media/" . $ser_image);

        // Redirect to User List Page
        header("Location: ServiceSetup.php");
    } else {
        echo "<script>alert('Failed to add service!');</script>";
    }
}

// Edit Service Status
// the id of the row will be selected (and show in url) when Edit button is clicked
if (isset($_GET['edit_id'])) {
    $Eid = $_GET['edit_id'];
    $sql_show = "SELECT * FROM web_services WHERE id = '$Eid'";
    $editResult = $conn->query($sql_show);
    $row = $editResult->fetch_assoc();
}

// the related data row will be updated when Update button is clicked
if (isset($_POST['btnEdit'])) {

    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $information = $_POST['info'];

    // File upload Variable
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Read the file name
        $ser_image = $_FILES['image']['name'];
        // Read the file Path
        $tmp_name = $_FILES['image']['tmp_name'];
    }

    if (!empty($ser_image)) {
        $sql_update = "UPDATE web_services SET description = '$desc', information = '$information', price = '$price', image = '$ser_image' WHERE id = " . $_GET['edit_id'];
    } else {
        $sql_update = "UPDATE web_services SET description = '$desc', information = '$information', price = '$price' WHERE id = " . $_GET['edit_id'];
    }
    $result_query = $conn->query($sql_update);

    if ($result_query) {
        echo "<script>alert('Service Updated');</script>";

        // delete the existing image if a new image is uploaded
        if (!empty($ser_image)) {
            unlink("../Images/Safety_Media/" . $row['image']);
        }

        // Upload to Safety_Media Folder
        move_uploaded_file($tmp_name, "../Images/Safety_Media/" . $ser_image);

        // Redirect to ServiceSetup.php After the update is completed
        header("Location: ServiceSetup.php");
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}

// the related data row will be deleted when Delete button is clicked
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM web_services WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Deleted Successfully";
        header("Location: ServiceSetup.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$row_num = 1;

$sql = "SELECT * FROM web_services";
$result = $conn->query($sql);

$sql_img = "SELECT profile, name FROM user_info WHERE email = '$email'";
$result_img = $conn->query($sql_img);
$card = $result_img->fetch_assoc();
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
            <li class="active">
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
        <ul class="side-menu">
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
                        &nbsp;<?php echo $email; ?>
                    </a>
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
                    <h1>Service Setup</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class="fi fi-rr-angle-small-right"></i></li>
                        <li>
                            <a class="active" href="ServiceSetup.php">Service Setup</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="mb-4">Add New Service</h3>

                        <!-- Service Setup Form -->
                        <form action="#" method="POST" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <!-- Upload Service Image -->
                                    <div class="form-group">
                                        <label for="service_image">Image *</label>
                                        <input type="file" class="form-control" id="service_image" accept="image/*" name="image">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4">
                                    <!-- Upload Description -->
                                    <label for="desc">Description *</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" id="desc" name="desc" class="form-control" placeholder="Write a description" aria-label="description" aria-describedby="addon-wrapping" value="<?php echo (isset($row['description']) ? $row['description'] : ""); ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4">
                                    <!-- Upload Price -->
                                    <label for="price">Set Price *</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" name="price" aria-label="Amount (to the nearest dollar)" id="price" value="<?php echo (isset($row['price']) ? $row['price'] : ""); ?>">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 mb-4">
                                    <!-- Upload Information -->
                                    <div class="form-group">
                                        <label for="service_information">Information *</label>
                                        <textarea name="info" class="form-control" id="service_information" rows="4" placeholder="Enter Information" required><?php echo (isset($row['information']) ? $row['information'] : ""); ?></textarea>
                                    </div>
                                </div>

                                <div class="d-grid gap-1 col-md-4">
                                    <?php if (isset($_GET['edit_id'])) {
                                    ?>
                                        <input type="submit" name="btnEdit" value="Update Service" class="text-white btn btn-danger">
                                        <a href="ServiceSetup.php" class="d-grid gap-1"><input type="button" value="Cancel" class="text-white btn btn-secondary"></a>
                                    <?php } else { ?>
                                        <input type="submit" name="btnCreate" value="Create Service" class="text-white btn btn-danger">
                                        <input type="reset" value="Cancel" class="text-white btn btn-secondary">
                                    <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>



                <div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table table-secondary table-striped table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Descriptoin</th>
                                <th>Information</th>
                                <th>Price($)</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <th><?php echo $row_num; ?></th>
                                    <?php $row_num++; ?>
                                    <td>
                                        <img src="<?php echo "../Images/Safety_Media\\" . $row['image']; ?>" alt="service" class="img-fluid" width="150" height="150">
                                    </td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['information']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a class="btn btn-success" role="button" href="ServiceSetup.php?edit_id=<?php echo $row['id']; ?>">
                                            <i class="fi fi-rr-edit"></i>
                                            &nbsp;Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <a class="btn btn-danger mt-2" role="button" href="ServiceSetup.php?delete_id=<?php echo $row['id']; ?>">
                                            <i class="fi fi-rr-trash"></i>
                                            &nbsp;Delete
                                        </a>
                                    </td>
                                </tr>
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