<?php

class Venue
{
        public $venue_seats = array();
        public function show_venue($d, $s)
        {


                include("database\connection.php");
                $sql = "SELECT * from reservations where res_date = '" . $d . "' "

                        . "and prov_id =  $s ";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                                $this->venue_seats[$row['seat']] = 2;
                        }

                        mysqli_close($conn);

                }

        }
}
?>