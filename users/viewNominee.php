<?php
require '../common/connect.php';

session_start();

require '../common/links.php';

if(isset($_SESSION['id']))
{
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nominee Application</title>

    <style>
      .img-pfp{
        height: 300px;
        width: 300px;
        border-radius: 50%;
        padding: 5px;
        border: 2px solid gray;
        object-fit: cover;
      }
      .img-cert{
        max-width: 100%;
        height: auto;
        object-fit: cover;
      }
    </style>
  </head>
  <body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
            <?php
            if (isset($_GET['name'])) {
                $name = mysqli_real_escape_string($conn, $_GET['name']);
                $query = "SELECT * FROM candidates WHERE name='$name'";
                $result = mysqli_query($conn, $query);

                if(mysqli_num_rows($result)>0){
                    $nominee = mysqli_fetch_array($result);
            ?>
            <div class="card">
                <div class="card-header text-bg-primary">
                    <h3 class="text-center">Nominee Details - <?=$nominee['name']?></h3>
                </div>
                <div class="card-body">
                    <div class="card text-start">
                        <div class="card-body">
                            <div class="row align-middle">
                                <div class="col-lg-6 order-lg-2 d-flex align-items-center justify-content-center">
                                    <img src="<?=$nominee['pfp']?>"
                                        alt="<?=$nominee['pfp']?>"
                                        class="img-pfp">
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
                                </div>
                            </div>
                            <div class="row align-middle">
                                <div class="col-lg-6">
                                    <label class="form-label">Insights on Nominee:</label>
                                    <p class="form-control"><?=$nominee['detail']?></p>
                                    <label class="form-label">Club Participation:</label>
                                    <p class="form-control"><?=$nominee['club']?></p>
                                    <label class="form-label">Experiences and Achievements:</label>
                                    <p class="form-control"><?=$nominee['achieve']?></p>
                                </div>
                                <div class="col-lg-6">
                                    <img src="<?=$nominee['cert']?>" alt="<?=$nominee['cert']?>" class="img-cert img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="./nominee.php" class="btn btn-primary mx-5">Go Back</a>
                </div>
            </div>
            <?php
                }
                else{
                    echo "Error occured! Try again.";
                }
            }
            ?>
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