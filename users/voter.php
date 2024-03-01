<?php
require '../common/connect.php';

session_start();

require '../common/links.php';

if(isset($_SESSION['id']))
{
  $checkVoteStatus = "SELECT voteStatus FROM `login` WHERE id=?";
  $run = mysqli_prepare($conn, $checkVoteStatus);
  mysqli_stmt_bind_param($run, 's', $_SESSION['id']);
  $result = mysqli_stmt_execute($run);
  mysqli_stmt_bind_result($run, $voteStatus);
  mysqli_stmt_fetch($run);
  mysqli_stmt_close($run);
  
  if($voteStatus == 0)
  {
  
    include '../common/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Voter Login | <?= $_SESSION['uname'] ?></title>
    </head>
    <body>
        <div class="container">

        <form action="../common/voteActions.php" method="post">
          <div class="row">
              <div class="col-md-6">
                <h1 class="section-title mt-4">Candidate List</h1>
              </div>
              <div class="col-md-6 text-end mt-4">
                <button type="button" class="btn btn-success" name="submitVote" data-bs-toggle="modal" data-bs-target="#confirmSubmit">Submit Vote</button>
              </div>
          </div>

          <!----------------------------------------- Vote Confirmation Modal ----------------------------------------->
          <div class="modal fade" id="confirmSubmit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmSubmitLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="confirmSubmitLabel">Confirm Vote Submission</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" name="submitVote">Confirm Submit</button>
                </div>
              </div>
            </div>
          </div>

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
                  <h3 class='card-header text-center my-2'>$position</h3>
                  <div class='card-body d-flex justify-content-evenly row'>";

            foreach ($query_run as $nominee) {
      ?>
            <div class='card col-md-3 col-sm-6 col-12'>
              <img src='<?=$nominee['pfp']?>' alt='<?=$nominee['pfp']?>' class='pfp-cover card-img-top'>
              <div class='card-body text-center'>
                  <h5 class='card-title'><?=$nominee['name']?></h5>
                  <p class='card-text'><?=$nominee['dept']?></p>
                  <div class="btns">
                    <input class="vote visually-hidden vote-checkbox" type="radio" name="<?=$nominee['post']?>" id="<?=$nominee['name']?>" value="<?=$nominee['id']?>">
                      <label class="vote btn text-white m-1 rounded-pill" style="cursor: pointer;" for="<?=$nominee['name']?>">Vote</label>
                    <button type="button" class='btn btn-outline-primary m-1 rounded-pill' data-bs-toggle="modal" data-bs-target="#nomineeDetails<?=$nominee['id']?>">View</button>
                  </div>




                  <!------------------------------------------ Nominee Details Modal ------------------------------------------>
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

        
        $position = "General Secretary";
        displayCandidates($position, $conn);
        $position = "Joint Secretary";
        displayCandidates($position, $conn);
        $position = "Sports Secretary";
        displayCandidates($position, $conn);
        $position = "Cultural Secretary";
        displayCandidates($position, $conn);
      ?>

            <hr class='border border-dark opacity-100'>
            <div class="col-md-12 text-center mt-4">
              <button type="button" class="btn btn-success" name="submitVote" data-bs-toggle="modal" data-bs-target="#confirmSubmit">Submit Vote</button>
            </div>
      </form>
    </div>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.querySelector('#confirmSubmit').addEventListener('show.bs.modal', function (event) {
        var modal = this;
        var selectedCandidates = document.querySelectorAll('.vote-checkbox:checked');
        var modalBody = modal.querySelector('.modal-body');

        modalBody.innerHTML = '';

        selectedCandidates.forEach(function(candidate) {
          var candidateDetails = document.createElement('p');
          candidateDetails.textContent = "Position: " + candidate.getAttribute('name') + ", Candidate: " + candidate.getAttribute('id');
          modalBody.appendChild(candidateDetails);
        });
      });
    });
    </script>

  </body>

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

    .vote:checked + label{
      background-color: green;
      border-color: green;
    }
    :not(.vote:checked) + label{
      background-color: red;
      border-color: red;
    }
  </style>
</html>


<?php
  }
  else{
    header("Location:../users/successVote.php");
    exit();
  }
}
else{
    header("Location:../login.php");
    exit();
}
?>