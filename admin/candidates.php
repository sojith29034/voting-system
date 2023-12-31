<?php
require '../common/connect.php';
require '../common/links.php';

if(($_SESSION['id'] == 'admin'))
{
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Candidate Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <h1>Candidate Details</h1>
    
    <div class="container">
        <div class="card my-3">
            <h3 class="card-header">General Secretary</h3>
            <div class="card-body row">
                <?php
                  $query = "SELECT * FROM candidates where status='accepted' && post='General Secretary'";
                  $query_run = mysqli_query($conn,$query);

                  $i=1;
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    foreach($query_run as $nominee)
                    {
                ?>
                <div class="card m-3 col-4" style="width: 20%;">
                    <img src="<?=$nominee['pfp']?>" alt="<?=$nominee['pfp']?>" class="pfp-cover card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?=$nominee['name']?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <?php
                      $i++;
                    }
                  }
                  else{ 
                    echo "<div class='alert alert-warning' role='alert'>
                        No General Secretary Applications accepted yet.
                        </div>";
                  }
                ?>
            </div>
        </div>

        <div class="card my-3">
            <h3 class="card-header">Joint Secretary</h3>
            <div class="card-body row">
                <?php
                  $query = "SELECT * FROM candidates where status='accepted' && post='Joint Secretary'";
                  $query_run = mysqli_query($conn,$query);

                  $i=1;
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    foreach($query_run as $nominee)
                    {
                ?>
                <div class="card m-3 col-4" style="width: 20%;">
                    <img src="<?=$nominee['pfp']?>" alt="<?=$nominee['pfp']?>" class="pfp-cover card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?=$nominee['name']?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <?php
                      $i++;
                    }
                  }
                  else{ 
                    echo "<div class='alert alert-warning' role='alert'>
                        No Joint Secretary applications accepted yet.
                        </div>";
                  }
                ?>
            </div>
        </div>
    </div>

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
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM candidates where status='accepted'";
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
                    <td><?=$nominee['status']?></td>
                    <td>
                        <a href="#<?=$nominee['name']?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewCandidate<?=$i?>">View</a>
                                      
                        <!----------------- Nominee Details Modal ----------------->
                        <div class="modal fade" id="viewCandidate<?=$i?>" tabindex="-1" aria-labelledby="nomineeDetails<?=$i?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="nomineeDetails<?=$i?>">Nominee Details - <?=$nominee['name']?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card text-start">
                                            <div class="card-body">
                                              <div class="row align-middle">
                                                <div class="col-md-6">
                                                  <label class="form-label">Name of Nominee:</label>
                                                    <p class="form-control"><?=$nominee['name']?></p>
                                                  <label class="form-label">Department of Nominee:</label>
                                                    <p class="form-control"><?=$nominee['dept']?></p>
                                                  <label class="form-label">Average CGPA:</label>
                                                    <p class="form-control"><?=$nominee['cgpa']?></p>
                                                  <label class="form-label">Nominee for the Position of:</label>
                                                    <p class="form-control"><?=$nominee['post']?></p>
                                                </div>
                                                <div class="col-6 d-flex align-items-center justify-content-center">
                                                  <img src="<?=$nominee['pfp']?>" alt="<?=$nominee['pfp']?>" class="pfp" >
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-12">
                                                  <label class="form-label">Reason to nominate themselves for this position:</label>
                                                    <p class="form-control"><?=$nominee['reason']?></p>
                                                  <label class="form-label">Insights on Nominee:</label>
                                                    <p class="form-control"><?=$nominee['detail']?></p>
                                                  <label class="form-label">Club Participation:</label>
                                                    <p class="form-control"><?=$nominee['club']?></p>
                                                  <label class="form-label">Experiences and Achievements:</label>
                                                    <p class="form-control"><?=$nominee['achieve']?></p>
                                                  <img src="<?=$nominee['cert']?>" alt="<?=$nominee['cert']?>" class="cert" >
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <form action="../common/formActions.php" method="GET">
                                            <!-- Assuming 'name' is the only parameter you need -->
                                            <input type="hidden" name="name" value="<?=$nominee['name']?>">

                                            <a href="../common/formActions.php?name=<?=$nominee['name']?>&status=R" class="btn btn-danger">Reject</a>
                                            <a href="../common/formActions.php?name=<?=$nominee['name']?>&status=A" class="btn btn-success">Accept</a>
                                        </form>
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

<style>
  .pfp-cover{
    height: 150px;
    width: 150px;
    margin-top: 15px;
    border-radius: 10px;
    object-fit: cover;
  }
</style>

<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>