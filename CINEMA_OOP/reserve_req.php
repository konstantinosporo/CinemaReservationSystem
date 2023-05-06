<?php
session_start();
include('database\connection.php');

if (!isset($_SESSION['username'])) {
    Header('Location:index.php');
}
if (($_SESSION['isadm']) != 1) {
    header('Location: index.php');
}

$query = "SELECT * FROM reservations WHERE approved = 1 ORDER BY res_id ASC";
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="CSS/stylesheet.css" rel="stylesheet" />
    </head>

    <body>
        <script>
            function Accept() {
                alert("Reservation accepted.");

            }

            function Decline() {
                var r = confirm("Decline reservation request?");
                if (r == false) {
                    return false;
                }

            }
        </script>

        <?php
        include("headers\header_admin.php");
        include("functions\msg_admin.php");
        unset($_SESSION['status']);
        ?>


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <caption>Total reservation requests <?php echo $rowcount1;
                            ?>
                            </caption>
                            <thead>
                                <tr class="heading">

                                    <th>Reservation ID</th>
                                    <th>Username</th>
                                    <th>Reservation Date</th>
                                    <th>Show ID</th>
                                    <th>Seat Number</th>
                                    <th>Approved</th>
                                    <th>Operation</th>
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
                               <td>" . $result['seat'] . "</td>  
                               <td>" . $result['approved'] . "</td>
                               <td> 
                               <form action='functions/edit_row.php'method='POST'>  

                               <button type='submit' name='accept'  
                               onclick='return Accept()' class='btn btn-sm btn-success' 
                               value='" . $result['res_id'] . "' id='btn'>
                               Accept</button>  

                               <button type='submit' name='decline' 
                                onclick='return Decline()'class='btn btn-sm btn-danger' 
                                data-bs-toggle='popover' 
                                data-bs-title='Warning!' 
                                data-bs-trigger='hover'
                                data-bs-content='You are going to decline this reservation.'
                                value='" . $result['res_id'] . "' id='btn'>
                               Decline</button>

                               </form>
                               </td>  
                               </tr>";
                                        $i++;
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>

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