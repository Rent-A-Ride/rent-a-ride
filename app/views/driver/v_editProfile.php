<?php require APPROOT . '/views/inc/header.php'; ?>



    <!--Side Bar-->
<?php require APPROOT . '/views/inc/components/sidebar.php'; ?>


    <section class="home-section">
        <!--Top Navigation bar-->
        <?php require APPROOT . '/views/inc/components/topnavbar.php'; ?>


        <div class="title">
            <a href="<?php echo URLROOT; ?>/pages/Profile"><span>Profile</span></a>><a href="<?php echo URLROOT; ?>/pages/Profile"><span class="strong">Edit</span></a>
        </div>

        <hr class="hr">


        <form action="<?php echo URLROOT; ?>/pages/editProfile" method="POST">
            <div class="form-container">

                <label for="name"><b>NIC</b></label>
                <input type="text" placeholder="Enter Your NIC" class="NIC" name="NIC" value = "<?= $data['NIC']; ?>" >
<!--                            <span class="form-invalid">--><?php //echo $data['NIC_err']; ?><!--</span>-->

                <label for="name"><b>First Name</b></label>
                <input type="text" placeholder="Enter Your First Name" class="fname" name="firstName" value = "<?= $data['firstName']; ?>" >
                <span class="form-invalid"><?php echo $data['first_name_err']; ?></span>

                <label for="name"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Your Last Name" class="lname" name="lastName" value = "<?= $data['lastName']; ?>" >
                <span class="form-invalid"><?php echo $data['last_name_err']; ?></span>

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" value="<?= $data['email']; ?>" >
                <span class="form-invalid"><?php echo $data['email_err']; ?></span>

                <label for="name"><b>Phone No</b></label>
                <input type="text" placeholder="Enter Your Phone no" class="phoneNo" name="phoneNo" value = "<?= $data['phoneNo']; ?>" >
                <!--            <span class="form-invalid">--><?php //echo $data['phoneNo_err']; ?><!--</span>-->

                <label for="name"><b>Address</b></label>
                <input type="text" placeholder="Enter Your Address" class="address" name="address" value = "<?= $data['address']; ?>" >
                <!--            <span class="form-invalid">--><?php //echo $data['address_err']; ?><!--</span>-->

                <label for="name"><b>Area</b></label>
                <input type="text" placeholder="Area you would driving" class="name" name="area" value = "<?= $data['area']; ?>" >

                <label for="name"><b>License No</b></label>
                <input type="text" placeholder="Enter Your License No" class="licenseNo" name="licenseNo" value = "<?= $data['licenseNo']; ?>" >
                <!--            <span class="form-invalid">--><?php //echo $data['licenseNo_err']; ?><!--</span>-->

                <label for="name"><b>Upload the License Scanned Copy</b></label>

                <input type="file" id="file-uploader" accept=".jpg, .png" name="license_scanned_copy" value="<?= $data['licenseNo']; ?>">
                <!--            <span class="form-invalid">--><?php //echo $data['license_scanned_copy_err']; ?><!--</span>-->


                <label for="password"><b>Password</b></label>
                <input type="password" autocomplete="off" placeholder="Enter Password" name="password" value="<?= $data['password']; ?>" >
                <span class="form-invalid"><?php echo $data['password_err']; ?></span>

                <label for="password-repeat"><b>Repeat Password</b></label>
                <input type="password" autocomplete="off" placeholder="Repeat Password" name="confirm_password" value="<?php echo $data['confirm_password']; ?>">
                <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>


                <div class="clearfix">
                    <input type="submit" value="Update" class="signupbtn">
                </div>
            </div>
        </form>
    </section>

<?php require APPROOT . '/views/inc/footer.php';  ?>