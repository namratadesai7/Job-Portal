<?php
include('dbcon.php');
include('header.php');
$sql="SELECT DISTINCT Post as Post FROM Positions ";
$run=sqlsrv_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cv</title>
</head>
<body>
    <div class="container-fluid">
        <div class="divcss">
            <form action="addcv_db.php"  method="post"  enctype="multipart/form-data">
                <div>
                    <label class="form-label" for="month">Month
                        <input class="form-control " type="month" id="month" name="month" >
                    </label>
                    <label class="form-label" for="postfil">Post
                        <!-- <input class="form-control" type="text" placeholder="Enter Post" id="post" name="post"> -->
                        <select class="form-select" id="postfil" name="post" >
                            <option value=""></option>
                            <?php
                    
                            while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)) { ?>
                             
                            <option value="<?php echo $row['Post']  ?>"><?php echo $row['Post']  ?></option>
                     
                            <?php } ?>
                        </select>
                    </label>
                    <label class="form-label" for="name">Name
                        <input class="form-control" type="text" placeholder="Enter Name" id="name" name="name">
                    </label>
                    <label class="form-label" for="gender">Gender
                        
                        <select style="width:210px;" class="form-select" name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                           
                        </select>
                    </label>
                    
                    <label class="form-label" for="num">Mobile Number
                        <input class="form-control" type="number" placeholder="Enter number" id="num" name="num">
                    </label>
                </div>
                <div class="mt-4">    
                    <label class="form-label" for="loc">Location
                        <select style="width:210px;" class="form-select" name="loc" id="loc">
                            <option value="Baroda">Baroda</option>
                            <option value="Halol">Halol</option>
                            <option value="696">696</option>
                        </select>
                    </label>
                    <label class="form-label" for="intsta">Interview Status
                        <select style="width:210px;" class="form-select" name="intsta" id="intsta">
                            <option value="done">Done</option>
                            <option value="pending">Pending</option>
                        </select>
                    </label>
                    <label class="form-label" for="intdate">Interview Date
                        <input style="width:210px;" class="form-control" type="date" id="intdate" name="intdate">
                    </label>
                    <label class="form-label" for="status">Status
                        <select style="width:210px;" class="form-select" name="status" id="status">
                                <option value=""></option>
                                <option value="confirm">Confirm</option>
                                <option value="shortlisted">Shortlisted</option>
                                <option value="pending">Pending</option>
                                <option value="rejected">Rejected</option>
                        </select>
                    </label>
                    <label style="width:20%;" class="form-label" for="cv">CV
                        <input class="form-control" type="file" name="cv" id="cv">
                    </label>

                </div>
                <div class="mt-3">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success rounded-pill" name="save">Submit</button>
                            <a href="cv.php" class="btn btn-danger rounded-pill ms-1">Back</a>
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