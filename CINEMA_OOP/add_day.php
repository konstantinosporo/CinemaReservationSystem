<?php
session_start();
include("database\connection.php");

if (!isset($_SESSION['username'])) {
    Header('Location:index.php');
}
if (($_SESSION['isadm']) != 1) {
    header('Location: index.php');
}

?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>
            <?php echo $_SESSION['cinema_name'] ?>
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images\logo.jpg">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="CSS/stylesheet.css" rel="stylesheet" />
    </head>

    <body>
        <?php
        include("headers\header_admin.php");
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php
                    if (isset($_SESSION['status'])) {
                        echo "<h4> 
                            <div class='alert alert-warning alert-dismissible fade show' 
                            role='alert'>
                            <strong>Notations:</strong> " . $_SESSION['status'] . " 
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </h4>";
                        unset($_SESSION['status']);

                    }
                    ?>

                </div>



            </div>
        </div>









        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">

                    <form action="functions\save_date.php" method="POST">
                        <div class="form-group mb-3">


                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="d-flex justify-content-center">
                                        <label class="display-6 justify-content-center mb-3 "
                                            style="color:#831e1a;border:#831e1a;" for="">Change Active Days</label>
                                    </div>
                                    <div class="container">
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-center w-50">
                                        <input type="date" name="active_days" class="form-control"
                                            min="<?php echo $_SESSION['date_now']; ?>">
                                    </div>
                                    <div class="container">
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                    </div>


                                    <button type="submit" onsubmit="return save_Date()" name="save_date"
                                        class="btn btn-primary "
                                        style="margin-top:30px;background-color:#831e1a;border:#831e1a;">Confirm Changes
                                    </button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>




        <?php
        $username = $_SESSION['username'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $isadm = $_SESSION['isadm'];



        ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"></script>

    </body>

</html>