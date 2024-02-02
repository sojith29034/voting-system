<!DOCTYPE HTML>
<html lang="en">

<head>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>

<body>
    <?php
    require '../common/connect.php';

    if ($_SESSION['id'] == 'admin') {

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

    } else {
        header("Location:../login.php");
        exit();
    }
    ?>
</body>

</html>
