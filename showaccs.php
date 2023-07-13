<?php
  $style = "showaccs.css";
  include 'init.php';
  include 'authentication.php';
  if(isset($_SESSION['verified_user_id'])){
    require 'topNav.php';

    ?>
<div class="container showaccsCon">
  <?php
    if(isset($_SESSION['accStatus'])){
      echo "
      <script>
      toastr.info('" . $_SESSION['accStatus'] . "')
      </script>";
      unset($_SESSION['accStatus']);
   } 

    ?>

  <h2>Plantera members</h2>

  <div class="row my-3">
    <div class="col-md-8">  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  </div>
    <div class="col-md-4 left">  <a class="btn btn-success" href="addAcc.php">Create account</a>
  </div>
  </div>

  <table  class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Number of farms</th>
      <th scope="col">Add farm</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody id="myTable">
    <?php
    $users = $auth->listUsers($defaultMaxResults = 1000, $defaultBatchSize = 1000);

        $i=1;
          foreach ($users as $user) {
            if($_SESSION['verified_user_id'] == $user->uid){
              continue;
            }
            ?>
                  <tr>
                    <?php $key = $user->uid;?>
                  <th scope="row"><?=$i?></th>
                  <td><?= $user->displayName; ?></td>
                  <td><?= $user->email; ?></td>
                  <td><?= $user->phoneNumber; ?></td>
                  <?php 
                        $ref_table = 'users/'.$key;
                        $noOfFarms = ($database->getReference($ref_table)->getSnapshot()->numChildren());?>
                  <td><?= $noOfFarms; ?></td>
                  
                  <td>
                  <form action="addFarm.php" method="post">
                        <input type="hidden" name="addFarmKey" value="<?=$key?>">
                        <input class="btn btn-info" type="submit" value="Add">
                  </form>
                  </td>

                  <td>
                  <form action="editAcc.php" method="post">
                        <input type="hidden" name="editaccKey" value="<?=$key?>">
                        <input class="btn btn-warning" name="editAccBTN" type="submit" value="Edit">
                  </form>
                  </td>

                  <td>
                  <form action="delete.php" method="post">
                        <input type="hidden" name="deleteACC" value="<?=$key?>">
                        <input class="btn btn-danger" type="submit" value="Delete">
                  </form>
                  </td>

                  </tr>
                  <?php
                  $i++;
          }
          ?>
  </tbody>
</table>
</div>
<?php
  }else{
      header("location:login.php");
  }

?>
