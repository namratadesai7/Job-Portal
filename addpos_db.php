<?php

include('dbcon.php');
session_start();
//add

if(isset($_POST['save'])){
    $month=$_POST['month'];
 
    $month=date('Y-m-d',strtotime($month));
    $postt=$_POST['postt'];
    $loc=$_POST['loc'];
    $dept=$_POST['dept'];
    $vac=$_POST['vac'];
    $cdate=$_POST['cdate'];
    $sdate=$_POST['sdate'];
   
    
    $jd = $_FILES['jd']['name'];
    $fileExt = substr($jd, strripos($jd, '.')); // get file extention
    // echo $fileExt;
    $filename = $dept . $fileExt;

    // if($fileExt != "pdf") {
    // echo "Sorry, only pdf files are allowed.";
    
    // }else{
        move_uploaded_file($_FILES["jd"]["tmp_name"], "jd-upload/".$filename);

    // }
    $sql=" INSERT INTO Positions (Month, Post,Location,Department,No_of_Vacancy,Int_close_date,Shortlistingdate,JD,CreatedBy) VALUES('$month', '$postt', '$loc', '$dept', '$vac','$cdate', '$sdate', '$filename', '".$_SESSION['uname']."' )";
    $run=sqlsrv_query($conn,$sql);


    if($run){
        ?>
        <script>
            // alert('saved successfully');
            window.open('position.php','_self');
        </script>
        <?php
    }else{
        print_r(sqlsrv_errors());
    }

}
//status
if(isset($_POST['status1'])){
    $status=$_POST['status'];
    $id=$_POST['id'];
    echo $id;

    $sql="UPDATE Positions SET Status='$status'  WHERE Sr='$id' ";
    $run=sqlsrv_query($conn,$sql);


    if($run){
        ?>
        <script>
            window.open('position.php','_self');
        </script>
    <?php
    }else{
      print_r(sqlsrv_errors());  
    }

}
//edit
if(isset($_POST['edit'])){
    $fileName=$_POST['jd'];
    $sr=$_POST['id'];
    $month=$_POST['month'];
    $month=date('Y-m-d',strtotime($month));
    $postt=$_POST['postt'];
    $loc=$_POST['loc'];
    $dept=$_POST['dept'];
    $vac=$_POST['vac'];
    $cdate=$_POST['cdate'];
    $sdate=$_POST['sdate'];

    if($_FILES['jd']['name'] != ''){
        $file = $_FILES['jd']['name'];//name is keyboard
        $fileExt = substr($file, strripos($file, '.')); // get file extention
        $filename = $dept . $fileExt;
        move_uploaded_file($_FILES["jd"]["tmp_name"], "jd-upload/".$filename);
    }else{
        $filename = $fileName;
    }
    $sql="UPDATE Positions SET Month='$month', Post='$postt',Location='$loc',Department='$dept',No_of_Vacancy='$vac',Int_close_date='$cdate',Shortlistingdate='$sdate',JD='$filename', UpdateAt='".date('Y-m-d')."', UpdatedBy='".$_SESSION['uname']."' WHERE Sr='$sr' ";
    $run=sqlsrv_query($conn,$sql);

    if($run){
        ?>
        <script>
            alert('updated Successfully');
            window.open('position.php','_self');
        </script>
        <?php
    }else{
        print_r(sqlsrv_errors());
    }
    }
//delete
if(isset($_GET['del'])){
    $sr=$_GET['del'];

    $sql="UPDATE Positions SET isdelete=0, UpdatedBy='".$_SESSION['uname']."', UpdateAt='".date('Y-m-d')."' WHERE Sr='$sr' ";
    $run=sqlsrv_query($conn,$sql);

    if($run){
        ?>
        <script>
            alert('Deleted Successfully');
            window.open('position.php','_self');
        </script>
        <?php
        }else{
            print_r(sqlsrv_errors());
        }
}

?>









