<?php
require '../common/connect.php';

if ($_SESSION['id'] == 'admin') {
  require '../common/links.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Candidate Details</title>

  <style>
    .pfp-cover {
      height: 150px;
      /* width: 150px; */
      margin-top: 15px;
      border-radius: 5px;
      object-fit: cover;
    }

    .card {
      margin-bottom: 15px;
    }
    .pfp {
      height: 300px;
      width: 300px;
      border-radius: 50%;
      padding: 5px;
      border: 2px solid gray;
      object-fit: cover;
    }

    .cert {
      max-width: 100%;
      height: auto;
      object-fit: cover;
    }
  </style>
</head>

  <body>
    <div class="container">
      <h1 class="section-title text-center mt-4">Candidate Details</h1>

      <?php
        function displayCandidates($position, $conn)
        {
          $query = "SELECT * FROM candidates WHERE status='accepted' AND post='$position'";
          $query_run = mysqli_query($conn, $query);

          if (!$query_run) {
            echo "Error: " . mysqli_error($conn);
            return;
          }

          if (mysqli_num_rows($query_run) > 0) {
            echo "<hr class='border border-dark opacity-100'>
                  <div class='my-3'>
                  <h3 class='card-header text-center'>$position</h3>
                  <div class='card-body d-flex justify-content-evenly row'>";

            foreach ($query_run as $nominee) {
      ?>
            <div class='card col-md-3 col-sm-6 col-12'>
              <img src='<?=$nominee['pfp']?>' alt='<?=$nominee['pfp']?>' class='pfp-cover card-img-top'>
              <div class='card-body text-center'>
                  <h5 class='card-title'><?=$nominee['name']?></h5>
                  <p class='card-text'><?=$nominee['dept']?></p>
                  <button type="button" class='btn btn-outline-primary' data-bs-toggle="modal" data-bs-target="#nomineeDetails<?=$nominee['id']?>">View Candidate</button>

                  <div class="modal fade" id="nomineeDetails<?=$nominee['id']?>" tabindex="-1"
                    aria-labelledby="nomineeDetailsLabel<?=$nominee['id']?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5"
                                    id="nomineeDetailsLabel<?=$nominee['id']?>">Nominee Details -
                                    <?=$nominee['name']?></h1>
                                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card text-start">
                                    <div class="card-body">
                                        <div class="row align-middle">
                                            <div class="col-lg-6 order-lg-2 d-flex align-items-center justify-content-center">
                                                <img src="<?=$nominee['pfp']?>" alt="<?=$nominee['pfp']?>" class="pfp">
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
                                                <img src="<?=$nominee['cert']?>" alt="<?=$nominee['cert']?>" class="cert">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>

      <?php
            }

            echo "</div>
                  </div>";
          } else {
            echo "<div class='alert alert-warning' role='alert'>
                    No $position applications accepted yet.
                  </div>";
          }
        }

        // Get distinct positions from the database
        $positions_query = "SELECT DISTINCT post FROM candidates";
        $positions_result = mysqli_query($conn, $positions_query);
        
        if (!$positions_result) {
          echo "Error: " . mysqli_error($conn);
        } else {
          while ($position_row = mysqli_fetch_assoc($positions_result)) {
            $position = $position_row['post'];
            displayCandidates($position, $conn);
          }
        }
      ?>
    </div>
  </body>
</html>
<?php
} else {
  header("Location:../login.php");
  exit();
}
?>