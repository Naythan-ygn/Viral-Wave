<!DOCTYPE html>
<html lang="en">

<?php
include '../Config/DBconnect.php';
session_start();
$email = $_SESSION['email'];

// Create Content for Parent
if (isset($_POST['btnCreate'])) {
    $desc = $_POST['desc'];
    $title = $_POST['phtitle'];
    $uid = $_POST['uid'];

    // File upload Variable
    if (isset($_FILES['phfile1']) && $_FILES['phfile1']['error'] == 0) {
        // Read the file name
        $ContImage1 = $_FILES['phfile1']['name'];
        // Read the file Path
        $tmp_name1 = $_FILES['phfile1']['tmp_name'];
    }
    // File upload Variable
    if (isset($_FILES['phfile2']) && $_FILES['phfile2']['error'] == 0) {
        // Read the file name
        $ContImage2 = $_FILES['phfile2']['name'];
        // Read the file Path
        $tmp_name2 = $_FILES['phfile2']['tmp_name'];
    }

    $insert_sql = "INSERT INTO parent_help_content (title, description, image1, image2, user_id) VALUES ('$title', '$desc', '$ContImage1', '$ContImage2', '$uid')";
    $result_sql = $conn->query($insert_sql);

    if ($result_sql) {
        echo "<script>alert('User added successfully!');</script>";

        // Upload the image to the Safety_Media folder
        move_uploaded_file($tmp_name1, "../Images/Safety_Media/" . $ContImage1);

        // Upload the image to the Safety_Media folder
        move_uploaded_file($tmp_name2, "../Images/Safety_Media/" . $ContImage2);

        // Redirect to User List Page
        header("Location: ParentHubSetup.php");
    } else {
        echo "<script>alert('Failed to add user!');</script>";
    }
}

// Edit Content Info
// the id of the row will be selected (and show in url) when Edit button is clicked
if (isset($_GET['edit_id'])) {
    $Eid = $_GET['edit_id'];
    $sql_show = "SELECT * FROM parent_help_content WHERE ph_id = '$Eid'";
    $editResult = $conn->query($sql_show);
    $row = $editResult->fetch_assoc();
}

// the related data row will be updated when Update button is clicked
if (isset($_POST['btnEdit'])) {

    $title = $_POST['phtitle'];
    $desc = $_POST['desc'];
    $uid = $_POST['uid'];

    // File upload Variable
    if (isset($_FILES['phfile1']) && $_FILES['phfile1']['error'] == 0) {
        // Read the file name
        $ContImage1 = $_FILES['phfile1']['name'];
        // Read the file Path
        $tmp_name1 = $_FILES['phfile1']['tmp_name'];
    }

    // File upload Variable
    if (isset($_FILES['phfile2']) && $_FILES['phfile2']['error'] == 0) {
        // Read the file name
        $ContImage2 = $_FILES['phfile2']['name'];
        // Read the file Path
        $tmp_name2 = $_FILES['phfile2']['tmp_name'];
    }

    // Image1 and texts will be updated if image1 isn't empty and image2 is empty
    if (!empty($ContImage1) && empty($ContImage2)) {
        $sql_update = "UPDATE parent_help_content SET title = '$title', description = '$desc', image1 = '$ContImage1', user_id = '$uid' WHERE ph_id = " . $_GET['edit_id'];
    }
    // Image2 and texts will be updated if image2 isn't empty and image1 is empty
    else if (!empty($ContImage2) && empty($ContImage1)) {
        $sql_update = "UPDATE parent_help_content SET title = '$title', description = '$desc', image2 = '$ContImage2', user_id = '$uid' WHERE ph_id = " . $_GET['edit_id'];
    }
    // Everything will be updated if both image1 and image2 aren't empty
    else if (!empty($ContImage2) && !empty($ContImage1)) {
        $sql_update = "UPDATE parent_help_content SET title = '$title', description = '$desc', image1 = '$ContImage1', image2 = '$ContImage2', user_id = '$uid' WHERE ph_id = " . $_GET['edit_id'];
    } else {
        $sql_update = "UPDATE parent_help_content SET title = '$title', description = '$desc', user_id = '$uid' WHERE ph_id = " . $_GET['edit_id'];
    }
    $result_query = $conn->query($sql_update);

    if ($result_query) {
        echo "<script>alert('Content Updated');</script>";

        // delete the existing image if a new image is uploaded
        if (!empty($phfile1)) {
            unlink("../Images/Safety_Media/" . $row['image1']);
        }
        // Upload to Safety_Media Folder
        move_uploaded_file($tmp_name1, "../Images/Safety_Media/" . $ContImage1);

        if (!empty($phfile2)) {
            unlink("../Images/Safety_Media/" . $row['image2']);
        }
        // Upload to Safety_Media Folder        
        move_uploaded_file($tmp_name2, "../Images/Safety_Media/" . $ContImage2);

        // Redirect to ParentHubSetup.php After the update is completed
        header("Location: ParentHubSetup.php");
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}

// the related data row will be deleted when Delete button is clicked
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM parent_help_content WHERE ph_id = $id";
    $deleted_result = $conn->query($sql_delete);

    if ($deleted_result) {
        echo "Deleted Successfully";
        header("Location: ParentHubSetup.php");
    } else {
        echo "Error: " . $sql_delete . "<br>" . $conn->error;
    }
}

