<?php
require '../common/connect.php';

if ($_SESSION['id'] == 'admin') {
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
      width: 150px;
      margin-top: 15px;
      border-radius: 10px;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <h1 class="section-title">Candidate Details</h1>

  <div class="col-12 w-100">
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
              <div class='card-body row'>";

        foreach ($query_run as $nominee) {
          echo "<div class='card m-lg-3 m-sm-2 col-sm-3 col-12'>
                  <img src='{$nominee['pfp']}' alt='{$nominee['pfp']}' class='pfp-cover card-img-top'>
                  <div class='card-body text-center'>
                      <h5 class='card-title'>{$nominee['name']}</h5>
                      <p class='card-text'>{$nominee['dept']}</p>
                      <a href='#' class='btn btn-primary'>Go somewhere</a>
                  </div>
                </div>";
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
