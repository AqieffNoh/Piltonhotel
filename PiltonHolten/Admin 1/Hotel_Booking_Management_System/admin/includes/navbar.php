<nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><img style="width: 50px;height: 50px;" src="assets/img/pilton%20image.jpg"><a class="navbar-brand" href="index.php" style="margin-left: 10px;">Pilton Admin</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Bookings</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Payments</a></li>
                        <li class="nav-item"><a class="nav-link" href="content.php">Contents</a></li>
                        <li class="nav-item"><a class="nav-link" href="events.php">Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="Rooms.php">Rooms</a></li>
                        <li class="nav-item"><a class="nav-link" href="AddOn.php">Add-Ons</a></li>
                        <li class="nav-item"><a class="nav-link" href="Sellers.php">Sellers</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Customers</a></li>
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow"><a aria-expanded="false" data-bs-toggle="dropdown" class="dropdown-toggle nav-link" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php //echo $_SESSION['username']?></span></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutmodal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i> 
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
</nav>

<div class="modal fade" id="logoutmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logging Out</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <h5 style="text-align: center;">Are you sure you want to logout?</h5>
      <form action="logout.php" method="POST">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="logoutbtn" class="btn btn-danger">Log Out</button>
        </div>
    </form>
    </div>
  </div>
</div>