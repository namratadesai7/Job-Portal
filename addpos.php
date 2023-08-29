<?php
include('dbcon.php');
include('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Positions</title>
</head>
<body>
    <div class="container-fluid mt-2 p-0">
        <div class="divcss">
             <form action="addpos_db.php" method="post"  enctype="multipart/form-data">
                <div>
                    <label style="width:20%;"  class="form-label" for="month">Month
                        <input type="month" name="month" id="month" class="form-control" Required>
                    </label>
                    <label style="width:20%;"  class="form-label" for="postt">Post
                 
                        <input type="text" class="form-control" id="postt" name="postt" Required>
                    </label>
                    <label style="width:20%;" class="form-label" for="location">Location
                        <select name="loc" id="loc" class="form-select" Required>
                            <option value=""></option>
                            <option value="Baroda">Baroda</option>
                            <option value="Halol">Halol</option>
                            <option value="696">696</option>
                        </select>
                    </label>
                    <label style="width:20%;" class="form-label" for="dept">Department
                    <select name="dept" id="dept" class="form-select" Required>
                            <option value=""></option>
                            <option value="Tender">Tender</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Accounts">Accounts</option>
                            <option value="HR">HR</option>
                            <option value="Lab">Lab</option>
                            <option value="IT">IT</option>
                        </select>
                    </label>
                </div>
                <div class="mt-4">
                    <label style="width:20%;" class="form-label" for="vac">Vacancy
                        <input class="form-control" type="number" name="vac" id="vac" placeholder="Enter no.of vacancy" Required>
                    </label>
                    <label style="width:20%;" class="form-label" for="cdate">Closing Date
                        <input class="form-control" type="date" name="cdate" id="cdate" Required>
                    </label>
                    <label style="width:20%;" class="form-label" for="sdate">Shortlisting Date
                        <input class="form-control" type="date" name="sdate" id="sdate" Required>
                    </label>
                    <label style="width:20%;" class="form-label" for="jd">Job Details
                        <input class="form-control" type="file" name="jd" id="jd" Required>
                    </label>
                </div>
                <div class="mt-3">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success rounded-pill" name="save">Submit</button>
                            <a href="position.php" class="btn btn-danger rounded-pill ms-1">Back</a>
                        </div>
                    </div>
                </div>
             </form>

        </div>
    </div>
</body>
</html>
<script>
     $('#cv').addClass('activeTab');
</script>


<?php
include('footer.php');
?>










