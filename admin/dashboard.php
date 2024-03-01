<?php
require '../common/connect.php';

if ($_SESSION['id'] == 'admin') {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
</head>
<body>

    <div class="container mt-1">
        <h1 class="section-title text-center">Admin Dashboard</h1>

        <div class="row justify-content-around">

        <?php
          function getTotalApplications($conn)
          {
              $sql = "SELECT COUNT(*) as total FROM candidates";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              return $row['total'];
          }

            function displayCard($title, $status, $color, $conn)
            {
              if ($status === 'Total') {
                  $applications = getTotalApplications($conn);
              } else {
                  $sql = "SELECT * FROM candidates WHERE status='$status'";
                  $result = mysqli_query($conn, $sql);
                  $applications = mysqli_num_rows($result);
              }

              echo "<div class='card text-bg-$color col-sm-5 col-md col-10 m-1'>
                      <div class='card-body'>
                          <h3 class='card-text'>$title</h3>
                          <h1 class='card-title text-end'>$applications</h1>
                      </div>
                  </div>";
            }

          // Display cards for different application statuses
          displayCard('<i class="fas fa-check"></i> Accepted Applications', 'Accepted', 'success', $conn);
          displayCard('<i class="fas fa-envelope-open-text"></i> Total Applications', 'Total', 'primary', $conn);
          displayCard('<i class="far fa-clock"></i> Pending Applications', 'Pending', 'warning', $conn);
          displayCard('<i class="fas fa-times"></i> Rejected Applications', 'Rejected', 'danger', $conn);
        ?>

        <h3 class="section-title mt-5">Pending Nominee Applications</h3>

        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body overflow-x-auto">
                            <table class="table table-striped table-responsive">
                                <thead class="my-2">
                                    <tr class="text-center">
                                        <th>Sr. No.</th>
                                        <th>Name of Nominee</th>
                                        <th>Department of Nominee</th>
                                        <th>Nominee Post</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM candidates WHERE status='Pending'";
                                    $query_run = mysqli_query($conn, $query);

                                    $i = 1;
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $nominee) {
                                    ?>

                                    <tr class="text-center">
                                        <td><?=$i?></td>
                                        <td><?=$nominee['name']?></td>
                                        <td><?=$nominee['dept']?></td>
                                        <td><?=$nominee['post']?></td>
                                        <td>
                                            <a href="./viewApplicant.php?name=<?=$nominee['name']?>" class="btn btn-primary"><i class="far fa-eye"> </i> View</a>
                                        </td>
                                    </tr>
                                    <?php
                                            $i++;
                                        }
                                    } else {
                                        echo "<div class='alert alert-warning' role='alert'>
                                            No Applications Submitted.
                                            </div>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </div>
  </body>
</html>

<?php
} else {
    header("Location:../login.php");
    exit();
}
?>