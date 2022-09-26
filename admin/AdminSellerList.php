<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<title>Arkimorma | Admin-Seller List</title>
<?php session_start(); ?>

  <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/admin-style.css">

  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
   <link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48Zz48cGF0aCBkPSJNMTM0LjkzOTM4LDE1OC41NjI1aDE5LjM3Njg3YzAuOTIwOTIsLTAuMDAyNiAxLjc3NjM4LC0wLjQ3NjU3IDIuMjY2OTIsLTEuMjU1OThjMC40OTA1NCwtMC43Nzk0MSAwLjU0NzgzLC0xLjc1NTcxIDAuMTUxODMsLTIuNTg3MTVsLTY1Ljg3MDYyLC0xMzkuMDc4MTJjLTAuODkyMiwtMS44Njk1OCAtMi43NzkzOCwtMy4wNjAwNCAtNC44NTA5NCwtMy4wNjAwNGMtMi4wNzE1NiwwIC0zLjk1ODc0LDEuMTkwNDYgLTQuODUwOTQsMy4wNjAwNGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuMzk2LDAuODMxNDQgLTAuMzM4NzEsMS44MDc3NCAwLjE1MTgzLDIuNTg3MTVjMC40OTA1NCwwLjc3OTQxIDEuMzQ2LDEuMjUzMzcgMi4yNjY5MiwxLjI1NTk4aDguNjI2ODdjMi4wNzcyNSwwLjAwNDUxIDMuOTcxMTYsLTEuMTg4MzQgNC44NjQzOCwtMy4wNjM3NWwxMy4wODgxMiwtMjcuNjI3NWMwLjQ0NDUyLC0wLjkzMzMzIDEuMzg0OTgsLTEuNTI4OTUgMi40MTg3NSwtMS41MzE4N2g2Ny44ODYyNWMxLjAzMzc3LDAuMDAyOTMgMS45NzQyMywwLjU5ODU1IDIuNDE4NzUsMS41MzE4N2wxMy4wODgxMiwyNy42Mjc1YzAuODkzMjIsMS44NzU0MSAyLjc4NzEyLDMuMDY4MjYgNC44NjQzOCwzLjA2Mzc1ek01Mi42MjEyNSwxMTAuMTg3NWwyOC4wMDM3NSwtNTkuMTI1bDI4LjAwMzc1LDU5LjEyNXoiIGZpbGw9IiM4NWNiZjgiPjwvcGF0aD48cGF0aCBkPSJNODIuMDIyNSw0M2wtMi42ODc1LDUuODA1bDI5LjI5Mzc1LDY0LjA3aDAuMzQ5MzdjMy43MTk5NiwtMC4wMDE5NyA3LjE3NDUzLC0xLjkyNzAyIDkuMTMzMywtNS4wODk1MWMxLjk1ODc3LC0zLjE2MjQ5IDIuMTQzMzQsLTcuMTEyOSAwLjQ4Nzk1LC0xMC40NDQyNGwtMjYuOTAxODgsLTU0LjM0MTI1Yy0wLjg5ODA5LC0xLjg1NDMyIC0yLjc3NzE0LC0zLjAzMjA5IC00LjgzNzUsLTMuMDMyMDljLTIuMDYwMzYsMCAtMy45Mzk0MSwxLjE3Nzc3IC00LjgzNzUsMy4wMzIwOXpNMTQ1LjEyNSwxNTUuNDk4NzVsLTEzLjIyMjUsLTI1Ljk4ODEyYy0xLjgzNzc3LC0zLjYyMTg0IC01LjU1OTg1LC01Ljg5ODc2IC05LjYyMTI1LC01Ljg4NTYzaC0xMC4xMDVjMS4wNDgxMiwwIDQuMzUzNzUsMy4yNzg3NSA0LjgxMDYyLDQuMjE5MzdsMTMuMDg4MTIsMjcuNjI3NWMwLjg4NTQ1LDEuODg1ODkgMi43ODA5NywzLjA5MDIyIDQuODY0MzgsMy4wOTA2MmgxNC45OTYyNWMtMi4wNTc4MiwtMC4wMTYxNCAtMy45MjU4LC0xLjIwNTggLTQuODEwNjIsLTMuMDYzNzV6IiBmaWxsPSIjOWZkZGZmIj48L3BhdGg+PHBhdGggZD0iTTEwNy41LDEzNC4zNzVjLTEuNDg0MjcsMCAtMi42ODc1LDEuMjAzMjMgLTIuNjg3NSwyLjY4NzV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMS40ODQyNywwIDIuNjg3NSwtMS4yMDMyMyAyLjY4NzUsLTIuNjg3NXYtNS4zNzVjMCwtMS40ODQyNyAtMS4yMDMyMywtMi42ODc1IC0yLjY4NzUsLTIuNjg3NXpNOTQuMDYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTY3LjE4NzUsMTM0LjM3NWMtMS40ODQyNywwIC0yLjY4NzUsMS4yMDMyMyAtMi42ODc1LDIuNjg3NXY1LjM3NWMwLDEuNDg0MjcgMS4yMDMyMywyLjY4NzUgMi42ODc1LDIuNjg3NWMxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLC0xLjQ4NDI3IC0xLjIwMzIzLC0yLjY4NzUgLTIuNjg3NSwtMi42ODc1ek01My43NSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSw0OC4zNzVjLTEuMDMzNzcsMC4wMDI5MyAtMS45NzQyMywwLjU5ODU1IC0yLjQxODc1LDEuNTMxODdsLTI4LjAwMzc1LDU5LjEyNWMtMC4zOTYsMC44MzE0NCAtMC4zMzg3MSwxLjgwNzc0IDAuMTUxODMsMi41ODcxNWMwLjQ5MDU0LDAuNzc5NDEgMS4zNDYsMS4yNTMzNyAyLjI2NjkyLDEuMjU1OThoNTYuMDA3NWMwLjkyMDkyLC0wLjAwMjYgMS43NzYzOCwtMC40NzY1NyAyLjI2NjkyLC0xLjI1NTk4YzAuNDkwNTQsLTAuNzc5NDEgMC41NDc4MywtMS43NTU3MSAwLjE1MTgzLC0yLjU4NzE1bC0yOC4wMDM3NSwtNTkuMTI1Yy0wLjQ0NDUyLC0wLjkzMzMzIC0xLjM4NDk4LC0xLjUyODk1IC0yLjQxODc1LC0xLjUzMTg3ek01Ni44Njc1LDEwNy41bDIzLjc1NzUsLTUwLjE0ODc1bDIzLjc1NzUsNTAuMTQ4NzV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTE1OS4xODA2MywxNTMuNTYzNzVsLTY1Ljg5NzUsLTEzOS4wNzgxMmMtMS4zMzUyOCwtMi44MTIwNiAtNC4xNzAxNCwtNC42MDQxOCAtNy4yODMxMiwtNC42MDQxOGMtMy4xMTI5OCwwIC01Ljk0Nzg1LDEuNzkyMTIgLTcuMjgzMTIsNC42MDQxOGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuNzk0MDUsMS42NjcxOCAtMC42NzY2OCwzLjYyNTI2IDAuMzEwODQsNS4xODU2NmMwLjk4NzUyLDEuNTYwMzkgMi43MDY5MSwyLjUwNDYxIDQuNTUzNTQsMi41MDA1OWg4LjYyNjg3YzMuMTE3MTcsLTAuMDAzMzUgNS45NTMxMywtMS44MDMzIDcuMjgzMTMsLTQuNjIyNWw1LjU5LC0xMS43OTgxMmMwLjM1MDA2LDAuMTgwMDIgMC43MzUzOSwwLjI4MDk0IDEuMTI4NzUsMC4yOTU2M2MxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLDAgMCwwIDAsLTAuMjE1bDMuNjgxODgsLTcuODQ3NWg2Ny44ODYyNWwzLjY4MTg3LDcuODQ3NWMwLDAgMCwwIDAsMC4yMTV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMC4zOTEzMywtMC4wMDYzMiAwLjc3NjU2LC0wLjA5ODA1IDEuMTI4NzUsLTAuMjY4NzVsNS41OSwxMS43OTgxM2MxLjMzNzc0LDIuODA4NzMgNC4xNzIxLDQuNTk3MTkgNy4yODMxMyw0LjU5NTYzaDE5LjM3Njg3YzEuODQ2NjIsMC4wMDQwMSAzLjU2NjAxLC0wLjk0MDIgNC41NTM1NCwtMi41MDA1OWMwLjk4NzUyLC0xLjU2MDM5IDEuMTA0ODksLTMuNTE4NDcgMC4zMTA4NCwtNS4xODU2NnpNMTM0Ljk5MzEzLDE1NS44NzVjLTEuMDMzNzcsLTAuMDAyOTMgLTEuOTc0MjMsLTAuNTk4NTUgLTIuNDE4NzUsLTEuNTMxODhsLTEzLjE0MTg4LC0yNy42NTQzN2MtMC44OTMyMiwtMS44NzU0MSAtMi43ODcxMiwtMy4wNjgyNiAtNC44NjQzNywtMy4wNjM3NWgtNjcuODg2MjVjLTIuMDc3MjUsLTAuMDA0NTEgLTMuOTcxMTYsMS4xODgzNCAtNC44NjQzOCwzLjA2Mzc1bC0xMy4wODgxMywyNy42NTQzN2MtMC40NDQ1MiwwLjkzMzMzIC0xLjM4NDk4LDEuNTI4OTUgLTIuNDE4NzUsMS41MzE4OGgtOC42MjY4N2w2NS44OTc1LC0xMzkuMTA1YzAuNDQzMDQsLTAuOTQyNTEgMS4zOTA3NCwtMS41NDQyMSAyLjQzMjE5LC0xLjU0NDIxYzEuMDQxNDUsMCAxLjk4OTE0LDAuNjAxNjkgMi40MzIxOSwxLjU0NDIxbDY1Ljg3MDYyLDEzOS4xMDV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTg2LjUzNzUsMzguMTYyNWwyLjY4NzUsNS4zNzVjMC4yOTA3MiwxLjAxNTA3IDEuMTQ4ODksMS43NjU4NiAyLjE5MzU5LDEuOTE5MWMxLjA0NDcsMC4xNTMyNCAyLjA4MjM0LC0wLjMxOTQ2IDIuNjUyMzIsLTEuMjA4MjhjMC41Njk5OSwtMC44ODg4MiAwLjU2NjY5LC0yLjAyOTA1IC0wLjAwODQxLC0yLjkxNDU3bC0yLjY4NzUsLTUuMzc1Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXpNOTQuMjc3NSw1NC41MjkzN2wxMS4xMjYyNSwyMy40MDgxM2MwLjc1NDgyLDEuMDU4NzYgMi4xNTkzNSwxLjQyNTI3IDMuMzM1MjcsMC44NzAzNWMxLjE3NTkyLC0wLjU1NDkzIDEuNzg1ODksLTEuODcyMTEgMS40NDg0OCwtMy4xMjc4NWwtMTEuMTI2MjUsLTIzLjQ2MTg4Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXoiIGZpbGw9IiM4ZDZjOWYiPjwvcGF0aD48L2c+PC9nPjwvZz48L3N2Zz4=">
