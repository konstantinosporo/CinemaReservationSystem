<?php

class Film
{
    public $film_id;
    public $film_title;
    public $film_plot;
    public $film_image;
    public $film_poster;

    public function show_films()
    {


        include("database\connection.php");
        $sql = "SELECT * FROM films ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {


            echo "<div class='" . "container" . "'>";
            echo "<div class='h4 pb-2 mb-4 text-success border-bottom border-success fw-bold'>Playing now</div>";
            echo "<table class='table table-hover'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Film ID</th>";
            echo "<th>Film Title</th>";
            echo "<th>Film Plot</th>";
            echo "<th>Film Poster</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                $this->film_id = $row['film_id'];
                echo "<td>" . $this->film_id . "</td>";
                $this->film_title = $row['film_title'];
                echo "<td>" . $this->film_title . "</td>";
                $this->film_plot = $row['film_plot'];
                echo "<td>" . $this->film_plot . "</td>";
                $this->film_poster = $row['film_poster'];

                echo "<td>" . '<img src="data:image/png;base64,' . base64_encode($this->film_poster) . '"
                 width =200 height=300/>' . "</td>";
                echo "</tr>";
                echo "</tbody>";


            }

            mysqli_close($conn);

        }
    }
}
?>