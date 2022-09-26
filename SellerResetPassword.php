<?php   
$error = NULL;

require_once 'dbcon.php';

$userEmail = $_GET['email'];

if(isset($_POST['resetpass'])){
    $userEmail = $userEmail;
    $Password = $_POST['password'];
    $retype_password = $_POST['retype-password'];
    

        if ($Password != $retype_password) {
            $error = "Unmatch password please try again";
        }
        elseif (strlen($Password) < 8) {
            $error = "Password Need Atleast 8 Characters";
    
        }
        else {
            $Password = md5($Password);
            $update = $dbconnnect->query("UPDATE sellers SET password = '$Password' WHERE email = '$userEmail'");

            if ($update) {

                function myAlert($msg, $query) {
                    echo '<script language="javascript">alert("'.$msg.'");</script>';
                    echo "<script>window.close() = '$query'</script>";
                }

                myAlert("Reset Password Successfully", "window.close()");
            }
            else{
            echo $dbconnnect->error;
            }

        }

        
    }



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Seller - Reset Password</title>

	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
	
	<?php include('includes/navigation.php'); ?>
        <div class="EmailReset">
            <div class="form-container">
                
                    <form action="#" method="POST" class="form-wrap">
                        <h4>Reset Password</h4>
                        <h4><?php echo $error ?></h4>
                            <div class="form-box">
                                <input type="text" placeholder="Password" name="password">
                            </div>
                            <br>

                        <div class="form-box">
                                <input type="text" placeholder="Re-enter Password" name="retype-password">
                                <input type="submit" name="resetpass" value="Enter">
                            </div>
                            <br>
                        <div class="text-center">
                            <a href="SellerLogin.php" class="btn btn-danger">Return</a> 
                        </div>
                    </form>
            </div>
        </div>

    <?php include('includes/footer.php'); ?>

<script src="assets/js/jquery.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="assets/plugins/fontawesome/js/fontawesome.js"></script>
</body>
</html>