<?php 
include('../includes/admin-navigation.php');
require_once 'dbconn.php';
require("ban.php");
check_if_banned();

function myAlert($msg, $url) {
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
}
if (!isset($_SESSION['log'])) {
    header("location:AdminHomepage.php");
  }

if (isset($_GET['logout'])) {
  //backup
    $databases =['arkimorma_db'];
    $user = "root";
    $pass = "";
    $host = "localhost";

    date_default_timezone_set("Asia/Manila");

    if (!file_exists("D:/Arkimorma_BackupDB/Databases")) {
      mkdir("D:/Arkimorma_BackupDB/Databases");
    }

    foreach ($databases as $database) {
      if (!file_exists(("D:/Arkimorma_BackupDB/Databases/$database"))) {
        mkdir("D:/Arkimorma_BackupDB/Databases/$database");
      }

      $filename = $database."_".date("F_d_Y")."@".date("g_ia").uniqid("_", false);
      $folder = "D:/Arkimorma_BackupDB/Databases/$database/".$filename.".sql";

      exec("D:/Xampp/mysql/bin/mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$folder}", $output);
    }

  $sql =$dbconnnect->query("INSERT INTO dbbackup (filename)VALUES('$filename')");

  session_destroy();
  myAlert("Logout Successfully", "index.php");

}











