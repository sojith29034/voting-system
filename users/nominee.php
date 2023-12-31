<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['id']))
{
// require '../common/postLogin.php';
include '../common/navbar.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nominee Login | <?=$_SESSION['uname']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">

              <!---------------------------- Before Submission ---------------------------->
              <div class="card mb-3">
                <div class="card-header"><h5>Nominee Application</h5></div>
                <div class="card-body">
                  <p class="card-text">To apply as a nominee, firstly note the criterias to stand as mentioned 
                  
                  <a type="button" class="link-underline-primary" data-bs-toggle="modal" data-bs-target="#criteria">here</a>
                  , then proceed to fill the <strong>Nominee Application Form</strong>.</p>
                  
                  <a href="newNominee.php" class="btn btn-primary">Application Form</a>
                </div>
              </div>


            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="criteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Criterias to be a Nominee</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="newNominee.php" class="btn btn-primary">Nominee Application Form</a>
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