<?php require APPROOT . '/views/inc/header.php'; ?>

    <!--Top Navigation bar-->
<?php require APPROOT . '/views/inc/components/topnavbar.php'; ?>


    <h1>Driver's Log in</h1>

    <form action='<?php echo URLROOT?>./users/login' method="POST" style="border:1px solid #ccc">
        <div class="form-container">
            <h1>Sign In</h1>
            <p>Please fill in this form to log in to the account.</p>
            <hr>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" id="email" name="email" value="<?php echo $data['email'] ?>">
            <span class="form-invalid"><?php echo $data['email_err'] ?></span>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="password" name="password" value="<?php echo $data['password'] ?>">
            <span class="form-invalid"><?php echo $data['password_err'] ?></span>

            <div class="clearfix">
                <input type="submit" value="Sign in" class="signinbtn">
            </div>

            <?php flash('reg_flash'); ?>
        </div>
    </form>

<?php require APPROOT . '/views/inc/footer.php';  ?>