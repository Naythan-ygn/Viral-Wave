<!DOCTYPE html>
<html lang="en">

<?php
include '../Config/DBconnect.php';
session_start();
$email = $_SESSION['email'];

// Create Social Account
if (isset($_POST['btnSave'])) {
    $name = $_POST['smName'];
    $login = $_POST['loginLink'];
    $privacy = $_POST['privacyLink'];

    // File upload Variable
    if (isset($_FILES['smfile']) && $_FILES['smfile']['error'] == 0) {
        // Read the file name
        $smProfile = $_FILES['smfile']['name'];
        // Read the file Path
        $tmp_name = $_FILES['smfile']['tmp_name'];
    }

    $insert_sql = "INSERT INTO socialmedia (name, loginlink, privacylink, logo) VALUES ('$name', '$login', '$privacy', '$smProfile')";
    $result_sql = $conn->query($insert_sql);

    if ($result_sql) {
        echo "<script>alert('User added successfully!');</script>";

        // Upload the image to the Safety_Media folder
        move_uploaded_file($tmp_name, "../Images/Safety_Media/" . $smProfile);

        // Redirect to Social privacy List Page
        header("Location: SocialMediaSetup.php");
    } else {
        echo "<script>alert('Failed to add social privacy setting!');</script>";
    }
}

// Edit Social Media Settings
// the id of the row will be selected (and show in url) when Edit button is clicked
if (isset($_GET['edit_id'])) {
    $Eid = $_GET['edit_id'];
    $sql_select = "SELECT * FROM socialmedia WHERE id = '$Eid'";
    $editResult = $conn->query($sql_select);
    $row = $editResult->fetch_assoc();
}

