<!DOCTYPE html>
<html lang="en">

<?php
include '../Config/DBconnect.php';
session_start();
$email = $_SESSION['email'];

// Create a Newsletter
if (isset($_POST['btnAdd'])) {

    $title = $_POST['title'];
    $desc = $_POST['description'];

    // File upload Variable
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Read the file name
        $newsImage = $_FILES['image']['name'];
        // Read the file Path
        $tmp_name = $_FILES['image']['tmp_name'];
    }

    // Use prepared statements with parameterized queries
    $stmt = $conn->prepare("INSERT INTO monthly_newsletter (title, description, image1) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $desc, $newsImage);

    if ($stmt->execute()) {
        echo "<script>alert('A Newsletter added successfully!');</script>";

        // Upload the image to the Safety_Media folder
        move_uploaded_file($tmp_name, "../Images/Safety_Media/" . $newsImage);

        // Redirect to User List Page
        header("Location: NewsletterSetup.php");
    } else {
        echo "<script>alert('Failed to add a newsletter!');</script>";
    }

    $stmt->close();
}

// Edit News Articles
// the id of the row will be selected (and show in url) when Edit button is clicked
if (isset($_GET['edit_id'])) {
    $Eid = $_GET['edit_id'];
    $sql_show = "SELECT * FROM monthly_newsletter WHERE id = '$Eid'";
    $editResult = $conn->query($sql_show);
    $cont = $editResult->fetch_assoc();
}

