<!DOCTYPE html>
<html lang="en">

<?php
include '../Config/DBconnect.php';
session_start();
$email = $_SESSION['email'];


// Create user
if (isset($_POST['btnAddUser'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $subs = $_POST['subscription'];
    $u_type = $_POST['utype'];

    // File upload Variable
    if (isset($_FILES['ufile']) && $_FILES['ufile']['error'] == 0) {
        // Read the file name
        $uProfile = $_FILES['ufile']['name'];
        // Read the file Path
        $tmp_name = $_FILES['ufile']['tmp_name'];
    }

    $insert_sql = "INSERT INTO user_info (profile,name,email,password,city,subscription,user_type) VALUES ('$uProfile','$name','$email','$password','$city','$subscription','$u_type')";
    $result_sql = $conn->query($insert_sql);

    if ($result_sql) {
        echo "<script>alert('User added successfully!');</script>";

        // Upload the image to the UploadedImages folder
        move_uploaded_file($tmp_name, "../Images/UploadedImages/" . $uProfile);

        // Redirect to User List Page
        header("Location: UserList.php");
    } else {
        echo "<script>alert('Failed to add user!');</script>";
    }
}


// Edit User Profile
// the id of the row will be selected (and show in url) when Edit button is clicked
if (isset($_GET['edit_id'])) {
    $Eid = $_GET['edit_id'];
    $sql_show = "SELECT * FROM user_info WHERE id = '$Eid'";
    $editResult = $conn->query($sql_show);
    $card = $editResult->fetch_assoc();
}

// the related data row will be updated when Update button is clicked
if (isset($_POST['btnEditUser'])) {

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $subs = $_POST['subscription'];
    $u_type = $_POST['utype'];

    // File upload Variable
    if (isset($_FILES['ufile']) && $_FILES['ufile']['error'] == 0) {
        // Read the file name
        $uProfile = $_FILES['ufile']['name'];
        // Read the file Path
        $tmp_name = $_FILES['ufile']['tmp_name'];
    }

    if (!empty($uProfile)) {
        $sql_update = "UPDATE user_info SET profile = '$uProfile', name = '$name', email = '$email', password = '$password', city = '$city', subscription = '$subs', user_type = '$u_type' WHERE id = " . $_GET['edit_id'];
    } else {
        $sql_update = "UPDATE user_info SET name = '$name', email = '$email', password = '$password', city = '$city', subscription = '$subs', user_type = '$u_type' WHERE id = " . $_GET['edit_id'];
    }
    $result_query = $conn->query($sql_update);

    if ($result_query) {
        echo "<script>alert('User Updated');</script>";

        // delete the existing image if a new image is uploaded
        if (!empty($uProfile)) {
            unlink("../Images/UploadedImages/" . $card['profile']);
        }

        // Upload to UploadedImages Folder
        move_uploaded_file($tmp_name, "../Images/UploadedImages/" . $uProfile);

        // Redirect to UserList.php After the update is completed
        header("Location: UserList.php");
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}

$sql_img = "SELECT profile, name FROM user_info WHERE email = '$email'";
$result_img = $conn->query($sql_img);
$show = $result_img->fetch_assoc();

$sql = "SELECT * FROM user_info ORDER BY user_type";
$result = mysqli_query($conn, $sql);
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
            <li class="active">
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
                    <h1>User List</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class="fi fi-rr-angle-small-right"></i></li>
                        <li>
                            <a class="active" href="UserList.php">User List</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- User form -->
            <!-- Container Box -->
            <div class="container-fluid px-4">
                <div class="row">

                    <!-- User Creation Form -->
                    <div class="col-md-6 p-3">
                        <form id="user-input" class="sticky-top" method="post" action="#" enctype="multipart/form-data">
                            <legend>
                                <h3>Add a New User</h3>
                            </legend>

                            <!-- Hidden ID -->
                            <input type="hidden" name="hid" value="<?php echo (isset($card['id']) ? $card['id'] : ""); ?>">

                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="name" class="col-form-label">Name *</label>
                                    <input type="text" class="form-control" name="username" id="name" placeholder="Enter username" value="<?php echo (isset($card['name']) ? $card['name'] : ""); ?>" required>
                                </div>

                                <!-- City DropDown -->
                                <div class="col-md-6 form-group mb-3">
                                    <label for="">Enter City *</label>
                                    <select class="form-select" name="city" aria-label="Default select example">
                                        <?php
                                        if (isset($_GET['edit_id'])) {
                                        ?>
                                            <option value="<?php echo ($card['city']); ?>"> <?php echo ($card['city']); ?> </option>
                                        <?php
                                        } else {
                                        ?>
                                            <option selected disabled hidden>--- Select Location ---</option>
                                        <?php } ?>
                                        <option value="Bago">Bago</option>
                                        <option value="Beijing">Beijing</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Kingstom">Kingstom</option>
                                        <option value="Kalaw">Kalaw</option>
                                        <option value="Kale">Kale</option>
                                        <option value="Lashio">Lashio</option>
                                        <option value="London">London</option>
                                        <option value="Mandalay">Mandalay</option>
                                        <option value="Mawlamyine">Mawlamyine</option>
                                        <option value="Naypyidaw">Naypyidaw</option>
                                        <option value="Yangon">Yangon</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Email -->
                                <div class="col-md-6 form-group mb-3">
                                    <label for="email" class="col-form-label">Email *</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter user's email" value="<?php echo (isset($card['email']) ? $card['email'] : ""); ?>" required>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password *</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter password" value="<?php echo (isset($card['password']) ? $card['password'] : ""); ?>" aria-describedby="emailHelp" required>
                                    <div id="emailHelp" class="form-text">Maximum 8 Characters.</div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- User Profile Upload -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="formFile" class="form-label">Upload Profile Image *</label>
                                    <input class="form-control" name="ufile" type="file" id="formFile" accept="image/*">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Subscriptions Radio button for User -->
                                <div class="col-md-6 form-group mb-3">
                                    <label for="" class="col-form-label">Newsletter Subscription *</label>
                                    <?php
                                    if (isset($_GET['edit_id'])) {
                                        if ($card['subscription'] == 1) {
                                    ?>
                                            <div class="input-group mb-1">
                                                <div class="input-group-text">
                                                    <input class="form-check-input" type="radio" name="subscription" id="flexRadioDefault2" value="1" aria-label="Radio button for following text input" checked>
                                                </div>
                                                <input type="text" class="form-control" value="Yes" readonly aria-label="Text input with radio button">
                                            </div>

                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input" type="radio" name="subscription" id="flexRadioDefault2" value="0" aria-label="Radio button for following text input">
                                                </div>
                                                <input type="text" class="form-control" value="No" readonly aria-label="Text input with radio button">
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="input-group mb-1">
                                                <div class="input-group-text">
                                                    <input class="form-check-input" type="radio" name="subscription" id="flexRadioDefault2" value="1" aria-label="Radio button for following text input">
                                                </div>
                                                <input type="text" class="form-control" value="Yes" readonly aria-label="Text input with radio button">
                                            </div>

                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input" type="radio" name="subscription" id="flexRadioDefault2" value="0" aria-label="Radio button for following text input" checked>
                                                </div>
                                                <input type="text" class="form-control" value="No" readonly aria-label="Text input with radio button">
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text">
                                                <input class="form-check-input" type="radio" name="subscription" id="flexRadioDefault2" value="1" aria-label="Radio button for following text input">
                                            </div>
                                            <input type="text" class="form-control" value="Yes" readonly aria-label="Text input with radio button">
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <input class="form-check-input" type="radio" name="subscription" id="flexRadioDefault2" value="0" aria-label="Radio button for following text input" checked>
                                            </div>
                                            <input type="text" class="form-control" value="No" readonly aria-label="Text input with radio button">
                                        </div>

                                    <?php } ?>
                                </div>

                                <!-- Checking the User Type -->
                                <div class="col-md-6 form-group mb-3">
                                    <label for="">Enter User Type *</label>
                                    <select class="form-select" aria-label="Default select example" name="utype">
                                        <?php
                                        if (isset($_GET['edit_id'])) {
                                        ?>
                                            <option value="<?php echo ($card['user_type']); ?>" selected disabled> <?php echo ($card['user_type'] == 1 ? "Free" : ($card['user_type'] == 2 ? "Standard" : ($card['user_type'] == 3 ? "Premium" : "Admin"))); ?> </option>
                                        <?php
                                        } else {
                                        ?>
                                            <option selected hidden disabled>--- Select the User Type ---</option>
                                        <?php } ?>
                                        <option value="0">Admin</option>
                                        <option value="1">Free</option>
                                        <option value="2">Standard</option>
                                        <option value="3">Premium</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 form-group mt-4">
                                <?php if (isset($_GET['edit_id'])) {
                                ?>
                                    <input type="submit" value="Update User" name="btnEditUser" class="btn btn-danger rounded-4 py-2 px-4">
                                    <span class="submitting"></span>
                                    <a href="UserList.php">
                                        <input type="button" class="btn btn-secondary rounded-4 py-2 px-5 ms-4" value="Cancel">
                                        <span class="submitting"></span>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <input type="submit" value="Add User" name="btnAddUser" class="btn btn-danger rounded-4 py-2 px-4">
                                    <span class="submitting"></span>
                                    <input type="reset" class="btn btn-secondary rounded-4 py-2 px-5 ms-4" value="Cancel">
                                    <span class="submitting"></span>
                                <?php
                                }
                                ?>

                            </div>


                        </form>
                    </div>

                    <!-- Retrieved Data User List -->
                    <div class="col-md-6">
                        <h3>User List</h3>
                        <div class="p-3 d-flex flex-wrap">
                            <div class="row">
                                <?php
                                // Fetching data from the database and displaying it in a table.
                                while ($card = $result->fetch_assoc()) {

                                    if (isset($_GET['edit_id'])) {
                                        // If the edit button is clicked, fetch the user details based on the ID.
                                        $edit_id = $_GET['edit_id'];
                                        $query = "SELECT * FROM user_info WHERE id = $edit_id";
                                        $result = $conn->query($query);
                                        $card = $result->fetch_assoc();
                                    }
                                ?>
                                    <div class="col-md-6">
                                        <!-- User's Profile will Display as a Card. -->
                                        <div class="card ser-card m-2">

                                            <!-- Default image will display if user didn't upload the image -->
                                            <?php if (empty($card['profile'])) { ?>
                                                <img src="../Images/default_profile.png" class="mx-4 mt-2 rounded-5" width="100" height="100" alt="image">
                                            <?php } else { ?>
                                                <img src="<?php echo "../Images/UploadedImages\\" . $card['profile']; ?>" class="mx-4 mt-2 rounded-5" width="100" height="100" alt="image">
                                            <?php } ?>

                                            <div class="card-body">

                                                <h5 class="card-title"><?php echo $card['name']; ?></h5>
                                                <p class="card-text text-black">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Email :</th>
                                                            <td><?php echo $card['email']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Password :</th>
                                                            <td><?php echo $card['password']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>City :</th>
                                                            <td><?php echo $card['city']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Subscribed :</th>
                                                            <td><?php echo $card['subscription'] == 1 ? "YES" : "NO"; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>User Type :</th>
                                                            <td><?php echo $card['user_type'] == 1 ? "Free" : ($card['user_type'] == 2 ? "Standard" : ($card['user_type'] == 3 ? "Premium" : "Admin")); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- Edit Button -->
                                                <a class="btn btn-success col-md-12 mt-3" role="button" href="UserList.php?edit_id=<?php echo $card['id']; ?>">
                                                    <i class="fi fi-rr-edit"></i>
                                                    &nbsp;Edit
                                                </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- User Form -->
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