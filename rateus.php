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
      <style>
         .rating {
         unicode-bidi: bidi-override;
         direction: rtl;
         }
         .rating > span {
         display: inline-block;
         position: relative;
         width: 1.1em;
         }
         .rating > span:hover:before,
         .rating > span:hover ~ span:before {
         content: "\2605";
         position: absolute;
         }
      </style>
   </head>
   <body>
      <section class="page-section" id="contact">
          <?php if(!empty($_GET["c"]) && $_GET["c"]==0){?>
               <div id="alrt" class=" alert alert-danger" id="error-message-alert" role="alert alert-danger">
                  Rate Process Failed or <?=!empty($alert)?"":""?>
               </div>
               <?php } ?>
               <?php if(!empty($_GET["c"]) && $_GET["c"]==3){?>
               <div id="alrt" class=" alert alert-danger" id="error-message-alert" role="alert alert-danger">
                  This email  was rated before
               </div>
               <?php } ?>
               <?php if(!empty($_GET["c"]) && $_GET["c"]==1){?>
               <div id="alrt" class=" alert alert-success" id="success-message-alert" role="alert alert-success">
                  Thanks For your Rating
               </div>
               <?php } ?>
         <div class="container">
            <?php
               if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                   if(isset($_POST["btn_rate"])){
                        	extract($_POST);
                            include('conn/conn.php');
                            	$email = clean_value($conf,$email);
                            	$rate_representatives = clean_value($conf,$rate_representatives);
                           	    $rate_easyfind = clean_value($conf,$rate_easyfind);
                           	    $rate_processed = clean_value($conf,$rate_processed);
                            	$review = clean_value($conf,$review);
                                		
                               	
                               	if(redundancy_where_value_s($conf, "ratings", "email", $email, "") > 0) {
                             
                               	header("location:rateus.php?c=3#alrt");
                                      	}
                               else{
                                   	mysqli_query($conf, "INSERT INTO `ratings` ( `email`, `rate_representatives`, `rate_easyfind`, `rate_processed`, `review` ) 
               	            VALUES ('$email', '$rate_representatives', '$rate_easyfind', '$rate_processed',  '$review'  )") or die(mysqli_error($conf));
                                   	$new_id = mysqli_insert_id($conf);
                                   	if ($new_id > 0) {
                                   	   
                                   		header("location:rateus.php?c=1#alrt");
                                   	}else{
                                   	 
                                       	header("location:rateus.php?c=0#alrt");
                                   	}
                               }
                       
                       
                   }
                 
               }
               ?>
            <h2>Rate Our Service</h2>
            <form method="POST" dir="ltr">
               <div class="rating" style="direction:ltr !important">
                  <h4>Are you satisfied with the service of our office representatives?</h4>
                  <span style="direction:ltr !important">1<input type="radio" class="form-control" name="rate_representatives" value="1"></span>
                  <span style="direction:ltr !important">2<input type="radio" class="form-control" name="rate_representatives" value="2"></span>
                  <span style="direction:ltr !important">3<input type="radio" class="form-control" name="rate_representatives" value="3"></span>
                  <span style="direction:ltr !important">4<input type="radio" class="form-control" name="rate_representatives" value="4"></span>
                  <span style="direction:ltr !important">5<input type="radio" class="form-control" name="rate_representatives" value="5"></span>
               </div>
               <br>
               <div class="rating" style="direction:ltr !important">
                  <h4>Was it easy to find what you were looking for?</h4>
                  <span style="direction:ltr !important">1<input type="radio" class="form-control" name="rate_easyfind" value="1"></span>
                  <span style="direction:ltr !important">2<input type="radio" class="form-control" name="rate_easyfind" value="2"></span>
                  <span style="direction:ltr !important">3<input type="radio" class="form-control" name="rate_easyfind" value="3"></span>
                  <span style="direction:ltr !important">4<input type="radio" class="form-control" name="rate_easyfind" value="4"></span>
                  <span style="direction:ltr !important">5<input type="radio" class="form-control" name="rate_easyfind" value="5"></span>
               </div>
               <br>
               <div class="rating" style="direction:ltr !important">
                  <h4>Has your request been processed?</h4>
                  <span style="direction:ltr !important">1<input type="radio" class="form-control" name="rate_processed" value="1"></span>
                  <span style="direction:ltr !important">2<input type="radio" class="form-control" name="rate_processed" value="2"></span>
                  <span style="direction:ltr !important">3<input type="radio" class="form-control" name="rate_processed" value="3"></span>
                  <span style="direction:ltr !important">4<input type="radio" class="form-control" name="rate_processed" value="4"></span>
                  <span style="direction:ltr !important">5<input type="radio" class="form-control" name="rate_processed" value="5"></span>
               </div>
               <br>
               <label for="additionalData" style="direction:ltr !important">Email:</label>
               <input type="text" name="email" class="form-control" id="email" required>
               <br>
               <label for="additionalData" style="direction:ltr !important">Review:</label>
               <input type="text" name="review" class="form-control" id="review" required>
               <br>
               <button type="submit" class="btn btn-warning btn-lg" name="btn_rate">Rate Now</button>
            </form>
         </div>
      </section>
   </body>
</html>