// the related data row will be updated when Update button is clicked
if (isset($_POST['btnEdit'])) {

    $name = $_POST['smName'];
    $login = $_POST['loginLink'];
    $privacy = $_POST['privacyLink'];

    // File upload Variable
    if (isset($_FILES['smfile']) && $_FILES['smfile']['error'] == 0) {
        // Read the file name
        $smProfile = $_FILES['smfile']['name'];
        // Read the file Path
        $tmp_name = $_FILES['smfile']['tmp_name'];
    }

    if (!empty($smProfile)) {
        $sql_update = "UPDATE socialmedia SET name = '$name', loginlink = '$login', privacylink = '$privacy', logo = '$smProfile' WHERE id = " . $_GET['edit_id'];
    } else {
        $sql_update = "UPDATE socialmedia SET name = '$name', loginlink = '$login', privacylink = '$privacy' WHERE id = " . $_GET['edit_id'];
    }
    $result_query = $conn->query($sql_update);

    if ($result_query) {
        echo "<script>alert('Social Media Updated');</script>";

        // delete the existing image if a new image is uploaded
        if (!empty($smProfile)) {
            unlink("../Images/Safety_Media/" . $row['logo']);
        }

        // Upload to Safety_Media Folder
        move_uploaded_file($tmp_name, "../Images/Safety_Media/" . $smProfile);

        // Redirect to SocialMediaSetup.php After the update is completed
        header("Location: SocialMediaSetup.php");
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}

// the related data row will be deleted when Delete button is clicked
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM socialmedia WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Deleted Successfully";
        header("Location: SocialMediaSetup.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Show Social Media Campaigns
$sql_show = "SELECT * FROM socialmedia";
$sql_output = $conn->query($sql_show);

$sql_img = "SELECT profile, name FROM user WHERE email = '$email'";
$result_img = $conn->query($sql_img);
$card = $result_img->fetch_assoc();

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
        <a href="#" class="brand">
            <img src="../Images/FavtIcon-removebg-preview.png" alt="Logo" width="50" class="mx-2">
            <span class="text mt-3 fs-3">
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
            <li class="active">
                <a href="#">
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
        <ul class="side-menu">
            <li>
                <a href="UserList.php">
                    <i class="fi fi-rr-user-add"></i>
                    <span class="text">User List</span>
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
            <!-- 'Setting' Functional is not supported -->
            <li>
                <a href="#">
                    <i class="fi fi-rr-settings"></i>
                    <span class="text">Settings</span>
                </a>
            </li>
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
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class="fi fi-rr-bell"></i>
                <span class="num">8</span>
            </a>
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
                    <h1>Social Media Setup</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class="fi fi-rr-angle-small-right"></i></li>
                        <li>
                            <a class="active" href="#">Social Media Setup</a>
                        </li>
                    </ul>
                </div>

                <!-- Social Media Setup Form -->
                <div class="container-fluid">
                    <div class="row" id="form-setup">
                        <div class="col-md-12 py-3 rounded-3">
                            <h3>Setup Form</h3>
                            <form action="#" class="mt-3" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload Image *</label>
                                            <input class="form-control" type="file" id="formFile" accept="image/*" name="smfile">
                                        </div>

                                        <!-- Name of the Social App -->
                                        <div class="mb-3">
                                            <label for="smTitle" class="form-label">Social Media Name *</label>
                                            <input type="text" class="form-control" id="smTitle" name="smName" placeholder="Enter Social Media Name" value="<?php echo (isset($row['name']) ? $row['name'] : ""); ?>" required>
                                            <div class="invalid-feedback">
                                                Please enter a title.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Login Link to the Social Media -->
                                        <div class="mb-3">
                                            <label for="basic-url" class="form-label">Login URL</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon3">https://example.com/</span>
                                                <input type="text" name="loginLink" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" value="<?php echo (isset($row['loginlink']) ? $row['loginlink'] : ""); ?>">
                                            </div>
                                        </div>

                                        <!-- Privacy Link of that Social Media -->
                                        <div class="mb-3">
                                            <label for="basic-url" class="form-label">Privacy Setting URL</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon3">https://example.com/</span>
                                                <input type="text" name="privacyLink" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" value="<?php echo (isset($row['privacylink']) ? $row['privacylink'] : ""); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-end mb-4">
                                            <?php
                                            if (isset($_GET['edit_id'])) {
                                            ?>
                                                <input type="submit" id="submit" class="btn btn-danger mt-3 me-3 px-5 py-2" value="Update" name="btnEdit">
                                                <a href="SocialMediaSetup.php"><input type="button" class="btn btn-secondary mt-3 ms-3 px-5 py-2" value="Cancel"></a>
                                            <?php } else { ?>
                                                <input type="submit" id="submit" class="btn btn-danger mt-3 me-3 px-5 py-2" value="Save" name="btnSave">
                                                <input type="reset" class="btn btn-secondary mt-3 ms-3 px-5 py-2" value="Cancel">
                                            <?php
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>

                    <!-- Social Media List -->
                    <div class="col-md-12" data-bs-spy="scroll" data-bs-target="#form-setup" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
                        <div class="table-responsive overflow-auto">
                            <?php
                            if ($sql_output->num_rows > 0) {
                            ?>
                                <table class="table table-striped">
                                    <tr>
                                        <th>#</th>
                                        <th>Social Media</th>
                                        <th>Platform Name</th>
                                        <th>Login URL</th>
                                        <th>Privacy Setting URL</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    while ($row = $sql_output->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $row_num; ?></th>
                                            <?php $row_num++; ?>
                                            <td>
                                                <?php if (empty($row['logo'])) { ?>
                                                    <img src="../Images/Default_image.png" class="mx-4 mt-2 rounded-5" width="80" height="80" alt="image">
                                                <?php } else { ?>
                                                    <img src="<?php echo "../Images/Safety_Media\\" . $row['logo']; ?>" class="mx-4 mt-2 rounded-5" width="80" height="80" alt="image">
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['loginlink']; ?></td>
                                            <td><?php echo $row['privacylink']; ?></td>
                                            <td>
                                                <!-- Edit Button -->
                                                <a class="btn btn-success" role="button" href="SocialMediaSetup.php?edit_id=<?php echo $row['id']; ?>">
                                                    <i class="fi fi-rr-edit"></i>
                                                    &nbsp;Edit
                                                </a>

                                                <!-- Delete Button -->
                                                <a class="btn btn-danger mt-3" role="button" href="SocialMediaSetup.php?delete_id=<?php echo $row['id']; ?>">
                                                    <i class="fi fi-rr-trash"></i>
                                                    &nbsp;Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            <?php } ?>
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