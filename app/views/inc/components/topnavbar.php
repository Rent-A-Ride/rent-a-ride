<div class="navbar">
    <div class="container-icon"><a href=""><img class="logo" src="<?php echo URLROOT;?>/img/logo.png" alt="Rent a Ride Logo"></a></div>
    <ul class="nav-list" id="nav-list">
        <?php if(!isset($_SESSION['user_id'])): ?>
            <li class="list-item 1"><a href="<?php echo URLROOT?>/users/login">Sign in</a></li>
            <li class="list-item 2"><a href="<?php echo URLROOT?>/users/register">Register</a></li>
        <?php else: ?>
            <li class="list-item 1"><a href="<?php echo URLROOT?>/users/logout">Log out</a></li>
        <?php endif; ?>

    </ul>
    <div id="toggle-btn" class="menu-container" onclick="myFunction(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
</div>