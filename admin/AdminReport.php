<?php 
require_once 'dbconn.php';

session_start();
if (!isset($_SESSION['log'])) {
    header("location:AdminHomepage.php");
  }

if (isset($_GET['logout'])) {
  session_destroy();
  header("location:index.php");
}



//report
if (isset($_POST['confirm'])) {
   $report_id = $_POST['report_id'];
    $shop_id = $_POST['shop_id'];
    $shop_email = $_POST['shop_email'];
    $choi = $_POST['confirm'];
    $username = $_POST['username'];

    if ($choi == 'Yes') {
        $sql = $dbconnnect->query("SELECT violation FROM sellers WHERE shop_id = '$shop_id'");
        $vio = $sql->fetch_assoc();
        $violation = $vio['violation'] + 1;
        $result = $violation;



        $update = $dbconnnect->query("UPDATE sellers SET violation = '$result' WHERE shop_id = '$shop_id'");
        
        if ($update) {
          $update_report = $dbconnnect->query("UPDATE report SET val = 'Confirm' WHERE shop_id = '$shop_id'");

          //email
            $to = $shop_email;
            $subject = "ARKIMORMA SELLER REPORT";
            $message = "<html>
              <head>
              <title>SELLER REPORT</title>
              </head>
              <body>
              <h2>SELLER REPORT</h2>
              <p>HI ".$username."</p>
              <p>We'd like to inform you that due to repeated or severe violations of our policy<br>
                your Arkimorma Account ".$username." has been temporarily banned.</p>
              

              
              

              </body>
              </html>";
            $headers = "From: arkimorma@gmail.com \r\n";
            $headers .= "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

            mail($to, $subject, $message, $headers);
        }
    }
    else if($choi =='No'){
       echo "
        <script>
            function myreport() {
              document.getElementById('report').hidden = true;
            }

            myreport();
        </script>"; 
    }
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arkimorma | Admin-Reports</title>
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
</head>
<style type="text/css">
  #report{
    height: 150px;
    width: 250px;
    background: whitesmoke;
    position: absolute;
    top: 50%;
    left: 43%;
  }
  #report form{
      padding: 20px;
  }
  #report input ,h5{
    margin-left: 50px;
    
  }
  #report input{
    width: 40px;
  }

#Report ,#SellerBanned, #ConfirmReport{
  margin-left: 40px;
  background: whitesmoke;
  padding: 40px;
  position: relative;
  max-width: 100%;
}
h3{
  text-align: center;  
  margin-bottom: 30px;
}



.first{
  margin-bottom: 200px;
  margin-left: 80px;
}



</style>
<body>
<?php include('../includes/admin-navigation.php'); ?>


<div class="container">
  
<div class="first">

  <h3>Report</h3>


     <table id="Report">
          <thead>
          	<tr>
	            <th>ID</th>
	            <th>Shop ID</th>
              <th>Shop Email</th>
	            <th>Shop</th>
	            <th>User</th>
	            <th>Reason</th>
	            <th>Message</th>
	            <th>Date of Report</th>
              <th>Action</th>
	       
  			</tr>
          </thead>
        

  <?php 
  $com = $dbconnnect->query("SELECT * FROM report WHERE val = ''ORDER BY `report`.`date_report` DESC");
  while ($row = mysqli_fetch_assoc($com)) {
    ?>
      <tr>
        <td><?php echo$row['report_id']; ?></td>
        <td><?php echo$row['shop_id'];?></td>
        <td><?php echo$row['shop_email'];?></td>
        <td><?php echo$row['shop_name']; ?></td>
        <td><?php echo$row['customer_name']; ?></td>
        <td><?php echo$row['reason']; ?></td>
        <td><?php echo$row['message']; ?></td>
        <td><?php $date_report = $row['date_report']; $timestamp = strtotime($date_report);$new_date = date('F d Y', $timestamp); echo$new_date  ?></td>


        <td><a href="AdminReport.php?id=<?php echo$row['report_id'] ?>&shop_id=<?php echo$row['shop_id'] ?>&shop_email=<?php echo$row['shop_email'] ?>&username=<?php echo$row['shop_name'] ?>">Confirm</a></td>
      </tr>
  <?php
  }


   ?>

