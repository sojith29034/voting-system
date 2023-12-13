<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Candidate</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border: 2px solid black;
        }
        input,select,textarea{
            padding: 10px;
            margin: 10px;
            border: 1px solid black;
        }
        textarea{
            width: 100%;
            resize: none;
        }
        .image{
            display: none;
        }
        .btn{   
            margin-top: 30px;
            padding: 10px 20px;
            background: #1b1b1b;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
            border: none;
        }
        .btn:hover{
            background: #515151;
        }
    </style>
</head>
<body>
    <form action="newcand.php" method="post">
        <h1>Add New Candidate Details</h1>
        <div class="basic_info">
            <input type="text" name="name" id="name" placeholder="Enter Candidate's Name" autofocus required>
            <select id="dept" name="dept" required>
                <option value="default">Select Candidate's Department</option>
                <option value="Computer Department">Computer Department</option>
                <option value="IT Department">IT Department</option>
                <option value="Mechanical Department">Mechanical Department</option>
                <option value="Electrical Department">Electrical Department</option>
                <option value="EXTC Department">EXTC Department</option>
            </select>
            <select id="post" name="post" required>
                <option value="default">Select Candidate's Post</option>
                <option value="General Secretary">General Secretary</option>
                <option value="Joint Secretary">Joint Secretary</option>
                <option value="Sports Secretary">Sports Secretary</option>
                <option value="Cultural Secretary">Cultural Secretary</option>
            </select>
        </div>
        <textarea name="detail" id="detail" rows="10"  placeholder="Enter Candidate's Details..." required></textarea>
        <!-- <div class="image">
            <label for="img">Insert Candidate's Image(face visible)</label>
            <input type="file" name="img" id="img" required>
        </div> -->

        <button type="submit" class="btn">Add Candidate</button>
    </form>
</body>
</html>