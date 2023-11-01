<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Customer Complaint </title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
      <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
      <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
     <section class="page-section" id="contact">
         <div class="container">
            <div class="text-center">
               <h2 class="section-heading text-uppercase">Contact Us</h2>
               <h3 class="section-subheading text-muted">
                  <center>File a complaint against an employee of our organization  
                  </center>
               </h3>
            </div>
            <?php
               if (isset($_POST["info_submit"])) {
               	extract($_POST);
                            include('conn/conn.php');
               	$firstname = clean_value($conf,$firstname);
               	$lastname = clean_value($conf,$lastname);
               	$empname = clean_value($conf,$empname);
               	$email = clean_value($conf,$email);
               	$message = clean_value($conf,$message);
               		
            
               	$d = date("Y-m-d");  
               	/**********************/
             	mysqli_query($conf, "INSERT INTO `complaint` ( `firstname`, `lastname`, `email`,  `empname`, `message`   ) 
               	             VALUES ( '$firstname', '$lastname',    '$email'  , '$empname' ,'$message'   )") or die(mysqli_error($conf));
               	$new_id = mysqli_insert_id($conf);
               	if ($new_id > 0) {
               	     header("location:index.php?c=1#alrt");
               	}else{
               	     header("location:index.php?c=0#alrt");
               	}
               }
 
         ?>
            <form id="contactForm" method="post" enctype="multipart/form-data" >
               <div class="row align-items-stretch mb-5">
                  <div class="col-md-6">
               
                     <div class="form-group">
                        <input class="form-control" id="firstname" name="firstname" type="text" placeholder="First Name *" required />
                     </div>
                     <div class="form-group">
                        <input class="form-control" id="lastname" name="lastname" type="text" placeholder="Last Name *" required />
                     </div>
                     <div class="form-group">
                        <input class="form-control" id="email" type="email" name="email" placeholder="Email *" required />
                     </div>
      
                     <div class="form-group mb-md-0">
                        <input class="form-control" id="empname" name="empname" type="text" placeholder="Employee Name *" required />
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group form-group-textarea mb-md-0">
                        <textarea class="form-control" id="message" name="message" placeholder="How can we help you? *" required></textarea>
                     </div>
                  </div>
               </div>
       
               <?php if(!empty($_GET["c"]) && $_GET["c"]==0){?>
               <div id="alrt" class=" alert alert-danger" id="error-message-alert" role="alert alert-danger">
                  Failed to send message
               </div>
               <?php } ?>
               <?php if(!empty($_GET["c"]) && $_GET["c"]==1){?>
               <div id="alrt" class=" alert alert-success" id="success-message-alert" role="alert alert-success">
                  Your request has been sent successfully, 
                  your request will be processed within 3 working days
               </div>
               <?php } ?>
               <br /><br /><br /><br />
               <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="form-submit" name="info_submit" type="submit">Send complaint</button></div>
            </form>
         </div>
      </section>
      <style type="text/css">
         .footer {
         left: 0px;
         bottom: 0px;
         height: 35px;
         width: 100%;	    
         }
         #cardsContainer{
         display:none;
         }
      </style>
      <div style="text-align: center" class="footer panel-footer">Copyright &#169; 2023. All rights reserved.</div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/checkData.js?v=54"></script>
   </body>
</html>