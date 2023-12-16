<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nominee Form</title>
</head>
<body>
    <form action="../admin/newcand.php" method="post">
        <h1 class="title">Nominee Details</h1>
        <hr>
        <h3 class="section-titles">Basic Details for Election: </h3>
        <div class="info">
            <div>
                <!-- <h3 class="section-titles">Basic Details for Election: </h3><br> -->
                <input type="text" name="name" id="name" placeholder="Enter Nominee's Name" autofocus required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select id="dept" name="dept" required>
                    <option value="default">Select Nominee's Department</option>
                    <option value="Computer Department">Computer Department</option>
                    <option value="IT Department">IT Department</option>
                    <option value="Mechanical Department">Mechanical Department</option>
                    <option value="Electrical Department">Electrical Department</option>
                    <option value="EXTC Department">EXTC Department</option>
                </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="file" name="pfp" id="pfp" required>
                    <label for="pfp"><star>*</star>Insert Image(face visible)</label>
            </div>
            <br>
            <div>
                <select id="post" name="post" required>
                    <option value="default">Select Position</option>
                    <option value="General Secretary">General Secretary</option>
                    <option value="Joint Secretary">Joint Secretary</option>
                    <option value="Sports Secretary">Sports Secretary</option>
                    <option value="Cultural Secretary">Cultural Secretary</option>
                </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <textarea name="nomiReason" id="nomiReason" cols="90" rows="1" placeholder="Explain why you deserve the selected position. . ." required></textarea>
            </div>
        </div>
        <hr>
        <h3 class="section-titles">Education Details: </h3>
        <div class="info">
            <!-- <h3 class="section-titles">Education Details: </h3> -->
            <div>
                <label for="cgpa">Average CGPA:<star>*</star></label>
                    <input type="text" name="cgpa" id="cgpa" placeholder="Enter CGPA" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <label for="exp">Experience: </label>
                    <textarea name="exp" id="exp" cols="60" rows="1" class="basic-text" placeholder="Clubs, Activities, etc."></textarea> -->
            </div>
        </div>
        <hr>
        <h3 class="section-titles">Achievements <span style="font-weight:lighter;">(Co-Curricular & Extracurricular)</span>: </h3>
        <div class="info">
            <div>
                <textarea name="achieve" id="achieve" rows="3" cols="60"  placeholder="Achievements in the Co-Curricular & Extracurricular domain" required></textarea>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="file" name="achC" id="achC" required>
                    <label for="achC"><star>*</star>Add Media (like Certificates)</label>
            </div>
        </div>
        <hr>
        <h3 class="section-titles">Activity: </h3>
        <div class="info">
            <div>
                <textarea name="skill" id="skill" rows="3" cols="60"  placeholder="Expertise and Experience" required></textarea>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <textarea name="club" id="club" rows="3" cols="60"  placeholder="Club Participation" required></textarea>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="file" name="extra" id="extra">
                    <label for="extra">Add Media (if any)</label>
            </div>
        </div>

        <hr>
        <h3 class="section-titles">More information: </h3>
        <textarea name="detail" id="detail" rows="5"  placeholder="Additional Nominee Details"></textarea>

        <div class="submit">
            <button type="submit" class="btn">Submit Application</button>
        </div>
    </form>
</body>


<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        padding: 20px;
    }
    form{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    h1{
        text-align: center;
    }
    h3.section-titles{
        font-style: italic;
    }
    hr{
        margin: 20px 0;
        width: 100%;
    }
    star{
        color: red;
    }
    .info>div{
        display: flex;
        align-items: baseline;
    }
    .info{
        display: flex;
        align-items: flex-start;
        flex-direction: column;
        /* justify-content: center; */
    }
    input,select{
        width: 200px;
        padding: 10px;
        margin: 10px;
        border: 1px solid black;
        outline: none;
        border-radius: 5px;
    }
    textarea{
        padding: 10px;
        margin: 10px;
        border: 1px solid black;
        outline: none;
        border-radius: 5px;
        resize: none;
    }
    .submit{
        text-align: center;
    }
    .btn{
        margin: 30px auto;
        padding: 10px 20px;
        background: #1b1b1b;
        color: #fff;
        cursor: pointer;
        border-radius: 10px;
        border: 2px solid black;
        transition: .5s;
    }
    .btn:hover{
        background: transparent;
    }
</style>
</html>