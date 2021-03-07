<?php
   $conn = mysqli_connect("localhost", "root", "" , "spwebsite") or die("connection faild");

      $name = mysqli_real_escape_string($conn, $_POST['username']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
      $comment = mysqli_real_escape_string($conn, $_POST['comment']);

      $q =  "INSERT INTO web_user (username , email, mobile, comment) VALUE(?,?,?,?);";

      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$q)){
         header("location: index.php?stmtfaild");
         exit();
      }
      mysqli_stmt_bind_param($stmt, "ssss", $name,$email,$mobile,$comment);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      ?>
      <script type="text/javascript">
         window.location="index.php";
         alert("congratulation:) your comment has been sent.");
      </script>

      <?php

?>