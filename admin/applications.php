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

    <link rel="stylesheet" href="../common/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
      
      <h1 class="section-title">Nominee Applications</h1>

    <div class="row my-5">
      <div class="col-12">
        <div class="card">
          <div class="card-body overflow-x-scroll">
            <table class="table table-striped align-middle">
              <thead class="my-2">
                <tr class="text-center">
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
                  $query = "SELECT * FROM candidates";
                  $query_run = mysqli_query($conn,$query);

                  $i=1;
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    foreach($query_run as $nominee)
                    {
                ?>

                <tr class="text-center">
                    <td><?=$i?></td>
                    <td><?=$nominee['name']?></td>
                    <td><?=$nominee['dept']?></td>
                    <td><?=$nominee['post']?></td>
                    <td 
                      <?php if ($nominee['status'] == 'accepted' || $nominee['status'] == 'Accepted'): ?>
                        class="text-success"
                      <?php elseif ($nominee['status'] == 'rejected' || $nominee['status'] == 'Rejected'): ?>
                        class="text-danger"
                      <?php elseif ($nominee['status'] == 'pending' || $nominee['status'] == 'Pending'): ?>
                        class="text-warning"
                      <?php endif; ?>
                    >
                      <?=$nominee['status']?>
                    </td>

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
                                        <div class="card text-start">
                                            <div class="card-body">
                                              <div class="row align-middle">
                                                <div class="col-lg-6 order-lg-2 d-flex align-items-center justify-content-center">
                                                  <img src="<?=$nominee['pfp']?>" alt="<?=$nominee['pfp']?>" class="pfp" >
                                                </div>
                                                <div class="col-lg-6 order-lg-1">
                                                  <label class="form-label">Name of Nominee:</label>
                                                    <p class="form-control"><?=$nominee['name']?></p>
                                                  <label class="form-label">Department of Nominee:</label>
                                                    <p class="form-control"><?=$nominee['dept']?></p>
                                                  <label class="form-label">Average CGPA:</label>
                                                    <p class="form-control"><?=$nominee['cgpa']?></p>
                                                  <label class="form-label">Nominee for the Position of:</label>
                                                    <p class="form-control"><?=$nominee['post']?></p>
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

                                            <a href="../common/formActions.php?name=<?=$nominee['name']?>&status=R" class="btn btn-danger mx-5">Reject</a>
                                            <a href="../common/formActions.php?name=<?=$nominee['name']?>&status=A" class="btn btn-success mx-5">Accept</a>
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
                        No Applications Submitted.
                        </div>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  <script>
    document.querySelector(".open-btn").addEventListener('click', function() {
      document.querySelector("aside").classList.add('active');
    });
    document.querySelector(".sidebar .close-btn").addEventListener('click', function() {
        document.querySelector("aside").classList.remove('active');
    });
  </script>
</body>
</html>

<style>
  .pfp{
    height: 300px;
    width: 300px;
    border-radius: 50%;
    padding: 5px;
    border: 2px solid gray;
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