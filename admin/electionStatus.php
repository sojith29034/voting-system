<!--
    0 - nothing: user can choose candidate but not voter
    1 - voting starts: user can choose voter but not candidate
    2 - voting ends: no voter or candidate
    3 - declare results: only results will be declared, no voter or candidate
-->

<!DOCTYPE HTML>
<html lang="en">

<head>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>

<body>
    <?php
    require '../common/connect.php';

    if ($_SESSION['id'] == 'admin') {
        $query = "SELECT voteStatus FROM `login` WHERE id='admin'";
        $result = mysqli_query($conn, $query);
        while ($admin = mysqli_fetch_assoc($result)) {
            // Start Voting
            if($admin['voteStatus']==0){
    ?>
        <form action="../common/voteActions.php" method="post" class="w-100 h-100 text-center my-5">
            <button type="button" class="btn btn-success"data-bs-toggle="modal" data-bs-target="#startElection">Start Election</button>

            <!-- Confirm Election Start Modal -->
            <div class="modal fade" id="startElection" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="startElectionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="startElectionLabel">Confirm Election Start</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to start the election? This will unlock all votes and allow users to cast their vote.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="startElection">Start Election</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php
        }
        else if($admin['voteStatus']!=0){
            // Stop Voting
            if($admin['voteStatus']==1){
    ?>
        <form action="../common/voteActions.php" method="post" class="w-100 text-center my-5">
            <button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#stopElection">Stop Election</button>

            <!-- Confirm Election stop Modal -->
            <div class="modal fade" id="stopElection" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="stopElectionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="stopElectionLabel">Confirm Election Stop</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure to stop the election?<br><br>
                            All votes will be counted and results will be displayed!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="stopElection">Stop Election</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php
            } 
            // Declare Voting Results
            else if($admin['voteStatus']==2){
    ?>
        <form action="../common/voteActions.php" method="post" class="w-100 text-center my-5">
            <button type="button" class="btn btn-info"data-bs-toggle="modal" data-bs-target="#declareResults">Declare Results</button>

            <!-- Declare Voting Results Modal -->
            <div class="modal fade" id="declareResults" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="declareResultsLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="declareResultsLabel">Confirm Election Stop</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure to stop the election?<br><br>
                            All votes will be counted and results will be displayed!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info" name="declareResults">Declare Results</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php
            }
        function displayChart($position, $postID, $conn)
        {
            $voteChart = array();
            $count = 0;
            $vote = "SELECT * FROM candidates WHERE status='Accepted' AND post='$position'";
            $result = mysqli_query($conn, $vote);

            while ($row = mysqli_fetch_assoc($result)) {
                $voteChart[$count]["label"] = $row["name"];
                $voteChart[$count]["y"] = $row["voteCount"];
                $count++;
            }
    ?>

            <div id="chartContainer<?= $postID ?>" style="height: 500px; width: 100%;"></div>
            <script>
                var chart<?= $postID ?> = new CanvasJS.Chart("chartContainer<?= $postID ?>", {
                    animationEnabled: true,
                    theme: "light2",
                    title: {
                        text: "<?= $position ?>"
                    },
                    axisY: {
                        title: "Vote Count"
                    },
                    data: [{
                        type: "column",
                        yValueFormatString: "#,##0 votes",
                        dataPoints: <?php echo json_encode($voteChart, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart<?= $postID ?>.render();
            </script>

    <?php
        }

        displayChart("General Secretary", "General", $conn);
        displayChart("Joint Secretary", "Joint", $conn);
        displayChart("Sports Secretary", "Sports", $conn);
        displayChart("Cultural Secretary", "Cultural", $conn);

        }
    }

    } else {
        header("Location:../login.php");
        exit();
    }
    ?>
</body>

</html>
