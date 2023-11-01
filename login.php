<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>DEPARTMENT TAXES& COMMERCIAL TRANSFERS - Control panel | Login</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body>
    <?php 
	if(isset($_POST['btn_submit']))
	{
     
       include('conn/conn.php');
		$u = $_POST[md5("User_name")];
		$p = md5($_POST[md5("User_password")]);
 	  if($u == '' || empty($u))
	  {
		  header("location:login.php?err=1");
	  }
	  elseif($p == '' || empty($p))
	  {
		  header("location:login.php?err=2");
	  }	
	  else
	  {
 			$stm= "SELECT * FROM `users` WHERE `User_name`='".$u."' and `User_password`='".$p."'   and `User_active` = '1' and User_type='admin'" ;
 			//echo $stm; exit;

 			$sqls = mysqli_query($conf,$stm) or die(mysqli_error($conf));
  			// Mysql_num_row is counting table row
 			$count=mysqli_num_rows($sqls);
 			// If result matched $myusername and $mypassword, table row must be 1 row
			if($count==1){
 				$row_usr_data = mysqli_fetch_array($sqls);
	            session_start();
				$_SESSION['User_code'] = $row_usr_data['User_code'];
				$_SESSION['User_name'] = $row_usr_data["User_name"];
				$_SESSION['User_fullname'] = $row_usr_data['User_fullname'] ;
				$_SESSION['User_email'] = $row_usr_data['User_email'];
				$_SESSION['User_type'] = $row_usr_data['User_type'];
				$_SESSION['User_country'] = $row_usr_data['User_country'];
				$_SESSION['User_active'] = $row_usr_data['User_active'];
 				
				 if($row_usr_data['User_type'] == 'admin')
				 {
					  
					header("location:admin/index.php");
				 }
					else
					{
						header("location:index.php");
					}
			}
			else {
                //And with a third argument, you can add an icon to your alert! There are 4 predefined ones: 
                //"warning", "error", "success" and "info".
                //alert($status ,$msgtitle="",  $msg) 
			    echo alert("error","Failed!","Wrong in password or username");
			}
	  }
	   unset($_POST);	
	}
?>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="<?= md5("User_name")?>" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="<?= md5("User_password")?>" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" name="btn_submit" class="btn btn-lg btn-success btn-block">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
