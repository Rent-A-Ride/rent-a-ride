<?php require APPROOT . '/views/inc/header.php'; ?>

<!--Top Navigation bar-->
<?php require APPROOT . '/views/inc/components/topnavbar.php'; ?>



    <h1>Drivers Signup</h1>


    <form action="<?php echo URLROOT; ?>/Users/register" method="POST" style="border:1px solid #ccc">
        <div class="form-container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="name"><b>NIC</b></label>
            <input type="text" placeholder="Enter Your NIC" class="NIC" name="NIC" value = "<?php echo $data['NIC'];?>" >
<!--            <span class="form-invalid">--><?php //echo $data['NIC_err']; ?><!--</span>-->

            <label for="name"><b>First Name</b></label>
            <input type="text" placeholder="Enter Your First Name" class="fname" name="firstName" value = "<?php echo $data['firstName'];?>" >
            <span class="form-invalid"><?php echo $data['first_name_err']; ?></span>

            <label for="name"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Your Last Name" class="lname" name="lastName" value = "<?php echo $data['lastName'];?>" >
            <span class="form-invalid"><?php echo $data['last_name_err']; ?></span>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" value="<?php echo $data['email']; ?>" >
            <span class="form-invalid"><?php echo $data['email_err']; ?></span>

            <label for="name"><b>Phone No</b></label>
            <input type="text" placeholder="Enter Your Phone no" class="phoneNo" name="phoneNo" value = "<?php echo $data['phoneNo'];?>" >
<!--            <span class="form-invalid">--><?php //echo $data['phoneNo_err']; ?><!--</span>-->

            <label for="name"><b>Address</b></label>
            <input type="text" placeholder="Enter Your Address" class="address" name="address" value = "<?php echo $data['address'];?>" >
<!--            <span class="form-invalid">--><?php //echo $data['address_err']; ?><!--</span>-->

            <label for="name"><b>Area</b></label>
            <input type="text" placeholder="Area you would driving" class="name" name="area" value = "<?php echo $data['area'];?>" >

            <label for="name"><b>License No</b></label>
            <input type="text" placeholder="Enter Your License No" class="licenseNo" name="licenseNo" value = "<?php echo $data['licenseNo'];?>" >
<!--            <span class="form-invalid">--><?php //echo $data['licenseNo_err']; ?><!--</span>-->

            <label for="name"><b>Upload the License Scanned Copy</b></label>
            <input type="file" id="file-uploader" accept=".jpg, .png" name="license_scanned_copy">
<!--            <span class="form-invalid">--><?php //echo $data['license_scanned_copy_err']; ?><!--</span>-->


            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" value="<?php echo $data['password']; ?>" >
            <span class="form-invalid"><?php echo $data['password_err']; ?></span>

            <label for="password-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="confirm_password" value="<?php echo $data['confirm_password']; ?>">
            <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>

            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <input type="submit" value="Register" class="signupbtn">
            </div>
        </div>
    </form>

<?php require APPROOT . '/views/inc/footer.php';  ?>