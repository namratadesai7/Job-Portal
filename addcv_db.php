<?php
include('dbcon.php');
session_start();

if(isset($_POST['save'])){
    
    $month=$_POST['month'];
    $month=date('Y-m-d',strtotime($month));
    $post=$_POST['post'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $num=$_POST['num'];

    $loc=$_POST['loc'];
    $intsta=$_POST['intsta'];
    $intdate=$_POST['intdate'];
    $status=$_POST['status'];
    
    $cv = $_FILES['cv']['name'];
    $fileExt = substr($cv, strripos($cv, '.')); // get file extention
    
    $filename = $name . $fileExt;
   

    
    move_uploaded_file($_FILES["cv"]["tmp_name"], "cv-upload/".$filename);

    $intdate=$_POST['intdate'];
    $sql="INSERT INTO CV (Month,Post,Name,Gender,Mobile,Location,Interview_status,Interview_date,Status,CV,createdBy) VALUES('$month','$post','$name','$gender','$num','$loc','$intsta','$intdate','$status','$filename','".$_SESSION['uname']."') ";
    $run=sqlsrv_query($conn,$sql);
    
    if($run){
        ?>
        <script>
         alert('saved successfully');
            window.open('cv.php','_self');
        </script>
        <?php
    }else{
        print_r(sqlsrv_errors());
    }
}


//for changing status
if(isset($_POST['sta'])){
    $sta=$_POST['sta'];
    $status=$_POST['status'];
    $sr=$_POST['id'];
    
    $sql="UPDATE CV SET Interview_status='$sta',Status='$status' WHERE Sr='$sr' ";
    $run=sqlsrv_query($conn,$sql);
    }

//del
if(isset($_GET['del'])){
    $sr=$_GET['del'];

    $sql="UPDATE CV SET isdelete= 0, updatedAt='".date('Y-m-d')."', updatedBy='".$_SESSION['uname']."' WHERE Sr='$sr' ";
    $run=sqlsrv_query($conn,$sql);

    if($run){
        ?>
    <script>
        window.open('cv.php','_self');
    </script>
<?php
    }else{
        print_r(sqlsrv_errors());
    }

}



?>



