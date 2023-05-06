<?php

class Shows
{
    public $provoles = array();
    function show_films()
    {
        include("database\connection.php");
        $sql = "SELECT provoles.prov_id as id,provoles.time_start as start,provoles.time_end as end,provoles.film_id,  "
            . "films.film_id, films.film_title as title, films.film_plot as plot from provoles left join films on "
            . "provoles.film_id=films.film_id order by provoles.prov_id";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($this->provoles, $row);
            }
            mysqli_close($conn);

        }
    }

}
?>