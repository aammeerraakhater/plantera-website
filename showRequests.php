<?php
    $page_name = "Get All Requests";
    $style = "showRequests.css";
    $semanticstyle = "semantic.min.css";
    require_once "init.php";
    include 'authentication.php';
    if(isset($_SESSION['verified_user_id'])){
    require 'topNav.php';
    $ref_table = 'request';
    $fetchdata = $database->getReference($ref_table)->getValue();
    if(isset($_SESSION['requestStatus'])){
        echo "
        <script>
        toastr.info('" . $_SESSION['requestStatus'] . "')
        </script>";
        // header("Refresh:3;url=admin_dash.php"); 
        unset($_SESSION['requestStatus']);
     } 
      ?>
      <div class="container-fluid ">
        <div class="allContent">

    <div class="container mb-3">
        <img style="display: block;margin: auto;margin-top:10px;margin-bottom:20px; width:15%" class="add_admin" src="imgs/img_377947.png" alt="add_admin">
        <h3 class="text-center mt-2 mb-3">Welcome To Website Dashboard .</h3>
        <p class="text-center">From This Page You Can Show All Requests</p>


    <?php
if($fetchdata > 0){?>
    <div class="row">

    <?php foreach ($fetchdata as $key => $row) {?>
        <div class="col-md-4">
            <div class="ui cards mb-3 text-center">

                <div class="card">
                    <div class="content">
                    <img style="margin: 20px 0;width:20%" src="imgs/user.png" alt="sender">
                    <div class="header pb-3">
                        <?php echo $row["fullname"];?>
                    </div>
                    <div class="meta">
                    <?php echo $row["time"];?>
                    </div>
                    <div class="meta">Email:
                    <?php echo $row["email"];?>
                    </div>
                    <div class="meta"> Phone No.
                    <?php echo $row["phone"];?>
                    </div>
                    <div class="description pb-3">No. of farms:
                    <?php echo $row["noOfFarms"];?>
                    </div>
                    </div>
                    <div class="extra content">
                    <div class="ui buttons">
                        <form action="delete.php" method="post">
                        <input type="hidden" name="deleteRequestID" value="<?= $key?>">
                        <input class="ui basic brown button"  type="submit" value="Delete">
                        </form>
                    </div>
                    </div>
                    </div>
                </div>
        </div><?php } ?>
        </div>    </div>

        <?php } else{?>
                <p style="margin-top: 100px;font-weight: 700;font-size: 30px;" class="text-danger text-center">* There is No Message To Show *</p>
            <?php } ?>

      </div>
</div>

<?php
}else{
   header("Location:LogIn.php");
}
