<?php
    session_start();
    include("connect.php");
     $votes = $_POST['gvotes'];
     $total_votes = $votes+1;
     $gid = $_POST['gid'];
     $uid = $_SESSION['userdata']['id'];

     $update_votes = mysqli_query($connect,"UPDATE user SET votes = '$total_votes' WHERE id='$gid'");
     $update_status = mysqli_query($connect, "UPDATE user SET status= 1 WHERE id='$uid' ");
     if($update_status and $update_votes){
        $groups = mysqli_query($connect,"SELECT * FROM user WHERE role=2");
        $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
        $_SESSION['groupsdata'] = $groupsdata;
        $_SESSION['userdata']['status'] = 1;
        echo '
        <script>
        alert("Voting Successfull!");
        window.location = "dashboard.php";
        </script>';
     }
     else{
        echo '
        <script>
        alert("Some error occured....Try again!!");
        window.location = "dashboard.php";
        </script';
     }
     ?>