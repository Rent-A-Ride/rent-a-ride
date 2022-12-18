<?php require APPROOT . '/views/inc/header.php'; ?>

    <!--Top Navigation bar-->
<?php require APPROOT . '/views/inc/components/topnavbar.php'; ?>

    <!-- multi search -->
    <div class="search">
        <form role="search" id="form">
            <input type="search" id="query" name="q" placeholder="Search..." aria-label="Search through site content">
            <button>
                <i class="fi fi-br-search"></i>
            </button>
        </form>
    </div>


    <!-- Cards -->

    <div class="cards-container">
        <div class="cards scooter">
            <p>Looking for a</p>
            <h1>Scooter</h1>
            <img src="<?= URLROOT ?>/img/scooter.png" alt="scooter">
        </div>

        <div class="cards moto">
            <p>Looking for a</p>
            <h1>Motorcycle</h1>
            <img src="<?= URLROOT ?>/img/motorcycle.png" alt="motorbikes">
        </div>

        <div class="cards car">
            <p>Looking for a</p>
            <h1>Car</h1>
            <img src="<?= URLROOT ?>/img/sedan.png" alt="cars">
        </div>

        <div class="cards van">
            <p>Looking for a</p>
            <h1>Van</h1>
            <img src="<?= URLROOT ?>/img/van.png" alt="vans">
        </div>
    </div>

    <!-- why rent ride -->
    <div class="separator">Why Rent A Ride</div>

    <div class="info-cont">
        <div class="info-box">
            <div class="info">
                <div class="info-logo">
                    <i class='bx bxs-heart bx-md' ></i>
                </div>
                <div class="info-text">
                    <h4>1250</h4>
                    <p>Customers' Satisfied</p>
                </div>


            </div>
            <div class="info">
                <div class="info-logo">
                    <i class='bx bx-message-dots bx-md'></i>
                </div>
                <div class="info-text">
                    <h4>24 Hours</h4>
                    <p>Customers Assistence</p>
                </div>


            </div>
            <div class="info">
                <div class="info-logo">
                    <i class='bx bx-donate-heart bx-md' ></i>
                </div>
                <div class="info-text">
                    <h4>Flexible</h4>
                    <p>Customers Satisfied</p>
                </div>


            </div>
        </div>

    </div>

    <div class="footer-cont">
        <div class="img"><a href=""><img class="logo-img" src="<?php echo URLROOT;?>/img/logo.png" alt="Rent a Ride Logo"></a></div>
        <p>Mobility without Hassel</p>
    </div>

<?php require APPROOT . '/views/inc/footer.php';  ?>