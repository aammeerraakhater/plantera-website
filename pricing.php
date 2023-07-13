<?php
    $style= 'pricing.css';
    include 'init.php';
    include 'navbar.php';

?>

<div class="container pricingContainer">
    <div class="row">
    <div class="col-sm-6">
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title">One farm</h5>
            <h5 class="card-title">250$ for the first farm</h5>
            <p class="card-text">
                <i class="fa-solid fa-check"></i>
                Monitor and automate one farm<br>
                <i class="fa-solid fa-check"></i>
                Plant disease detection<br>
                <i class="fa-solid fa-check"></i>
                crop yield predection <br></p>
                <form action="request.php" method="post">
                    <input type="hidden" name="requestfarms" value="one">
                    <input class="btn  btn-primary pricingBtn" name="requestfarmsBTN" type="submit" value="Request">
            </form>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Add-ons</h5>
            <h5 class="card-title">200$ for each added farm</h5>
            <p class="card-text">
                <i class="fa-solid fa-check"></i>
                Monitor and automate more than one farm<br>
                <i class="fa-solid fa-check"></i>
                Plant disease detection<br>
                <i class="fa-solid fa-check"></i>
                crop yield predection<br>
            </p>
            <form action="request.php" method="post">
                        <input type="hidden" name="requestfarms" value="more">
                        <input class="btn  btn-primary pricingBtn" name="requestfarmsBTN" type="submit" value="Request">
            </form>
        </div>
        </div>
    </div>
</div>
    </div>