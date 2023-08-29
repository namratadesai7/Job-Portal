<?php
include('header.php');
include('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Positions</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>Positions</h3>
            </div>
            <div class="col-auto">
                <a href="addpos.php" class="btn btn-danger rounded-pill me-5">Add</a>
            </div>
        </div>    
        <div class="divcss">
            <table class="table table-bordered text-center mb-0 table-striped table-hover" id="tablepos">
                <thead>
                    <th>Sr</th>
                    <th>Month</th>
                    <th>Post</th>
                    <th>Location</th>
                    <th>Department</th>
                    <th>No. Of Vacancy</th>
                    <th>Interview Close Date</th>
                    <th>Shortlisting Date</th>
                    <th>View JD</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $Sr=1;
                    $sql="SELECT * FROM Positions WHERE isdelete= 1";
                    $run=sqlsrv_query($conn,$sql);
                    while( $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $Sr  ?></td>
                        <td><?php echo $row['Month']->format('M-y')   ?></td>
                        <td><?php echo $row['Post']   ?></td>
                        <td><?php echo $row['Location']   ?></td>
                        <td><?php echo $row['Department']   ?></td>
                        <td><?php echo $row['No_of_Vacancy']   ?></td>
                        <td><?php echo $row['Int_close_date']->format('d-m-y')   ?></td>
                        <td><?php echo $row['Shortlistingdate']->format('d-m-y')    ?></td>
                        <td><a href="jd-upload/<?php echo $row['JD'] ?>" target="_blank">View</a></td>
                        <td><?php echo $row['Status']    ?></td>
                        <td>
                      
                            <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 my-1 edit" id="<?php echo $row['Sr'] ?>" >Edit</button>
                            <button type="button" class=" btn btn-success btn-sm rounded-pill status" id="<?php echo $row['Sr'] ?>" >Status</button>
                            <button type="button" class="btn btn-danger btn-sm rounded-pill px-3 my-1 delete" id="<?php echo $row['Sr'] ?>" >Delete</button>
                        </td>
                    </tr>
                    <?php
                    $Sr++;    
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- edit model -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="addpos_db.php" method="post" id="editForm" autocomplete="off" enctype="multipart/form-data">

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit" form="editForm">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- status model -->
           <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="addpos_db.php" method="post" id="statusform">

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="status1" form="statusform">Save</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>

<script>
      $('#position').addClass('activeTab');

      $(document).on('click','.edit',function(){
        var id= $(this).attr('id');
        $.ajax({
            url:'editpos.php',
            type: 'post',
            data: {id:id},  
            // dataType: 'json',
            success:function(data){
              $('#editForm').html(data);  
              $('#editModal').modal('show');
            }
          });
        });
      
      $(document).on('click','.status',function(){
        var id= $(this).attr('id');
        console.log(id);
        $.ajax({
            url:'statuspos.php',
            type: 'post',
            data: {id:id},  
            
            success:function(data){
              $('#statusform').html(data);  
              $('#statusModal').modal('show');
            }
          });
        });


     $(document).on('click','.delete',function(){
        var del=$(this).attr('id');
        if(confirm('Are you Sure!')){
            window.open('addpos_db.php?del='+del,'_self');
        }else{
            return false;
        }
     });
</script>

<?php
include('footer.php');
?>