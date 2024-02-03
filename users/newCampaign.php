<?php
require '../common/connect.php';

session_start();

require '../common/links.php';

if(isset($_SESSION['id']))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Campaign | <?=$_SESSION['uname']?></title>

    <style>
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-bg-primary">
                        <h3 class="text-center">Add Candidate Campaign</h3>
                    </div>
                    <div class="card-body">
                        <form action="../common/campaignActions.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="id" name="id" value="<?=$_SESSION['id']?>"/>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <label class="form-label" for="motto">Candidate Motto:</label>
                                                <textarea name="motto" id="motto" class="form-control" row="1" style="resize: none;" placeholder="Enter your motto . . ."></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="c">Select size for your Campaign: </label><br>

                                            <input class="size visually-hidden" type="radio" name="size" id="l" value="col-4 col-md-2">
                                                <label class="size btn btn-light m-1" style="cursor: pointer;" for="l">L size</label>
                                            <input class="size visually-hidden" type="radio" name="size" id="xl" value="col-8 col-md-4">
                                                <label class="size btn btn-light m-1" style="cursor: pointer;" for="xl">XL size</label>
                                            <input class="size visually-hidden" type="radio" name="size" id="xxl" value="col-12 col-md-6">
                                                <label class="size btn btn-light m-1" style="cursor: pointer;" for="xxl">XXL size</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="campaign" class="form-label">Select Campaign Image: </label>
                                                <input type="file" name="campaign" id="campaign" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="button" class="btn btn-secondary mx-5 my-2" data-bs-toggle="modal" data-bs-target="#cancelCampaign">Cancel</button>
                                    <button type="button" class="btn btn-primary mx-5 my-2" data-bs-toggle="modal" data-bs-target="#newCampaign">Add Camapign</button>
                                </div>


                                <!-- Add Campaign Modal -->
                                <div class="modal fade" id="newCampaign" tabindex="-1" aria-labelledby="newCampaignLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="newCampaignLabel">Add Nominee Campaign</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Confirm submission of Nominee Campaign.<br>
                                            Click on <strong>'Run Campaign'</strong> to post the Campaign.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submitCampaign" class="btn btn-success" name="submitCampaign">Run Campaign</button>
                                        </div>
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
    <div class="modal fade" id="cancelCampaign" tabindex="-1" aria-labelledby="cancelCampaignLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cancelCampaignLabel">Cancel Campaign</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Your campaign has not yet been added. Are you sure you want to leave?<br>
                    Click on <strong>'Close'</strong> to add your campaign.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="nominee.php" class="btn btn-danger">Cancel Submission</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .size:checked + label{
            background-color: gray;
            border-color: gray;
        }
    </style>
</body>
</html>

<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>