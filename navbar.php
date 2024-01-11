<?php
include 'connection.php';
$currentFile = basename($_SERVER['PHP_SELF']);
$acess = false;
$error = false;
if (isset($_POST['submitLogin'])) {
    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword'];

    $result = mysqli_query($conn, "SELECT * FROM `tbl_user`");
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows['username'] == $loginUsername && $rows['password'] == $loginPassword) {
            $acess = true;
        }
    }
    if ($acess) {
        session_start();
        $_SESSION['loginUsername'] = $loginUsername;
        header('location: index.php');
    } else {
        $error = true;
    }
}

if (isset($_POST['submitSignup'])) {

    $signupUsername = $_POST['signupUsername'];
    $signupEmail = $_POST['signupEmail'];
    $signupPassword = $_POST['signupPassword'];

    if ($signupUsername != null && $signupEmail != null && $signupPassword != null) {
        $sql = "INSERT INTO $db.`tbl_user`(`username`, `password`, `email`) VALUES ('$signupUsername', '$signupPassword', '$signupEmail');";
        if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION['loginUsername'] = $signupUsername;
            header('location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sentiment analysis of Social Media presence</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="./assets/css/bootstrap-icons.css" rel="stylesheet">

    <link href="./assets/css/main.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>

<body>

    <main>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <i class="bi-back"></i>
                    <span>Sentiment Analysis</span>
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php">Home</a>
                        </li>

                        <?php if ($currentFile === 'index.php') { ?>
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">Topics</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">Working</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">FAQs</a>
                            </li>
                        <?php }
                        if (isset($_SESSION['loginUsername']) && !empty($_SESSION['loginUsername'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./sentiment-analysis.php">Analysis</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php if (isset($_SESSION['loginUsername']) && !empty($_SESSION['loginUsername'])) { ?>
                        <a class="navbar-icon bi-box-arrow-right" href="logout.php"></a>
                    <?php } else { ?>
                        <div class="d-none d-lg-block">
                            <a class="navbar-icon bi-person smoothscroll" href="#" data-toggle="modal" data-target="#loginModal" id="navbarDropdown" role="button" data-toggle="dropdown" data-target="#loginModal" aria-haspopup="true" aria-expanded="false"></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </nav>

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="loginUsername">Username</label>
                                <input type="text" class="form-control" name="loginUsername" id="loginUsername" placeholder="Enter your username">
                            </div>
                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Enter your password">
                            </div>
                            <button type="submit" name="submitLogin" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <p class="text-center mt-3">Don't have an account? <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#signupModal">Create one here</a>.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Signup Modal -->
        <div class="modal fade" id="signupModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sign Up</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="signupUsername">Username</label>
                                <input type="text" class="form-control" name="signupUsername" id="signupUsername" placeholder="Choose a username">
                            </div>
                            <div class="form-group">
                                <label for="signupEmail">Email</label>
                                <input type="email" class="form-control" name="signupEmail" id="signupEmail" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="signupPassword">Password</label>
                                <input type="password" class="form-control" name="signupPassword" id="signupPassword" placeholder="Choose a password">
                            </div>
                            <button type="submit" name="submitSignup" class="btn btn-primary btn-block">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- OTP Modal -->
        <div class="modal fade" id="otpModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Verify OTP</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="signupUsername">OTP</label>
                                <input type="number" class="form-control" name="signupUsername" id="signupUsername" placeholder="Enter Your OTP">
                            </div>
                            <button type="submit" name="submitSignup" class="btn btn-primary btn-block">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/click-scroll.js"></script>
    <script src="./assets/js/custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        <?php if ($error) { ?>
            Swal.fire({
                title: 'Invalid Details',
                text: 'Invalid Username or Password',
                icon: 'error',
                confirmButtonText: 'OKk!'
            });
        <?php } ?>
    </script>

</body>

</html>