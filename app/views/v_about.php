<?php require APPROOT . '/views/inc/header.php' ?>

    <h1>Customers</h1>

    <?php
        foreach($data['customer'] as $customer):
    ?>

    <p><?php echo $customer->customerName; ?> <?php echo $customer->customerAddress; ?> <?php echo $customer->customerPhone; ?></p>

    <?php endforeach; ?>



<?php require APPROOT . '/views/inc/footer.php' ?>