// the related data row will be updated when Update button is clicked
if (isset($_POST['btnEdit'])) {

    $Eid = $_POST['hid'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $update_at = date("Y-m-d H:i:s");

    // File upload Variable
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Validate the file type
        $imageInfo = getimagesize($_FILES['image']['tmp_name']);


        if ($imageInfo !== false) {
            // Delete the existing image file from the server
            unlink("../Images/Safety_Media/" . $cont['image1']);

            // Upload the new image file to the server
            $newsImage = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "../Images/Safety_Media/" . $newsImage);
        } else {
            echo "<script>alert('Invalid image file.');</script>";
            return;
        }
    } else {
        // If no new image is uploaded, retain the existing image file
        $newsImage = $cont['image1'];
    }

    // Prepare the SQL update statement
    $stmt = $conn->prepare("UPDATE monthly_newsletter SET title = ?, description = ?, image1 = ?, publishdate = ? WHERE id = ?");

    // Bind the parameters to the prepared statement
    $stmt->bind_param("ssssi", $title, $desc, $newsImage, $update_at, $Eid);


    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "<script>alert('Newsletter Updated');</script>";

        // Redirect to User List Page
        header("Location: NewsletterSetup.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// the related data row will be deleted when Delete button is clicked
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM monthly_newsletter WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Deleted Successfully";
        header("Location: NewsletterSetup.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql_news = "SELECT * FROM monthly_newsletter";
$result_news = $conn->query($sql_news);

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
            <li>
                <a href="ServiceSetup.php">
                    <i class="fi fi-rr-404"></i>
                    <span class="text">Service Setup</span>
                </a>
            </li>
            <li class="active">
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
                    <h1>Newsletter Setup</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class="fi fi-rr-angle-small-right"></i></li>
                        <li>
                            <a class="active" href="NewsletterSetup.php">Newsletter Setup</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter Form Setup -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="#" method="POST" class="sticky-top" enctype="multipart/form-data">

                            <h3>Create a Newsletter</h3>

                            <!-- Newsletter ID -->
                            <input type="hidden" name="hid" value="<?php echo $cont['id']; ?>">

                            <!-- Newsletter Title -->
                            <div class="form-group mt-4">
                                <label for="title">Newsletter Title *</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?php echo (isset($cont['title']) ? $cont['title'] : ""); ?>" required>
                            </div>

                            <!-- Newsletter Description -->
                            <div class="form-group mt-4">
                                <label for="description">Newsletter Description *</label>
                                <textarea class="form-control" id="description" name="description" rows="5" placeholder="Write description ..." required><?php echo (isset($cont['description']) ? $cont['description'] : ""); ?></textarea>
                            </div>

                            <!-- Upload Newsletter Image -->
                            <div class="form-group mt-4">
                                <label for="image">Newsletter Image *</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>

                            <div class="col-md-12 form-group mt-4">
                                <?php if (isset($_GET['edit_id'])) {
                                ?>
                                    <!-- UPdate Button -->
                                    <input type="submit" value="Update" name="btnEdit" class="btn btn-danger rounded-4 py-2 px-4">
                                    <span class="submitting"></span>

                                    <!-- Cancel Button -->
                                    <a href="NewsletterSetup.php">
                                        <input type="button" class="btn btn-secondary rounded-4 py-2 px-5 ms-4" value="Cancel">
                                        <span class="submitting"></span>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <!-- Save Button -->
                                    <input type="submit" value="Save" name="btnAdd" class="btn btn-danger rounded-4 py-2 px-4">
                                    <span class="submitting"></span>

                                    <!-- Cancel Button -->
                                    <input type="reset" class="btn btn-secondary rounded-4 py-2 px-4 ms-4" value="Cancel">
                                    <span class="submitting"></span>
                                <?php
                                }
                                ?>
                            </div>
                        </form>
                    </div>


                    <!-- Newsletter Content List -->

                    <div class="mb-3 col-md-6">
                        <h3>
                            Contents
                        </h3>

                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <div class="col-md-8">
                                <?php
                                while ($cont = $result_news->fetch_assoc()) {

                                    if (isset($_GET['edit_id'])) {
                                        // If the edit button is clicked, fetch the user details based on the ID.
                                        $edit_id = $_GET['edit_id'];
                                        $query = "SELECT * FROM monthly_newsletter WHERE id = $edit_id";
                                        $result_news = $conn->query($query);
                                        $cont = $result_news->fetch_assoc();
                                    }
                                ?>
                                    <div class="card news-card bg-light border border-bottom border-2 mb-3">
                                        <img src="<?php echo "../Images/Safety_Media\\" . $cont['image1']; ?>" class="card-img-top text-dark" alt="...">

                                        <div class="card-body mt-4 mx-3">

                                            <h5 class="card-title text-dark">
                                                <strong>Article :</strong>
                                                <?php echo $cont['title']; ?>
                                            </h5>

                                            <p class="card-text text-dark desc mt-3">
                                                &emsp;&emsp;
                                                <?php echo $cont['description']; ?>
                                            </p>
                                            <p class="card-text mb-3">
                                                <!-- This content will show when did it published -->
                                                <small class="text-body-secondary">
                                                    <?php

                                                    // Set timezone to Bangkok to get accurate time difference 
                                                    // Since Myanmar timezone isn't available in php server, Closest timezone, Bangkok, has been chosen
                                                    date_default_timezone_set("Asia/Bangkok");

                                                    // Get the time difference between current time and published time
                                                    $published_time = strtotime($cont['publishdate']);
                                                    $cur = strtotime(date('Y-m-d H:i:s'));

                                                    $diff = $cur - $published_time;

                                                    $days = floor($diff / (60 * 60 * 24));
                                                    $hours = floor(($diff % (60 * 60 * 24)) / (60 * 60));
                                                    $minutes = floor(($diff % (60 * 60)) / 60);
                                                    $seconds = floor($diff % 60);

                                                    if ($days > 0) {
                                                        echo "Published <strong>$days</strong> days ago.";
                                                    } else if ($hours > 0) {
                                                        echo "Published <strong>$hours</strong> hours ago.";
                                                    } else if ($minutes > 0) {
                                                        echo "Published <strong>$minutes</strong> minutes ago.";
                                                    } else if ($seconds > 0) {
                                                        echo "Published <strong>$seconds</strong> seconds ago";
                                                    }
                                                    ?>
                                                </small>
                                            </p>
                                        </div>

                                        <div class="card-footer border border-top text-body-secondary d-flex">
                                            <!-- Edit Button -->
                                            <a class="btn btn-success col-md-6 rounded-0" role="button" href="NewsletterSetup.php?edit_id=<?php echo $cont['id']; ?>">
                                                <i class="fi fi-rr-edit"></i>
                                                &nbsp;Edit
                                            </a>

                                            <!-- Delete Button -->
                                            <a class="btn btn-danger col-md-6 rounded-0" role="button" href="NewsletterSetup.php?delete_id=<?php echo $cont['id']; ?>">
                                                <i class="fi fi-rr-trash"></i>
                                                &nbsp;Delete
                                            </a>
                                        </div>
                                    </div>

                                <?php
                                } ?>
                            </div>

                        </div>

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