<div id="report" hidden>
  <form method="post" action="AdminReport.php"> 
<?php 
if (isset($_GET['id'])) {
  $report_id = $_GET['id'];
  $shop_id = $_GET['shop_id'];
  $shop_email = $_GET['shop_email'];
  $username = $_GET['username'];

  
  echo "
        <script>
            function myreport() {
              document.getElementById('report').hidden = false;
            }

            myreport();
        </script>"; 
  
} ?>


    <h5>Are you sure?</h5>
    <input type="hidden" name="report_id" value="<?php echo$report_id; ?>">
    <input type="hidden" name="shop_id" value="<?php echo$shop_id; ?>">
    <input type="hidden" name="shop_email" value="<?php echo$shop_email; ?>">
    <input type="hidden" name="username" value="<?php echo$username; ?>">
    <input type="submit" name="confirm" value="Yes">
    <input type="submit" name="confirm" value="No">

  </form>
</div>
    
    </table>

 </div>
</div>



<div class="container">
  <div class="first">
<h3>Confirm Report</h3>


     <table id="ConfirmReport">
          <thead>
            <tr>
              <th>ID</th>
              <th>Shop ID</th>
              <th>Shop Email</th>
              <th>Shop</th>
              <th>User</th>
              <th>Reason</th>
              <th>Message</th>
              <th>Val</th>
              <th>Date of Report</th>
              
         
        </tr>
          </thead>
        

  <?php 
  $com = $dbconnnect->query("SELECT * FROM report WHERE val = 'Confirm' ORDER BY `report`.`date_report` DESC");
  while ($row = mysqli_fetch_assoc($com)) {
    ?>
      <tr>
        <td><?php echo$row['report_id']; ?></td>
        <td><?php echo$row['shop_id'];?></td>
        <td><?php echo$row['shop_email'];?></td>
        <td><?php echo$row['shop_name']; ?></td>
        <td><?php echo$row['customer_name']; ?></td>
        <td><?php echo$row['reason']; ?></td>
        <td><?php echo$row['message']; ?></td>
        <td><?php echo$row['val']; ?></td>
        <td><?php $date_report = $row['date_report']; $timestamp = strtotime($date_report);$new_date = date('F d Y', $timestamp); echo$new_date  ?></td>
        
      </tr>

<?php } ?>
</table>
</div>
</div>




<div class="container">
<div class="first">
<h3>Seller Banned</h3>


     <table id="SellerBanned">
          <thead>
            <tr>
           
              <th>Shop ID</th>
              <th>Shop Email</th>
              <th>Violation</th>
              <th>Status</th>
              <th>Date Banned</th>
              <th>Date End Banned</th>
         
              
         
        </tr>
          </thead>
        

  <?php 
  $com = $dbconnnect->query("SELECT * FROM sellers WHERE status = 'Banned'");
  while ($row = mysqli_fetch_assoc($com)) {
    ?>
      <tr>
  
        <td><?php echo$row['shop_id'];?></td>
        <td><?php echo$row['email'];?></td>
        <td><?php echo$row['violation']; ?></td>
        <td><?php echo$row['status']; ?></td>
        <td><?php $date_ban = $row['Date_Banned']; $timestamp = strtotime($date_ban);$new_date = date('F d Y', $timestamp); echo$new_date  ?></td>
        <td><?php $date_end = $row['Date_end_banned']; $timestamp = strtotime($date_end);$new_date = date('F d Y', $timestamp); echo$new_date ?></td>


      </tr>
<?php } 


?>

  

</table>
</div>
</div>

 <script src="../assets/js/jquery.js"></script>
  <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#Report').dataTable();
        $('#SellerBanned').dataTable();
        $('#ConfirmReport ').dataTable();
    });
  </script>


</body>
</html>