//admitting
if (isset($_GET['admit'])) {
    $shop_id = $_GET['admit'];
    $email = $_GET['email'];
    $val = "Admit";
    $username = $_GET['username'];
    $update = $dbconnnect->query("UPDATE sellers SET status = '$val' WHERE shop_id = '$shop_id'");

    if ($update) {
      //send email
      $to = $email;
      $subject = "ARKIMORMA SELLER";
      $message = "<html>
        <head>
        <title>ADMIT</title>
        </head>
        <body>
        <h4>Your Account # ".$shop_id."</h4>
        <p>Hi: ".$username."</p>
        <p>This is to inform you that your account was already activated.</p>
        <p>To keep from getting, banned please make sure you've read and understand the terms and agreements of Arkimorma.</p>
        </body>
        </html>";
      $headers = "From: arkimorma@gmail.com \r\n";
      $headers .= "MIME-Version: 1.0"."\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

      mail($to, $subject, $message, $headers);
      myAlert("Admitted Succefully", "AdminHomepage.php");

    }
}


//banning
if (isset($_GET['ban'])) {
    $shop_id = $_GET['ban'];
    $email = $_GET['email'];
    $val = "Banned";
    $update = $dbconnnect->query("UPDATE sellers SET status = '$val' WHERE shop_id = '$shop_id'");

    if ($update) {
      //send email
      $to = $email;
      $subject = "ARKIMORMA SELLER";
      $message = "<html>
        <head>
        <title>BANNED</title>
        </head>
        <body>
        <h4>Your Account # ".$shop_id."</h4>
        <p>Hi: Seller</p>
        <p>We inform you the your account is BANNED </p>
        

        </body>
        </html>";
      $headers = "From: arkimorma@gmail.com \r\n";
      $headers .= "MIME-Version: 1.0"."\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

      mail($to, $subject, $message, $headers);
      myAlert("Banned Succefully", "AdminHomepage.php");

    }
}
//user delete
if (isset($_GET['user_delete'])) {
  $id = $_GET['user_delete'];
  $email = $_GET['email'];
  $username = $_GET['username'];
  $delete = $dbconnnect->query("DELETE FROM user WHERE user_id = '$id'");
  if ($delete) {
    //email
    $to = $email;
    $subject = "ARKIMORMA";
    $message = "<html>
      <head>
      <title>ACCOUNT</title>
      </head>
      <body>

      <p>Hi: ".$username."</p>
      <p>Your Account Has Been Deleted by admin.</p>

      
      

      </body>
      </html>";
    $headers = "From: arkimorma@gmail.com \r\n";
    $headers .= "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

    mail($to, $subject, $message, $headers);
    myAlert("delete Succefully", "AdminHomepage.php");
  }
}

//delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $email = $_GET['email'];
    $username = $_GET['username'];
    $delete = $dbconnnect->query("DELETE FROM sellers WHERE shop_id = '$id'");
    if ($delete) {
       //email
    $to = $email;
    $subject = "ARKIMORMA";
    $message = "<html>
      <head>
      <title>ACCOUNT</title>
      </head>
      <body>

      <p>Hi: ".$username."</p>
      <p>Your Account Has Been Deleted by admin.</p>

      
      

      </body>
      </html>";
    $headers = "From: arkimorma@gmail.com \r\n";
    $headers .= "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

    mail($to, $subject, $message, $headers);
      myAlert("delete Succefully", "AdminHomepage.php");
    }
}


if (isset($_GET['approve'])) {
  $id = $_GET['approve'];
  echo ".";
  ?>
  <script>
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Approve it!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Approve success!',

          'success'
        )
          window.location = 'AdminDownload.php?approve=<?php echo$id ?>';

      }
    })
  </script>


  <?php
}

if (isset($_GET['deny'])) {
  $id = $_GET['deny'];
  echo ".";
  ?>
  <script>
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Deny!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deny!',
          'Seller has been deny.',
          'success'
        )
          window.location = 'AdminDownload.php?deny=<?php echo$id ?>';

      }
    })
  </script>


  <?php
}






 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  




  <style type="text/css">
    .svg-icon {
  width: 1.5em;
  height: 1.5em;
}

.svg-icon path,
.svg-icon polygon,
.svg-icon rect {
  fill: red;
}

.svg-icon circle {
  stroke: #4691f6;
  stroke-width: 1;
}

.container{
  margin-left: 20%;
}

  </style>
