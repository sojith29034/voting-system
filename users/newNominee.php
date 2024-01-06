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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header text-bg-primary">
              <h3 class="text-center">Nominee Application Form</h3>
            </div>
            <div class="card-body">

              <form action="../common/formActions.php" method="post" enctype="multipart/form-data">

                <div class="card">
                  <div class="card-header">
                    <h5 class="fw-light fst-italic">Basic Details of Nominee: </h5>
                  </div>

                  <div class="card-body row">
                    <div class="col-md-6">
                      <label for="name" class="form-label">Name of Nominee:</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?=$_SESSION['uname']?>" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="pfp" class="form-label">Insert Image of Nominee(face visible)</label>
                        <input type="file" name="pfp" id="pfp" class="form-control" >
                    </div>
                    <div class="col-md-6 order-sm-2 my-3">
                      <label for="dept" class="form-label">Department of Nominee:</label>
                        <select id="dept" name="dept" class="form-select" >
                          <option value="default">Select Nominee's Department</option>
                          <option value="Computer Department">Computer Department</option>
                          <option value="IT Department">IT Department</option>
                          <option value="Mechanical Department">Mechanical Department</option>
                          <option value="Electrical Department">Electrical Department</option>
                          <option value="EXTC Department">EXTC Department</option>
                        </select>
                    </div>
                    <div class="col-md-6 order-sm-1 my-3">
                      <label for="post" class="form-label">Nominee for the Position:</label>    
                        <select id="post" name="post" class="form-select" >
                          <option value="default">Select Position</option>
                          <option value="General Secretary">General Secretary</option>
                          <option value="Joint Secretary">Joint Secretary</option>
                          <option value="Sports Secretary">Sports Secretary</option>
                          <option value="Cultural Secretary">Cultural Secretary</option>
                        </select>
                    </div>
                    <div class="col-md-12 order-sm-3">
                      <label for="nomiReason" class="form-label">State why you should be considered as a candidate for the above selected position: </label>
                        <textarea name="nomiReason" id="nomiReason" class="form-control" row="2" style="resize: none;" placeholder="Brief you reason . . ."  ></textarea>
                    </div>
                  </div>
                </div>


                <div class="card mt-3">
                  <div class="card-header">
                    <h5 class="fw-light fst-italic">Background of Nominee: </h5>
                  </div>

                  <div class="card-body row">
                    <div class="col-md-6">
                      <label for="cgpa" class="form-label">Average CGPA:</label>
                        <input type="text" name="cgpa" id="cgpa" class="form-control" placeholder="Enter CGPA" >

                      <label for="club" class="form-label">Club Participation: </label>
                        <textarea name="club" id="club" class="form-control" row="3" style="resize: none;" 
                          placeholder="Brief your contribution to the club activities . . ."  ></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="achieve" class="form-label">Experiences and Achievements: </label>
                          <textarea name="achieve" id="achieve" class="form-control" row="3" style="resize: none;" 
                          placeholder="State your co-curricular and extracurricular achievements . . ."  ></textarea>

                      <label for="cert" class="form-label order-sm-3">Certificate:</label>
                        <input type="file" name="cert" id="cert" class="form-control" >
                    </div>
                    <div class="col-md-12 order-sm-4">
                      <label for="detail" class="form-label">Nominee Insights: </label>
                        <textarea name="detail" id="detail" class="form-control" row="3" style="resize: none;" 
                        placeholder="State your motto and elaborate on your reason for participating in the elections as a candidate . . ."  ></textarea>
                    </div>
                  </div>
                </div>

                <div class="card-body text-center mt-3">
                  <input type="hidden" name="status" id="status" value="Pending">
                  <button type="button" class="btn btn-secondary mx-5" data-bs-toggle="modal" data-bs-target="#cancelForm">Cancel</button>
                  <button type="button" class="btn btn-primary mx-5" data-bs-toggle="modal" data-bs-target="#submitForm">Submit</button>
                </div>


                <!-- Submit Form Modal -->
                <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Submit Nominee Application</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Confirm submission of Nominee Application. Are you sure you want to submit?<br>
                        Click on <strong>'Yes, Submit'</strong> to submit the Application Form.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" name="submit">Yes, Submit</button>
                      </div>
                    </div>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Cancel Form Submission Modal -->
    <div class="modal fade" id="cancelForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Cancel Application</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Your application has not yet been submitted. Are you sure you want to leave?<br>
            Click on <strong>'Close'</strong> to continue filling the Application Form.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="nominee.php" class="btn btn-danger">Cancel Submission</a>
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