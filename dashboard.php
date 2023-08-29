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
    <title>Dashboard</title>
</head>
<body>
<div class="container-fluid">
 
        <div class="row">
            <div class="col">
                <?php
                $sql6="SELECT SUM(No_of_Vacancy) as sum FROM Positions";
                $run6=sqlsrv_query($conn,$sql6);
                $row6=sqlsrv_fetch_array($run6,SQLSRV_FETCH_ASSOC);

                ?>
            <table class="table table-secondary table-bordered mb-14 text-center table-striped table-hover  w-25">
                <thead> 
                    <th class="w-75">No.of positions open</th>
                    <th class="w-25"><?php echo $row6['sum']  ?></th>

                </thead>
            
            </table>
        </div>
    

    <div class="divcss ">
    <table class="table table-bordered text-center mb-0  table-striped table-hover" id="tabledas">
    <thead>
            <th>Post</th>
            <th>No Of Application</th>
            <th>Interview Done</th>
            <th>Interview Pending</th>
            <th>Shortlisted</th>
            <th>Confirmed</th>
           
    </thead>
    <tr>
    <?php while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){

    ?>
        <td><?php echo $row['Post']   ?></td>

        <?php
    $sql5="SELECT count(Sr) as cn FROM CV WHERE Post='".$row['Post']."' ";
    $run5=sqlsrv_query($conn,$sql5);
    $row5=sqlsrv_fetch_array($run5,SQLSRV_FETCH_ASSOC);
?>
    <td><?php echo $row5['cn']  ?></td>

        <?php
        $sql1="SELECT count(Sr) as cn FROM CV WHERE Interview_status= 'done' AND Post='".$row['Post']."' ";
        $run1=sqlsrv_query($conn,$sql1);
        $row1=sqlsrv_fetch_array($run1,SQLSRV_FETCH_ASSOC);
?>

        <td> <?php echo $row1['cn']  ?></td>
     
        <?php
        $sql2="SELECT count(Sr) as cn FROM CV WHERE Interview_status= 'pending' AND Post='".$row['Post']."' ";
        $run2=sqlsrv_query($conn,$sql2);
        $row2=sqlsrv_fetch_array($run2,SQLSRV_FETCH_ASSOC);
?>
        <td><?php echo $row2['cn']  ?></td>
        <?php
        $sql3="SELECT count(Sr) as cn FROM CV WHERE Status= 'shortlisted' AND Post='".$row['Post']."' ";
        $run3=sqlsrv_query($conn,$sql3);
        $row3=sqlsrv_fetch_array($run3,SQLSRV_FETCH_ASSOC);
?>
        <td><?php echo $row3['cn']  ?></td>
        <?php
        $sql4="SELECT count(Sr) as cn FROM CV WHERE Status= 'confirm' AND Post='".$row['Post']."' ";
        $run4=sqlsrv_query($conn,$sql4);
        $row4=sqlsrv_fetch_array($run4,SQLSRV_FETCH_ASSOC);
?>
        <td><?php echo $row4['cn']  ?></td>
       
    </tr>

    <?php
    }
    ?>
    <!-- <tr>
        <td>Marketing Executive</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Accounts Executive</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>HR Executive</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Lab Assistant</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Tele Caller (Female)</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>PHP Developer</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr> -->

    </table>
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