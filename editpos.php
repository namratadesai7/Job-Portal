<?php
include('dbcon.php');
$sr=$_POST['id'];


$sql="SELECT * FROM Positions WHERE Sr= '$sr'";
$run=sqlsrv_query($conn,$sql);
$row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
?>
<div>

            <label style="width:100%;"  class="form-label mt-1" for="month">Month
                <input type="month" name="month" id="month" class="form-control" value="<?php echo $row['Month']->format('Y-m')  ?>">
            </label> 
            <label style="width:100%;"  class="form-label mt-1" for="postt">Post
            <input type="text" class="form-control" id="postt" name="postt" value="<?php echo $row['Post']  ?>"  Required   >
                <input type="hidden"  name="id" id="id" class="form-control " value="<?php echo $row['Sr']  ?>">
            </label>
            <label style="width:100%;" class="form-label mt-1" for="location">Location
                <select name="loc" id="loc" class="form-select">
                  
                    <option <?php if($row['Location']== "Halol"){ ?> selected  <?php  }  ?> value="Halol">Halol</option>
                    <option <?php if($row['Location']== "696"){ ?> selected  <?php  }  ?> value="696">696</option>
                    <option <?php if($row['Location']== "Baroda"){ ?> selected  <?php  }  ?> value="Baroda">Baroda</option>
                  
                </select>
            </label>
            <label style="width:100%;" class="form-label mt-1" for="dept">Department
                <select name="dept" id="dept" class="form-select">


                    <option <?php if($row['Department']== "Tender"){ ?> selected  <?php  }  ?> value="Tender">Tender</option>    
                    <option <?php if($row['Department']== "Marketing"){ ?> selected  <?php  }  ?> value="Marketing">Marketing</option>    
                    <option <?php if($row['Department']== "Accounts"){ ?> selected  <?php  }  ?> value="Accounts">Accounts</option>    
                    <option <?php if($row['Department']== "HR"){ ?> selected  <?php  }  ?> value="HR">HR</option>    
                    <option <?php if($row['Department']== "Lab"){ ?> selected  <?php  }  ?> value="Lab">Lab</option>    
                    <option <?php if($row['Department']== "IT"){ ?> selected  <?php  }  ?> value="IT">IT</option>    
                
                </select>
            </label>
           
          
                <label style="width:100%;" class="form-label mt-1" for="vac">Vacancy
                    <input class="form-control" type="number" name="vac" id="vac" placeholder="Enter no.of vacancy" value="<?php echo $row['No_of_Vacancy']  ?>">
                </label>
                <label style="width:100%;" class="form-label mt-1" for="cdate">Closing Date
                    <input class="form-control" type="date" name="cdate" id="cdate" value="<?php echo $row['Int_close_date']->format('Y-m-d')  ?>">
                </label>
                <label style="width:100%;" class="form-label mt-1" for="sdate">Shortlisting Date
                    <input class="form-control" type="date" name="sdate" id="sdate" value="<?php echo $row['Shortlistingdate']->format('Y-m-d')   ?>">
                </label>
                <label style="width:100%;" class="form-label mt-1" for="jd">Job Details
                    <!-- <input class="form-control" type="file" name="jd" id="jd" value="<?php echo $row['JD']  ?>"> -->

                    <input type="file" placeholder="Upload JD" name="jd" class="form-control" value="<?php echo $row['JD']  ?>"   >
                    <input type="hidden" name="jd" value="<?php echo $row['JD'] ?>">
                    <a href="jd-upload/<?php echo $row['JD'] ?>" target="_blank">View</a>
                  
                    <input type="hidden" name="jdname" value="<?php echo $row['JD'] ?>">
                </label>
           
           
                
</div>