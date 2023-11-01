<?php include("../conn/conn.php"); session_start();
  if((!isset($_SESSION["User_code"]) && $_SESSION["User_code"] == '') || 
      (!isset($_SESSION["User_name"]) && $_SESSION["User_name"] == ''))
  {
	  header("location:../login.php");
  }
  else
    {
		if($_SESSION["User_type"] =='admin')
		  $admin_name = $_SESSION["User_fullname"];
		else
		  header("location:../index.php");
		
	}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>DEPARTMENT TAXES& COMMERCIAL TRANSFERS - Control panel</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">CP</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="./"><i class="fa fa-home fa-fw"></i> Website</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i>  Logout</a></li>
                </ul>

          
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Users<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="manageusers.php">Manage Users</a>
                                    </li>
                                  
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> Files <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="managefiles.php">Create new file</a>
                                    </li>
                                    <li>
                                        <a href="managefilesdetails.php">Add information to file</a>
                                    </li>
                                  
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                      <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> Complaints and Ratings <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="viewcomplaint.php">Complaints</a>
                                    </li>
                                    <li>
                                        <a href="viewratings.php">Customers Ratings</a>
                                    </li>
                                  
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
<li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> News Management <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="managenews.php">Add/Edit News</a>
                                    </li>
                                  
                                  
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            
                        </ul>
                    </div>
                </div>
            </nav>