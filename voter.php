<?php
include("./connect.php");
include("navbar.php");
?>
<head><link rel="stylesheet" href="voter.css"></head>


    <table class="table">
        <thead>
            <tr>
                <!-- <th>Sr. No.</th> -->
                <th>Nominee Name</th>
                <th>Position</th>
                <th>Department</th>
                <th>Details of the Nominee</th>
                <th>Choice</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $query = "SELECT * FROM candidates";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run)>0){

            foreach($query_run as $row)
            {
                ?>
                <tr>
                    <td class="name"><?=$row['name']?></td>
                    <td class="post"><?=$row['post']?></td>
                    <td class="dept"><?=$row['dept']?></td>
                    <td class="detail"><?=$row['detail']?></td>
                    <td class="choice">
                        <input style="" type="radio" name="<?php echo $row['post']?>" id="<?php echo $row['name']?>">
                        <button><label for="<?php echo $row['name']?>">Vote</label></button>
                    </td>
                </tr>
                <?php
            }
        }
        else{
           ?>
            <tr>
                <td colspan="5">No candidates added yet. Kindly wait for further notice.</td>
            </tr>
           <?php
        }
        ?>
        </tbody>
    </table>







    <style>
        .choice input[type="radio"]{
            display: none;
        }
        .choice button{
            padding: 5px 10px;
            background: red;
            color: #fff;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .choice input[type="radio"]:checked ~ button{
            background: green;
        }
        a.adminHome{
            display: none;
        }
    </style>