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
    <title>Candidate Application</title>


    <link rel="stylesheet" href="../common/style.css">
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
                                        class="pfp">
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
                                    <img src="<?=$nominee['cert']?>" alt="<?=$nominee['cert']?>" class="cert img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card-footer text-center">
                    <form action="../common/formActions.php" method="POST">
                        <!-- <button type="submit" name="comment" class="btn btn-primary mx-auto">Add comment</button> -->

                        <input type="hidden" id="hiddenComments" name="hiddenComments" value="">
                        
                        <button type="button" class="btn btn-danger mx-5" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>
                        <button type="button" class="btn btn-success mx-5" data-bs-toggle="modal" data-bs-target="#acceptModal">Accept</button>

                        
                        <!-- Reject Application Form Modal -->
                        <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="rejectLabel">Reject Nominee Application</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to reject <?=$nominee['name']?>'s application?
                                        <textarea class="form-control bg-warning-subtle my-2" name="comments" id="comments" row="2" 
                                                style="resize: none;" placeholder="Administrator comments for nominee . . ."></textarea>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary mx-5" data-bs-dismiss="modal">Cancel</button>
                                        <a href="#" class="btn btn-danger mx-5" onclick="submitForm('R')">Reject</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accept Application Form Modal -->
                        <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="acceptLabel">Accept Nominee Application</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to accept <?=$nominee['name']?>'s application?
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary mx-5" data-bs-dismiss="modal">Cancel</button>
                                        <a href="#" class="btn btn-success mx-5" onclick="submitForm('A')">Accept</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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


    
    <script>
        function submitForm(status) {
            const comments = document.getElementById('comments').value;
            const url = `../common/formActions.php?name=<?=$nominee['name']?>&attempts=<?=$nominee['attempts']?>&status=${status}&comments=${comments}`;
            window.location.href = url;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  
    <style>
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
</html>


<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>