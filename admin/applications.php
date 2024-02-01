<?php
require '../common/connect.php';

if ($_SESSION['id'] == 'admin') {
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nominee Applications</title>

    <link rel="stylesheet" href="../common/style.css">
</head>

<body>

    <h1 class="section-title text-center mt-1">Nominee Applications</h1>

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
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM candidates";
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
                                    <td
                                        <?php if ($nominee['status'] == 'accepted' || $nominee['status'] == 'Accepted'): ?>
                                            class="text-success"
                                        <?php elseif ($nominee['status'] == 'rejected' || $nominee['status'] == 'Rejected'): ?>
                                            class="text-danger"
                                        <?php elseif ($nominee['status'] == 'pending' || $nominee['status'] == 'Pending'): ?>
                                            class="text-warning"
                                        <?php endif; ?>
                                    >
                                        <?=$nominee['status']?>
                                    </td>
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
</body>

</html>
<?php
} else {
    header("Location:../login.php");
    exit();
}
?>