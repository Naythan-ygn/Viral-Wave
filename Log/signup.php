<!doctype html>
<html lang="en">

<!-- Connecting with the Database -->
<?php
include '../Config/DBconnect.php';


if (isset($_POST['btnSignUp'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $subs = $_POST['subscription'];
    $utype = $_POST['utype'];

    // File upload Variable
    if (isset($_FILES['ufile']) && $_FILES['ufile']['error'] == 0) {
        // Read the file name
        $uProfile = $_FILES['ufile']['name'];
        // Read the file Path
        $tmp_name = $_FILES['ufile']['tmp_name'];
    }

    $sql_Insert = "INSERT INTO user (profile, name, email, password, city, subscription, user_type) VALUES ('$uProfile', '$name', '$email', '$password', '$city', '$subs', '$utype')";

    $result_inst = $conn->query($sql_Insert);

    if ($result_inst) {
        echo "<script>alert('User Registration Successful!');</script>";
        move_uploaded_file($tmp_name, "../Images/UploadedImages/" . $uProfile);
        header("Location: login.php");
    } else {
        echo "<script>alert('User Registration Failed!');</script>";
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
    <link rel="stylesheet" href="/CSS/vwstyle.css">

    <!-- Bootstrap Icon Cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="../index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../Images/Web-logo-removebg-preview.png" width="180" alt="">
                                </a>
                                <p class="text-center text-dark">Social Media Campaigns Ltd.</p>
                                <form class="log" action="#" method="POST" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="formFile" class="form-label">Upload Profile *</label>
                                            <input class="form-control" type="file" id="formFile" accept="image/*" name="ufile">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="exampleInputtext1" class="form-label">Name *</label>
                                            <input type="text" class="form-control" id="exampleInputtext1" name="name" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">New Password *</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="">Enter City *</label>
                                            <select class="form-select" name="city" aria-label="Default select example">

                                                <option selected disabled hidden>--- Select City ---</option>

                                                <option value="Bago">Bago</option>
                                                <option value="Dawei">Dawei</option>
                                                <option value="Hpa-An">Hpa-An</option>
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
                                        <div class="col-md-6 mb-4">
                                            <label for="" class="col-form-label">Newsletter Subscription *</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="subscription" id="flexRadioDefault1" value="1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Yes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="subscription" id="flexRadioDefault2" value="0">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    No
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label for="" class="mb-3">Enter User Type *</label>
                                            <select class="form-select" aria-label="Default select example" name="utype">

                                                <option selected hidden disabled>--- Select the User Type ---</option>

                                                <option value="1">Free</option>
                                                <option value="2">Standard</option>
                                                <option value="3">Premium</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" autocomplete="off" id="flexCheckChecked">
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                            I have read and agree to the <a href="#">privacy policy<a>
                                        </label>
                                    </div>

                                    <input class="btn btn-danger w-100 py-8 fs-4 mb-4 rounded-3" type="submit" name="btnSignUp" value="sign up">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="mb-0 text-dark">Already have an Account?</p>
                                        <a class="text-danger text-decoration-underline ms-2" href="login.php">Sign In Here!</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>