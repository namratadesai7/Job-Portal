<?php
include('dbcon.php');
include('header.php');  


// $sql= "SELECT count(Sr) as assicount FROM Task WHERE CreatedBy='".$_SESSION['uname']."' AND isdelete=0 ";
// $run=sqlsrv_query($conn,$sql);
// $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);

// $sql1= "SELECT count(Sr) as reccount FROM Task WHERE user_id='".$_SESSION['empid']."' AND isdelete= 0 ";
// $run1=sqlsrv_query($conn,$sql1);
// $row1=sqlsrv_fetch_array($run1,SQLSRV_FETCH_ASSOC);

// $sql2= "SELECT count(Sr) as comcount FROM Task WHERE user_id='".$_SESSION['empid']."' AND isdelete= 0  AND Cdate is not null ";
// $run2=sqlsrv_query($conn,$sql2);
// $row2=sqlsrv_fetch_array($run2,SQLSRV_FETCH_ASSOC);

// $sql3= "SELECT count(Sr) as pencount FROM Task WHERE user_id='".$_SESSION['empid']."' AND isdelete= 0  AND Cdate is null ";
// $run3=sqlsrv_query($conn,$sql3);
// $row3=sqlsrv_fetch_array($run3,SQLSRV_FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<div class="container-fluid">
    <div class="cardbox">

        <div class="cardDiv">
            <div>
                <div class="numbers">rtt</div>
                <div class="cardname">Assigned Tasks</div>
            </div>
            <div class="iconbox">
            <i class="fa-solid fa-eye"></i> 
            </div>
        </div>
        
        <div class="cardDiv">
            <div>
                <div class="numbers">rtrt</div>
                <div class="cardname">Received Tasks</div>
            </div>
            <div class="iconbox">
            <i class="fa-solid fa-clipboard-list"></i>
            </div>
            
        </div>
        <div class="cardDiv">
            <div>
                <div class="numbers">rtrtrt</div>
                <div class="cardname">Completed Tasks</div>
            </div>
            <div class="iconbox">
            <i class="fa-solid fa-check"></i>
            </div>
            
        </div>
        <div class="cardDiv">
            <div>
                <div class="numbers">rtrtrt</div>
                <div class="cardname">Pending Tasks</div>
            </div>
            <div class="iconbox">
            <i class="fa-regular fa-hourglass"></i>
            </div>
            
        </div>
    <!-- data-list -->
    <!-- <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Recent Orders</h2>
                <a href="btn">View All</a>
            </div>
            <table>
                <thead>
                    <tr>
                       <td>Name</td>
                       <td>Price</td>
                       <td>Payment</td>
                       <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Star Refrigator</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="Status delivred">deliverd</span></td>
                    </tr>
                    <tr>
                        <td>Star Refrigator</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="Status delivred">deliverd</span></td>
                    </tr>
                    <tr>
                        <td>Star Refrigator</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="Status delivred">deliverd</span></td>
                    </tr>
                    <tr>
                        <td>Star Refrigator</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="Status delivred">deliverd</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> -->


    </div>
</div>
</body>
</html>

<script>
     $('#dashboard').addClass('activeTab');
</script>
<?php

include('footer.php');
?>