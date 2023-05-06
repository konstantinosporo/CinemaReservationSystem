<div class="container">
  <div class="col-md-12">
    <nav class="navbar navbar-expand-md navbar-dark sticky-top p-0" style="background-color:#222f5b;">
      <div class=" container-fluid">
        <a class="navbar-brand d-inline-block py-0 " style="font-family: 'Jura', sans-serif;" href="index.php">
          <img src="images/logo.jpg" alt="Logo " width="30" height="30"
            class="d-inline-block align-top rounded-circle p-0" />
          <?php echo $_SESSION['cinema_name'] ?>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
              <a class="nav-link active py-0" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link py-0" href="movies.php">Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link py-0" href="reservations.php">Reserve</a>
            </li>

            <li class="nav-item"><a class="nav-link py-0" href="functions\logout.php">
                Logout</a></li>


          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>