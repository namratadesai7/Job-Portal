<?php
include('dbcon.php');
include('header.php');
// $sql="SELECT * FROM CV  ";
$sql="SELECT DISTINCT Post as Post FROM CV ";
$run=sqlsrv_query($conn,$sql);
// $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
<style>
    .intsta{
        border:none;
        
    }
    .status{
        border:none;
    }
    .dd{
    border: none; /* Remove the border */
    outline: none; /* Remove the outline when focused */
    appearance: none; /* Remove platform-specific styling (like the arrow in some browsers) */
    background-color: transparent; 
    /* Optionally make the background transparent */
}
</style>


</head>
<body>
    <div class="class-container">

        <div class="row">
            <div class="col"><h3>CV's</h3></div>
            <div class="col-auto">
                <a href="addcv.php" class="btn btn-danger rounded-pill me-5">Add</a>
            </div>
        </div>

        <div class=" row mt-4">
     
            <div class="col">
               
                    <label for="postfil" class="form-label">Post
                        <select name="postfil"  class="form-select" id="postfil" >
                            <option value=""></option>
                            <?php
                    
                            while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)) { ?>
                             
                            <option value="<?php echo $row['Post']  ?>"><?php echo $row['Post']  ?></option>
                     
                            <?php } ?>
                        </select>
                    </label>
                    <button type="button" class="btn btn-primary btn-sm ms-3 report" id="report1" name="report1">Search</button>
                
            </div>

            <div class="col">
                <form action="reportcv.php" method="post" id="formdata"> 
                    <label for="statusfil" class="form-label">Status
                        <select name="statusfil" class="form-select statusfil" id="statusfil">
                            <option value=""></option>
                            <option value="pending">Pending</option>
                            <option value="shortlisted">Shortlisted</option>
                            <option value="confirm">Confirm</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </label>
                    <button type="button" class="btn btn-primary btn-sm ms-3 report" id="report2" name="report2">Search</button>
                </form>
            </div>
        
            <div class="col">
                <form action="reportcv.php" method="post" id="formdata"> 
                    <label for="dfromfil" class="form-label">Date From
                        <input class="form-control" type="date" name="dfromfil" id="dfromfil">
                       
                    </label>
                    <label  for="dtofil" class="form-label">Date To
                        <input class="form-control" type="date" id="dtofil" name="dtofil">
                       
                    </label>
                    <button type="button" class="btn btn-primary  btn-sm ms-3 report" id="report3" name="report3">Search</button>
                </form> 
            </div>  
    <!-- </form>    -->
    </div>
   
         
        <div class="divcss" id="showData">
            <table class="table table-hover table-bordered text-center  mb-0" id="tablecv">
                <thead>
                    <th>Sr</th>
                    <th>Month</th>
                    <th>Post</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Location</th>
                    <th>Interview Status</th>
                    <th>Interview Date</th>
                    <th>Status</th>
                    <th>CV</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $sr=1;
                    $sql="SELECT * FROM CV WHERE isdelete=1 ";
                    $run=sqlsrv_query($conn,$sql);
                    while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $sr  ?></td>
                        <td><?php echo $row['Month']->format('M-y') ?></td>
                        <td><?php echo $row['Post']    ?></td>
                        <td><?php echo $row['Name']    ?></td>
                        <td><?php echo $row['Gender']    ?></td>
                        <td><?php echo $row['Mobile']    ?></td>
                        <td><?php echo $row['Location']    ?></td>
                        <td><select  class="form-select intsta" name="intsta" >
                            <option <?php if($row['Interview_status']== "done"){ ?> selected  <?php  }  ?> value="done">Done</option>
                            <option <?php if($row['Interview_status']== "pending"){ ?> selected  <?php  }  ?> value="pending">Pending</option>
                        </select>
                        
                        </td>
                        <td > 
                        <?php 
                        $interviewDate = $row['Interview_date']->format('Y-m-d'); ?>
                            <input type="date" name="date" class="dd" value="<?php echo $interviewDate?>"></td>

                        <td>
                            <select style="width:210px;" class="form-select status" name="status" >
                                <option <?php if($row['Status']== "confirm"){ ?> selected  <?php  }  ?> value="confirm">Confirm</option>
                                <option <?php if($row['Status']== "shortlisted"){ ?> selected  <?php  }  ?> value="shortlisted">Shortlisted</option>
                                <option <?php if($row['Status']== "pending"){ ?> selected  <?php  }  ?> value="pending">Pending</option>
                                <option <?php if($row['Status']== "rejected"){ ?> selected  <?php  }  ?> value="rejected">Rejected</option>
                            </select>   
                        </td>

                        <td> <a href="cv-upload/<?php echo $row['CV'] ?>" target="_blank">View</a></td>
                        <td><button type="button" class="btn btn-sm btn-success rounded-pill submit" id="<?php echo $row['Sr'] ?>"> Save</button>
                        <button type="button" class="btn btn-sm btn-danger rounded-pill delete" id="<?php echo $row['Sr'] ?>"> Delete</button>
                    
                    </td>
                    </tr>
                    <?php
                    $sr++;  }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<script>
    $('#cv').addClass('activeTab');

        $(document).on("click",".submit",function(){
            
            var sta = $(this).closest('tr').find('.intsta').val();
            var status= $(this).closest('tr').find('.status').val();
            var date=$(this).closest('tr').find('.date').val();
        $.ajax({
            url:'addcv_db.php',
            type:'post',
            data:{sta:sta,id:id,status:status,date:date},
            success:function(data){
                 $('#intsta').val(data);
                 $('#status').val(data);
                 alert("Updated Successfully");
                 
            },
            error:function(res){
                console.log(res);
            }
        });
      });

    $(document).on('click','#report1', function()
    {
        var post= $('#postfil').val();
        $.ajax(
        {                                   
            url:'reportcv.php',
            type:'post',
            data:{post:post},       
                                                
            success:function(response)
            {                                         
                $('#showData').html(response);         
            }
        })
    });
       
    $(document).on('click','#report2', function()
    {
        var status= $('#statusfil').val();
        $.ajax(
        {                                   
            url:'reportcv.php',
            type:'post',
            data:{status:status},       
                                                
            success:function(response)
            {            
                                                
                $('#showData').html(response);         
            }
        })
    });

    $(document).on('click','#report3', function()
    {
        var dfromfil= $('#dfromfil').val();
        var dtofil= $('#dtofil').val();
        console.log(dfromfil);
        console.log(dtofil);
        $.ajax(
        {                                   
            url:'reportcv.php',
            type:'post',
            data:{dfromfil:dfromfil,dtofil:dtofil},       
                                                
            success:function(response)
            {            
                                                
                $('#showData').html(response);         
            }
        })
    });


    //delete
    $(document).on('click','.delete', function(){

        var del= $(this).attr('id');
        if(confirm('Are you sure!')){
            window.open('addcv_db.php?del='+del,'_self');
        }else{
            return false;
        }
    });
</script>
<?php
include('footer.php');
?>