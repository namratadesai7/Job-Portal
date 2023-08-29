<?php
include('dbcon.php');



?>
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
                    <th>Save</th>
                </thead>
                <tbody>
                    <?php
                    $sr=1;
                    if(isset($_POST['post']) != "")
                    {
                        $post= $_POST['post'];
                        $sql = "SELECT * FROM CV WHERE  Post = '".$post."'";
                    }
                    if(isset($_POST['status']) != "")
                    {
                        $status = $_POST['status'];
                        
                        $sql = "SELECT * FROM CV WHERE Status = '".$status."'";
                    }
                    if(isset($_POST['dfromfil']) != "" and isset($_POST['dtofil']) != "" )
                    {
                        $dfrom = $_POST['dfromfil'];
                        $dto = $_POST['dtofil'];
                       
                        
                        $sql ="SELECT * FROM CV WHERE Interview_date BETWEEN '$dfrom' AND '$dto' ";
                    }
                    
                    $run=sqlsrv_query($conn,$sql);
                    while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC))
                    {
                    ?>
                    <tr>
                        <td><?php echo $sr  ?></td>
                        <td><?php echo $row['Month']->format('M-y')     ?></td>
                        <td><?php echo $row['Post']    ?></td>
                        <td><?php echo $row['Name']    ?></td>
                        <td><?php echo $row['Gender']    ?></td>
                        <td><?php echo $row['Mobile']    ?></td>
                        <td><?php echo $row['Location']    ?></td>
                        <td><select  class="form-select intsta" name="intsta">
                            <option <?php if($row['Interview_status']== "done"){ ?> selected  <?php  }  ?> value="done">Done</option>
                            <option <?php if($row['Interview_status']== "pending"){ ?> selected  <?php  }  ?> value="pending">Pending</option>
                        </select>
                        
                        </td>
                        <td> <?php echo $row['Interview_date']->format('d-m-y')    ?></td>

                        <td><select style="width:210px;" class="form-select status" name="status" id="status">
                                <option <?php if($row['Status']== "confirm"){ ?> selected  <?php  }  ?> value="confirm">Confirm</option>
                                <option <?php if($row['Status']== "shortlisted"){ ?> selected  <?php  }  ?> value="shortlisted">Shortlisted</option>
                                <option <?php if($row['Status']== "pending"){ ?> selected  <?php  }  ?> value="pending">Pending</option>
                                <option  <?php if($row['Status']== "rejected"){ ?> selected  <?php  }  ?> value="rejected">Rejected</option>
                        </select></td>

                        <td><?php echo $row['CV']    ?></td>
                        <td><button type="button" class="btn btn-sm btn-success rounded-pill submit" id="<?php echo $row['Sr'] ?>"> Save</button></td>
                    </tr>
                    <?php
                    $sr++;  }
                    ?>
                </tbody>
            </table>
<?php

?>

