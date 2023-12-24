<?php
require '../common/connect.php';

if(($_SESSION['id'] == 'admin'))
{
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nominee Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <h1>Nominee Applications</h1>

    <div class="row my-5">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-striped align-middle">
              <thead class="my-2">
                <tr>
                  <th>Sr. No.</th>
                  <th>Name of Nominee</th>
                  <th>Department of Nominee</th>
                  <th>Nominee Post</th>
                  <!-- <th>Status</th> -->
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM candidates";
                  $query_run = mysqli_query($conn,$query);

                  $i=1;
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    foreach($query_run as $nominee)
                    {
                ?>

                <tr>
                    <td><?=$i?></td>
                    <td><?=$nominee['name']?></td>
                    <td><?=$nominee['dept']?></td>
                    <td><?=$nominee['post']?></td>
                    <td>
                        <a href="#<?=$nominee['name']?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nominee<?=$i?>">View</a>
                                      
                        <!----------------- Nominee Details Modal ----------------->
                        <div class="modal fade" id="nominee<?=$i?>" tabindex="-1" aria-labelledby="nomineeDetails<?=$i?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="nomineeDetails<?=$i?>">Nominee Details - <?=$nominee['name']?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <label for="name" class="form-label">Name of Nominee:</label>
                                                    <p class="form-control"><?=$nominee['name']?></p>
                                                  <label for="name" class="form-label">Department of Nominee:</label>
                                                    <p class="form-control"><?=$nominee['dept']?></p>
                                                  <label for="name" class="form-label">Name of Nominee:</label>
                                                    <p class="form-control"><?=$nominee['name']?></p>
                                                </div>
                                                <div class="col-6">
                                                  <label for="pfp" class="form-label">Insert Image of Nominee(face visible)</label>
                                                    <img src="<?=$nominee['pfp']?>" alt="<?=$nominee['pfp']?>" class="form-control img-thumbnail rounded" >
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <?php
                      $i++;
                    }
                  }
                  else{ 
                    echo "<div class='alert alert-warning' role='alert'>
                        No Events added yet.
                        </div>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>