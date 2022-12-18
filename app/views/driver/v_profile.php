<?php require APPROOT . '/views/inc/header.php'; ?>



<!--Side Bar-->
<?php require APPROOT . '/views/inc/components/sidebar.php'; ?>


<section class="home-section">
    <!--Top Navigation bar-->
    <?php require APPROOT . '/views/inc/components/topnavbar.php'; ?>

    <div class="title">
        <h1>Drivers Profile</h1>
    </div>

    <hr>

    <?php flash('reg_flash'); ?>
    <div class="profile-container">


        <div class="profile">
            <div class="data">
                <div class="data-row">
                    <span class="strong">NIC :</span>
                    <span><?= $driver->NIC ?></span>
                </div>
                <div class="data-row">
                    <span class="strong">First name :</span>
                    <span><?= $driver->firstName ?></span>
                </div>
                <div class="data-row">
                    <span class="strong">Last name :</span>
                    <span><?= $driver->lastName ?></span>
                </div>
                <div class="data-row">
                    <span class="strong">Email :</span>
                    <span><?= $driver->email ?></span>
                </div>
                <div class="data-row">
                    <span class="strong">Phone No :</span>
                    <span><?= $driver->phoneNo ?></span>
                </div>
                <div class="data-row">
                    <span class="strong">Address :</span>
                    <span><?= $driver->address ?></span>
                </div>
                <div class="data-row">
                    <span class="strong">Area :</span>
                    <span><?= $driver->area ?></span>
                </div>
                <div class="data-row">
                    <span class="strong">License No :</span>
                    <span><?= $driver->licenseNo ?></span>
                </div>
            </div>

            <a href="<?php echo URLROOT; ?>/pages/editProfile">
                <div class="edit-btn" >
                    <i class='bx bx-edit-alt'></i>
                    <span>Edit Profile</span>
                </div>
            </a>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php';  ?>