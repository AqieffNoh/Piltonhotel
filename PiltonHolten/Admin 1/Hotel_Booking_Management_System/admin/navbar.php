
<style>
	nav#sidebar {
    background: url(../assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
    background-repeat: no-repeat;
    background-size: cover;
</style>
<nav id="sidebar" class='mx-lt-5' >
		
		<div class="sidebar-list">

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=bookings" class="nav-item nav-bookings"><span class='icon-field'><i class="fa fa-book"></i></span> Bookings </a>
				<a href="index.php?page=room_types" class="nav-item nav-room_types"><span class='icon-field'><i class="fa fa-list"></i></span> Room Types</a>
				<a href="index.php?page=hotelrooms" class="nav-item nav-hotelrooms"><span class='icon-field'><i class="fa fa-bed"></i></span> Rooms </a>
				<a href="index.php?page=events" class="nav-item nav-events"><span class='icon-field'><i class="fa fa-calendar"></i></span> Events</a>
				<a href="index.php?page=AddOn" class="nav-item nav-AddOn"><span class='icon-field'><i class="fa fa-plus-circle"></i></span> AddOn</a>
				<a href="index.php?page=content" class="nav-item nav-content"><span class='icon-field'><i class="fa fa-table"></i></span> Content</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
				<a href="index.php?page=Payments" class="nav-item nav-Payments"><span class='icon-field'><i class="fa fa-credit-card"></i></span> Payment History</a>
				<a href="index.php?page=Sellers" class="nav-item nav-Sellers"><span class='icon-field'><i class="fa fa-address-book"></i></span> Sellers</a>
				<a href="index.php?page=customer" class="nav-item nav-customer"><span class='icon-field'><i class="fa fa-address-book"></i></span> Customers</a>
				<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs"></i></span> Site Settings</a>
				
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>