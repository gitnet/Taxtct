<?php  ob_start();  ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Department Taxes&Commercial Transfers</title>
      <link rel="icon" type="image/x-icon" href="assets/img/logo1.png" />
      <script src="js/all.js" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css" />
      <link href="css/styles.css" rel="stylesheet" />
      <link rel='stylesheet' href='css/wafloatbox-0.2.css'>
      <script src="js/jquery-3.5.1.min.js"></script>
      <script src='js/wafloatbox-0.27b30.js?v=4'></script>
      <style>
         @font-face{font-family:"HSBC Univers Next";
         font-display:swap;
         src:url("fonts/UniversNextforHSBCW02-Rg.woff") format("woff");
         font-weight:normal;
         font-style:normal
         }
         @font-face{font-family:"HSBC Univers Next";
         font-display:swap;
         src:url("fonts/UniversNextforHSBCW02-Md.woff") format("woff");
         font-weight:normal;
         font-style:normal
         }
         @font-face{font-family:"HSBCIcon-Font";font-display:swap;
         src:url("fonts/HSBCIcon-Font-Extension.woff") format("woff");
         font-weight:normal;
         font-style:normal
         }
         @font-face{font-family:"HSBCIcon-Font";
         font-display:swap;src:url("fonts/HSBCIcon-Font.woff") format("woff");
         font-weight:normal;
         font-style:normal
         }
         .hidden{
         display:none;
         }		
         body{
         font-family:"HSBC Univers Greek","HSBC Univers Next","sans-serif" !important ;
         }
         .navbar-shrink a{
         color:#fff !important;
         }
      </style>
   </head>
   <body id="page-top">
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
         <div class="container">
            <a class="navbar-brand"><img src="assets/img/logoup.png" alt="..." />
            <span style="font-size: 15px;"> Tax Trading &  <br />Commercial Transfer</span>
            </a>
            <!--<a href="tel:+442045485499" style="color:white;text-decoration:none">+442045485499</a>-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                  <li class="nav-item"><a class="nav-link" href="#services" style="color:#605050">Services</a></li>
                  <li class="nav-item"><a class="nav-link" href="#about" style="color:#605050">About</a></li>
                  <li class="nav-item"><a class="nav-link" href="complaint.php" style="color:#605050">Customer Compalints</a></li>
                  <li class="nav-item"><a class="nav-link" href="rateus.php" style="color:#605050">Customer Rating</a></li>
                  <li class="nav-item"><a class="nav-link" href="#contact" style="color:#605050">Contact</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <header class="masthead">
         <div class="container">
            <div class="masthead-subheading">Welcome To</div>
            <h2 class="text-uppercase" style="margin-bottom: 35px;color:#605050">Financial audit of the detained investment portfolios</h2>
            <a class="btn btn-primary btn-xl text-uppercase" style="margin: 30px" href="checktaxnumber.php">Check by Tax Registration Number</a>
            <a class="btn btn-primary btn-xl text-uppercase" style="margin: 30px" href="checkfilenumber.php">Check By File Number</a>
         </div>
      </header>
            <section class="page-section" id="News">
         <div class="container">
            <div class="text-center">
               <h2 class="section-heading text-uppercase">
                  <a href="news/allnews.php">
                     News
                  </a>
               </h2>
            </div>
            <div class="row text-center">
             <?php 
             include("conn/conn.php");
               $selnews = "SELECT * FROM news order by id desc LIMIT 4";
               $qr = mysqli_query($conf,$selnews) or die(mysqli_error($conf));
               while($rows = mysqli_fetch_array($qr)){
             ?>
               <div class="col-md-3">
                  <a href="newsdet.php?id=<?=$rows["id"]?>">
                     <span class="fa-4x">
                     <img src="<?=$rows["nphoto"]?>" style="border-radius: 50%;" width="200" height="200"/> 
                     <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                     </span>
                     <p class="text-muted"><?=$rows["ntitle"]?></p>
                  </a>
               </div>
               <?php } ?>
            </div>
         </div>
      </section>
      <section class="page-section" id="services">
         <div class="container">
            <div class="text-center">
               <h2 class="section-heading text-uppercase">Services</h2>
            </div>
            <div class="row text-center">
               <div class="col-md-3">
                  <span class="fa-4x">
                  <img src="assets/img/provtax.png" style="border-radius: 50%;" width="200" height="200"/> 
                  <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                  </span>
                  <p class="text-muted">Provides a tax record for owners of trade, investment and real estate</p>
               </div>
               <div class="col-md-2">
                  <span class=" fa-4x">
                  <img src="assets/img/centralbank.jpg" style="border-radius: 50%;" width="150" height="150"/> 
                  <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                  </span>
                  <p class="text-muted">
                     An intermediary is between you and the central bank because the central bank does not deal directly with customers
                  </p>
               </div>
               <div class="col-md-2">
                  <span class="fa-4x">
                  <img src="assets/img/taxes.jpg" style="border-radius: 50%;" width="150" height="150"/> 
                  <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                  </span>
                  <p class="text-muted">
                     Receives transferred taxes from clients with investment, trade and real estate
                  </p>
               </div>
               <div class="col-md-2">
                  <span class="fa-4x">
                  <img src="assets/img/transfer.jpg" style="border-radius: 50%;" width="150" height="150"/> 
                  <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                  </span>
                  <p class="text-muted">
                     Through us, the file is transferred to a Chinese or American mediator
                  </p>
               </div>
               <div class="col-md-3">
                  <span class="fa-4x">
                  <img src="assets/img/filessss.jpg" style="border-radius: 50%;" width="200" height="200"/> 
                  <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                  </span>
                  <p class="text-muted">
                     Unblocks the reserved files
                  </p>
               </div>
            </div>
         </div>
      </section>
      <section class="page-section bg-light" id="about">
         <div class="container">
            <div class="text-center">
               <h2 class="section-heading text-uppercase">About</h2>
               <h3 class="section-subheading text-muted">Thank you for giving us your valuable time to read Who We Are</h3>
               <p class="text-muted">
                  Department Taxes&Commercial Transfers MONEY was established in Birmingham in 1991, originally called FIRST CONTACT OFFICE. After a series of acquisitions from competing companies, the company changed its name in 2006 to Department Taxes&Commercial Transfers MONEY.
               </p>
               <p class="text-muted">
                  We are Department Taxes&Commercial Transfers MONEY a company with offices in Liverpool, Glasgow, Leeds and Sheffield.
                  Headquarters in Birmingham.
                  Specialized in dealing with consignments of funds arising from mutual funds / trading / real estate / pending investment.
                  The request is submitted to the central banks of your file, so that we send them a so-called (identification number) which is a 13-digit number that starts with 300 and includes foreign characters. Be careful not to give it to alternative parties because it determines the number of credits or projects you have, after verifying the client through the identity card / passport / project documents, it is sent to one of the work team and the file is followed up. If the client has a previous business, we recommend making a tax register card to deduct taxes from 20% to 13.4%, which is a tax dependent on B2B investments, the tax registration number is 15 digits and does not include foreign characters, starts at 3000
                  We are an intermediary between you and the central banks in the United Kingdom, between the Republic of China and the United States of America, as the company is not-for-profit after selling it to the central banks and dealing with banks becomes easier for the work team.
               </p>
            </div>
            <ul class="timeline">
               <li>
                  <div class="timeline-image"><img height="300" width="300" class="rounded-circle img-fluid" style="background-color: white" src="assets/img/logo11.png" alt="..." /></div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4>in 1996</h4>
                        <h4 class="subheading">Tax Trading & Commercial Transfer  </h4>
                     </div>
                     <div class="timeline-body">
                        <p class="text-muted">
                           A publishing company has completed its first money transfer line from the United Kingdom to the People's Republic of China. In 1998 in the UK, Department Taxes&Commercial Transfers MONEY monopolized remittance lines and attempted remittance agreements between the UK and New York, and was the first UK-based money-transfer company to contract with the Republic of China and the United States.
                        </p>
                     </div>
                  </div>
               </li>
               <li class="timeline-inverted">
                  <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/logo11.png" alt="..." /></div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4>in 2000</h4>
                        <h4 class="subheading"> Tax Trading & Commercial Transfer</h4>
                     </div>
                     <div class="timeline-body">
                        <p class="text-muted">
                           She would provide a copy on paper and contract with a postal company to deliver the financial documents directly to the banks. This service became standard in 2001 and was approved by law in 2002. In 2004 the company began to provide money transfer services to individuals and not only to banks, which were based on banking transactions in the Republic of China and the USA. In 2007 the company started providing document delivery services to clients directly. As telephone services have become the leading means of communication, so we strive to preserve the property of all customers and avoid calls that speak on our behalf, money delivery services have become the main business among the company's business.
                        </p>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/logo11.png" alt="..." /></div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4>in 2008</h4>
                        <h4 class="subheading">Department Taxes&Commercial Transfers MONEY</h4>
                     </div>
                     <div class="timeline-body">
                        <p class="text-muted">
                           It began offering its customers the use of a "debit card", which makes it possible to obtain a short-term loan. The company introduced the first remote money transfer cards for use in its branches. In 2008 the company started contracting with lawyers accredited by the Financial Supervisory Authority and through the central banks. In 2011 the company started providing the tax registration number by mail to ensure the safety of the client's rights.
                        </p>
                     </div>
                  </div>
               </li>
               <li class="timeline-inverted">
                  <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/logo11.png" alt="..." /></div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4>in 2012</h4>
                        <h4 class="subheading">Department Taxes&Commercial Transfers MONEY</h4>
                     </div>
                     <div class="timeline-body">
                        <p class="text-muted">
                           The Department Taxes&Commercial Transfers of funds began by contracting with the first twenty lawyers accredited to the financial supervision authorities and central banks. It was the first money transfer company to have its own communications network, starting in 2013. A satellite called Westar has been used for communications between the company's branches all over the world. The company also provided satellite, video, information and fax services through its satellites.
                        </p>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/logo11.png" alt="..." /></div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4>in 2002</h4>
                        <h4 class="subheading">Department Taxes&Commercial Transfers MONEY</h4>
                     </div>
                     <div class="timeline-body">
                        <p class="text-muted">
                           After the profitability of communication services decreased and the company's debts increased, Department Taxes&Commercial Transfers MONEY began to reduce its investments in the field of communications, customer services were immediately reduced and all files were transferred to the authorities and central banks, and the company's successful campaign was led by the slogan: "The fastest way to send money in all Worldwide.In the beginning of 2004, the company reorganized express transportation services
                        </p>
                     </div>
                  </div>
               </li>
               <li class="timeline-inverted">
                  <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/logo11.png" alt="..." /></div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4>in 2006</h4>
                        <h4 class="subheading">Department Taxes&Commercial Transfers MONEY</h4>
                     </div>
                     <div class="timeline-body">
                        <p class="text-muted">
                           The company was sold to central banks in the United Kingdom. Twenty additional lawyers were added to the direct dealings between us, bringing the number of our accredited lawyers to forty.
                        </p>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/logo11.png" alt="..." /></div>
                  <div class="timeline-panel">
                     <div class="timeline-heading">
                        <h4>in 2019</h4>
                        <h4 class="subheading">Department Taxes&Commercial Transfers MONEY</h4>
                     </div>
                     <div class="timeline-body">
                        <p class="text-muted">
                           Department Taxes&Commercial Transfers MONEY and GTXW become owners of Airfone, a company that provides telephone services to commercial airline passengers. In 2019, the company that owns GTXW acquired all the switching desks and was identified by the British authorities.
                        </p>
                     </div>
                  </div>
               </li>
               <li class="timeline-inverted">
                  <div class="timeline-image">
                     <h4 style="color:#000">
                        Be Part
                        <br />
                        Of Our
                        <br />
                        Story!
                     </h4>
                  </div>
               </li>
            </ul>
         </div>
      </section>
      <div class="py-5">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-md-3 col-sm-6 my-3">
                  <a href="https://globalwtd.com/"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/10.png" width="80" alt="..." /></a>
               </div>    
               <div class="col-md-3 col-sm-6 my-3">
                  <a href="https://www.gov.uk/government/organisations/hm-revenue-customs"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/3.png" width="80" alt="..." /></a>
               </div>
               <div class="col-md-3 col-sm-6 my-3">
                  <a href="https://www.boc.cn/en/"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/1.png" width="120" alt="..." /></a>
               </div>
               <div class="col-md-3 col-sm-6 my-3">
                  <a href="https://www.bankofengland.co.uk/"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/2.svg" alt="..." /></a>
               </div>
               <div class="col-md-3 col-sm-6 my-3">
                  <a href="https://www.lse.ac.uk/"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/4.png" alt="..." /></a>
               </div>
               <div class="col-md-3 col-sm-6 my-3">
                  <a href="https://www.dbs.com/default.page"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/5.png" alt="..." /></a>
               </div>
               <div class="col-md-3 col-sm-6 my-3">
                  <a href="https://www.bnymellon.com/"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/6.png" alt="..." /></a>
               </div>
               <div class="col-md-3 col-sm-6 my-3">
                  <a href="https://www.bankofamerica.com/"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/7.png"  alt="..." /></a>
               </div>
               <div class="col-md-3 col-sm-6 my-3">
                  <a href="https://www.wordfence.com/"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/8.png"  alt="..." /></a>
               </div>
               <div class="col-md-3 col-sm-6 my-3">
                  <a href="https://www.binance.com/en"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/9.png"  alt="..." /></a>
               </div>
                 <div class="col-md-3 col-sm-6 my-3">
                  <a href="https://fsrauthority.com"><img class="img-fluid img-brand d-block mx-auto"  width="120"  src="assets/img/1122.png"  alt="..." /></a>
               </div>
               
            </div>
         </div>
      </div>
      <section class="page-section" id="contact">
         <div class="container">
            <div class="text-center">
               <h2 class="section-heading text-uppercase">Contact Us</h2>
               <h3 class="section-subheading text-muted">
                  <center>Location: 3 Centenary Sq, <br />
                     Main Address: Birmingham B1 2DR.Wall St, <br />
                     Second Address: Liverpool L 8JQ, United Kingdom  
                  </center>
               </h3>
            </div>
            <?php
               if (isset($_POST["info_submit"])) {
               	extract($_POST);
                            include('conn/conn.php');
               	$department = clean_value($conf,$department);
               	$firstname = clean_value($conf,$firstname);
               	$lastname = clean_value($conf,$lastname);
               	$country = clean_value($conf,$country);
               	$email = clean_value($conf,$email);
               	$callback = "" ; 
               	$phone = clean_value($conf,$phone);
               	$message = clean_value($conf,$message);
               		
               	
               	if(redundancy_where_value_s($conf, "info", "email", $email, " or phone ='".$phone."'") > 0) {
               	$alert = "This email or phone was added before";
                      	}
               else{
               	$d = date("Y-m-d");  
               	/**********************/
               	$target_dir = "uploads/";
               	$target_file = $target_dir . basename($_FILES["fileattach"]["name"]);
               	$uploadOk = 1;
               	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               
               	// Check if image file is a actual image or fake image
               
               	$check = getimagesize($_FILES["fileattach"]["tmp_name"]);
               	if($check !== false) {
               		$alert= "File is an image - " . $check["mime"] . ".";
               		$uploadOk = 1;
               	} else {
               		$alert=   "File is not an image.";
               		$uploadOk = 0;
               	}
                
               
               	// Check if file already exists
               	if (file_exists($target_file)) {
               		$alert=  "Sorry, file already exists.";
               	$uploadOk = 0;
               	}
               
               	// Check file size
               	if ($_FILES["fileattach"]["size"] > 5000000) {
               	$alert=  "Sorry, your file is too large.";
               	$uploadOk = 0;
               	}
               
               	// Allow certain file formats
               	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
               	&& $imageFileType != "gif" && $imageFileType!="pdf" ) {
               	$alert=  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
               	$uploadOk = 0;
               	}
               
               	// Check if $uploadOk is set to 0 by an error
               	if ($uploadOk == 0) {
               	$alert=   "Sorry, your file was not uploaded.";
               	// if everything is ok, try to upload file
               	} else {
               	if (move_uploaded_file($_FILES["fileattach"]["tmp_name"], $target_file)) {
               		$alert=   "The file ". htmlspecialchars( basename( $_FILES["fileattach"]["name"])). " has been uploaded.";
               	} else {
               		$alert=   "Sorry, there was an error uploading your file.";
               	}
               	}
               	/**********************/
               
               
               
                                  if($uploadOk == 0 )
                                    header("location:index.php?c=2#alrt");
               
               
               	mysqli_query($conf, "INSERT INTO `info` (`department`, `firstname`, `lastname`, `country`, `email`, `callback`, `phone`, `message`  , `photo` ) 
               	            VALUES ('$department', '$firstname', '$lastname', '$country',  '$email' , '$callback' , '$phone' ,'$message' ,'$target_file' )") or die(mysqli_error($conf));
               	$new_id = mysqli_insert_id($conf);
               	if ($new_id > 0) {
               	   
               		header("location:index.php?c=1#alrt");
               	}else{
               	 
                   	header("location:index.php?c=0#alrt");
               	}
               }
               }
               ?>
            <form id="contactForm" method="post" enctype="multipart/form-data" >
               <div class="row align-items-stretch mb-5">
                  <div class="col-md-6">
                     <div class="form-group">
                        <select id="department" name="department" class="form-control" aria-label="Default select example" required>
                           <option selected>-- Select department --</option>
                           <option value="General Enquiry">General enquiry</option>
                           <option value="Accounting">Accounting</option>
                           <option value="Forex">Forex</option>
                           <option value="Kickstart">Kickstart</option>
                           <option value="Shipping">Shipping</option>
                           <option value="Tax Refunds">Tax Refunds</option>
                           <option value="investment card">investment card</option>
                           <option value="Visas">Visas</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <input class="form-control" id="firstname" name="firstname" type="text" placeholder="First Name *" required />
                     </div>
                     <div class="form-group">
                        <input class="form-control" id="lastname" name="lastname" type="text" placeholder="Last Name *" required />
                     </div>
                     <div class="form-group">
                        <input class="form-control" id="country" name="country" type="text" placeholder="Your Country *" required />
                     </div>
                     <div class="form-group">
                        <input class="form-control" id="email" type="email" name="email" placeholder="Email *" required />
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="callback" value="callback" id="callbackrequest">
                        <label class="form-check-label" for="flexCheckChecked" style="color:white;">
                        Plesae Call Me Back.
                        </label>
                     </div>
                     <div class="form-group mb-md-0">
                        <input class="form-control" id="phone" name="phone" type="tel" placeholder="TelePhone Number *" required />
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group form-group-textarea mb-md-0">
                        <textarea class="form-control" id="message" name="message" placeholder="How can we help you? *" required></textarea>
                     </div>
                     <div class="form-group form-group-textarea mb-md-0">
                        Upload Attachment:
                        <input type="file" class="form-control" id="fileattach" name="fileattach" placeholder="How can we help you? *" required />
                     </div>
                  </div>
               </div>
               <?php if(!empty($_GET["c"]) && $_GET["c"]==2){?>
               <div id="alrt" class=" alert alert-danger" id="error-message-alert" role="alert alert-danger">
                  Your file doesn't support , please choose right file Png , jpg , bmp , pdf only 
               </div>
               <?php } ?>
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
               <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="form-submit" name="info_submit" type="submit">Send Message</button></div>
            </form>
         </div>
      </section>
      <footer class="footer py-4">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-4 text-lg-start">Copyright &copy; Department Taxes&Commercial Transfers 2023</div>
               <div class="col-lg-4 my-3 my-lg-0"></div>
               <div class="col-lg-4 text-lg-end">
                  <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                  <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
               </div>
            </div>
         </div>
      </footer>
      <div class="mailicon"><a href="complaint.php" title="Report Service"><img src="assets/img/feedback.png" width="70" height="70" /></a></div>
      <div class="mailicon1"><a href="rateus.php" title=" Rate Our Service"><img src="assets/img/rating.png" width="70" height="70" /></a></div>
      <div class="myk-wa">
         <div class="myk-item" data-wanumber="447537132482" data-waname="Main Branch" data-wadivision="The main branch" data-waava="assets/user.png"></div>
         <!--<div class="myk-item" data-wanumber="441515289825" data-waname="Liverpool" data-wadivision="Transfers Branch" data-waava="assets/user.png"></div>-->
      </div>
      <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
         $(document).ready(function(){
         	$(".myk-wa").WAFloatBox();
         });
      </script>
      <script src="js/bootstrap.bundle.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="js/scripts.js"></script>
   </body>
</html>