</head>
<body>




<div class="container">
<br>
<br>
<h4>Shop Pending</h4>

<table id="pending">
  <thead>
    <tr>
      <th>ID</th>
      <th>Shop Name</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Username</th>
      <th>Address</th>

      <th>Date Request</th>
      <th>File</th>
      <th></th>
      <th></th>


    </tr>
  </thead>


<?php 
  
  $shop_pending = $dbconnnect->query(" SELECT * FROM sellers WHERE admin_approve = 0 AND status = 'Not Verify'");
  while ($row = mysqli_fetch_assoc($shop_pending)) {
    
 ?>


    <tr>
      <td><?php echo$row['shop_id'] ?></td>
       <td><?php echo$row['shop_name'] ?></td>
        <td><?php echo$row['phone'] ?></td>
         <td><?php echo$row['email'] ?></td>
          <td><?php echo$row['username'] ?></td>
           <td><?php echo$row['barangay']." ".$row['city']?></td>

             <td><?php $date_reg = $row['date_registration']; $timestamp = strtotime($date_reg);$new_date = date('F d Y H:m:sa', $timestamp); echo$new_date ?></td>
             <td><a href="AdminDownload.php?file=<?php echo$row['file_name']; ?>&username=<?php echo$row['username']; ?>" class="btn btn-primary">Download</a></td>
             <td><a href="AdminSellerList.php?approve=<?php echo$row['shop_id']; ?>" class="btn btn-success">Approve</a></td>
             <td><a href="AdminSellerList.php?deny=<?php echo$row['shop_id']; ?>" class="btn btn-warning">Deny</a></td>

    </tr>
    



<?php } ?>


</table>

















<br>
<br>
<br>
<br>
<br>
<br>
<br>








  <h4>Rentee Shops</h4>

<table  id="list" >  
    <thead>
      <tr>
            <th>ID</th>
            <th>Shop Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Username</th>
      
            <th>Address</th>
            <th>Postal Code</th>
            <th>Status</th>
            <th></th>
      </tr>
    </thead>
    

  <?php 


    $com = $dbconnnect->query("SELECT * FROM sellers");
    while ($row=mysqli_fetch_assoc($com)) {
  ?>
    <tr>
            <td><?php echo$row['shop_id'];?></td>
           
            <td><?php echo$row['shop_name'];?></td>
            <td><?php echo$row['phone'];?></td>
            <td><?php echo$row['email'];?></td>
            <td><?php echo$row['username'];?></td>
       
            <td><?php echo$row['barangay']." ".$row['city']?></td>
            <td><?php echo$row['postal_code'];?></td>
            <?php 
                if ($row['status'] == 'Not Verify') {
                 echo' <td><span class="label label-warning">'.$row["status"].'</span></td>';
                }
                elseif ($row["status"] == 'Banned') {
                    echo' <td><span class="label label-danger">'.$row["status"].'</span></td>';
                }
                elseif ($row["status"] == 'Deny') {
                    echo' <td><span class="label label-primary">'.$row["status"].'</span></td>';
                }
                else{
                    echo' <td><span class="label label-success">'.$row["status"].'</span></td>';
                }
             ?>
             


            <td>
             

     
                 <a href="AdminHomepage.php?delete=<?php echo $row['shop_id'] ?>&email=<?php echo$row['email'] ?>&username=<?php echo$row['username'] ?>"><svg class="svg-icon" viewBox="0 0 20 20">
                <path fill="none" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
              </svg></a>
         
             

              <?php if ($row['status'] == 'Banned'): ?>
                  <a href="AdminHomepage.php?admit=<?php echo$row['shop_id'] ?>&email=<?php echo$row['email']; ?>&username=<?php echo$row['username'] ?>">Admit</a>
             <?php endif ?>

              <?php if ($row['status'] == 'Admit'): ?>
                  <a href="AdminHomepage.php?ban=<?php echo$row['shop_id'] ?>&email=<?php echo$row['email']; ?>">Ban</a>
             <?php endif ?>

            
           </td>


    </tr>

      <?php
        }

       ?>

  </table>


</div> <!-- CONTAINER -->

        


 <script src="../assets/js/jquery.js"></script>
  <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#list').dataTable();
        $('#pending').dataTable();

    });
  </script>

</body>
</html>