$row_num = 1;

// Fetch parent hub data
$sql = "SELECT name, ph_id, title, description, image1, image2, created_date FROM parent_help_content, user_info WHERE user_id = id";
$result = $conn->query($sql);

// Fetch user profile data
$sql_img = "SELECT id, profile, name FROM user_info WHERE email = '$email'";
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
            <li class="active">
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
                    <h1>Parent Hub Setup</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class="fi fi-rr-angle-small-right"></i></li>
                        <li>
                            <a class="active" href="ParentHubSetup.php">Parent Hub Setup</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Parent Hub Form -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Parent Hub</h2>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="hid" value="<?php echo (isset($card['id']) ? $card['id'] : ""); ?>">

                            <input type="hidden" name="uid" value="<?php echo $card['id']; ?>">

                            <div class="row">
                                <!-- Upload Image -->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="formFile1" class="form-label">Upload Image 1 *</label>
                                            <input class="form-control" name="phfile1" type="file" accept="image/*" id="formFile1">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formFile2" class="form-label">Upload Image 2 *</label>
                                            <input class="form-control" name="phfile2" type="file" accept="image/*" id="formFile2">
                                        </div>
                                    </div>
                                </div>

                                <!-- Upload Content -->
                                <div class="col-md-6 ps-5">
                                    <!-- Content Title -->
                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" class="form-control" name="phtitle" placeholder="Title Content" aria-label="Content" aria-describedby="addon-wrapping" value="<?php echo (isset($row['title']) ? $row['title'] : ""); ?>" required>
                                    </div>

                                    <!-- Content Description -->
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description *</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc" placeholder="Enter your content" required><?php echo (isset($row['description']) ? $row['description'] : ""); ?></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group mt-4 text-end">
                                    <?php if (isset($_GET['edit_id'])) {
                                    ?>
                                        <input type="submit" value="Update Content" name="btnEdit" class="btn btn-danger rounded-4 py-2 px-4">
                                        <span class="submitting"></span>
                                        <a href="ParentHubSetup.php">
                                            <input type="button" class="btn btn-secondary rounded-4 py-2 px-5 ms-4" value="Cancel">
                                            <span class="submitting"></span>
                                        </a>
                                    <?php
                                    } else {
                                    ?>
                                        <input type="submit" value="Create Content" name="btnCreate" class="btn btn-danger rounded-4 py-2 px-4">
                                        <span class="submitting"></span>
                                        <input type="reset" class="btn btn-secondary rounded-4 py-2 px-5 ms-4" value="Cancel">
                                        <span class="submitting"></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>

                        <hr class="mb-3">


                        <!-- Retrieve the data from the database -->
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Parent Hub Content</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-secondary">
                                        <tr>
                                            <th scope="row">#</th>
                                            <th>User Name</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image 1</th>
                                            <th>Image 2</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th><?php echo $row_num; ?></th>
                                                <?php $row_num++; ?>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['title'] ?></td>
                                                <td><?php echo $row['description'] ?></td>
                                                <td>
                                                    <img src="<?php echo "../Images/Safety_Media\\" . $row['image1'] ?>" alt="..." width="150" height="100">
                                                </td>
                                                <td>
                                                    <img src="<?php echo "../Images/Safety_Media\\" . $row['image2'] ?>" alt="..." width="150" height="100">
                                                </td>
                                                <td>
                                                    <?php echo date('M-d', strtotime($row['created_date'])); ?>
                                                </td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a class="btn btn-success" role="button" href="ParentHubSetup.php?edit_id=<?php echo $row['ph_id']; ?>">
                                                        <i class="fi fi-rr-edit"></i>
                                                        &nbsp;Edit
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <a class="btn btn-danger mt-3" role="button" href="ParentHubSetup.php?delete_id=<?php echo $row['ph_id']; ?>">
                                                        <i class="fi fi-rr-trash"></i>
                                                        &nbsp;Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </table>
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