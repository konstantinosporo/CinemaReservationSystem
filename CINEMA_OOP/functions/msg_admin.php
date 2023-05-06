<?php

$sql = "SELECT * FROM reservations WHERE approved = 1 ";

if ($result = mysqli_query($conn, $sql)) {

    // Υπολογισμός νέων κρατήσεων 
    $rowcount1 = mysqli_num_rows($result);
    if ($rowcount1 > 0) {
        $_SESSION['status'] = '<badge class="primary">
            <p class="display-6 text-success text-center"> You have <a
                        href="reserve_req.php"><button type="button"
                              class="btn btn-success position-relative "
                              style="border-radius: 30px;">
                              Reservation
                              <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill rounded-circle bg-danger p-1 ps-2 pe-2     ">
                                    ' . $rowcount1 . '
                                    <span class="visually-hidden">unread messages</span>
                              </span>
                        </button></a>
                  requests.
            </p>
            </p>
      </badge>';
    }
}

$sql = "SELECT * FROM reservations WHERE approved = 2 ";

if ($result = mysqli_query($conn, $sql)) {

    // Υπολογισμός επιβεβαιωμένων κρατήσεων 
    $rowcount2 = mysqli_num_rows($result);

}