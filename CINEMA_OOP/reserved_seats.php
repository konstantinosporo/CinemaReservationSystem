<?php
session_start();
include('database\connection.php');

if (!isset($_SESSION['username'])) {
    Header('Location:index.php');
}
if (($_SESSION['isadm']) != 1) {
    header('Location: index.php');
}

$query = "SELECT * FROM reservations WHERE approved = 2 ORDER BY res_id ASC";
$run = mysqli_query($conn, $query);
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="CSS/stylesheet.css" rel="stylesheet" />

    </head>

    <body>

        <?php
        include("headers\header_admin.php");
        include("functions\msg_admin.php");
        unset($_SESSION['status']);
        ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table table-hover ">
                        <caption>Total reserved seats <?php echo $rowcount2; ?>
                        </caption>
                        <thead class="table-light">
                            <tr class="heading">

                                <th>Reservation ID</th>
                                <th>Username</th>
                                <th>Reservation Date</th>
                                <th>Show ID</th>
                                <th>Seat Number</th>
                                <th class="text-center pe-5">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;

                            if ($num = mysqli_num_rows($run) > 0) {
                                while ($result = mysqli_fetch_assoc($run)) {
                                    echo "  
                               <tr class='data'>  
                               
                               <td>" . $result['res_id'] . "</td>  
                               <td>" . $result['username'] . "</td>  
                               <td>" . $result['res_date'] . "</td>  
                               <td>" . $result['prov_id'] . "</td>  
                               <td>" . $result['approved'] . "</td>  
                               <td><button type='button' 
                               name='button'
                               class='btn btn-sm btn-success' 
                               data-bs-toggle='popover' 
                               data-bs-title='Success!' 
                               data-bs-trigger='hover'
                               data-bs-content='This reservation was accepted'>
                               Check status
                               </button></td>
                               
                               </td>  
                          </tr>  
                          
                     ";
                                    $i++;
                                }


                            }

                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"></script>

        <script> // JavaScript για λειοτυργία popover της bootstrap
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        </script>

    </body>

</html>