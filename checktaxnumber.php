<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Department Taxes&Commercial Transfers</title>
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
      <div class="container">
         <div class="container">

            <form method="post" style="width:50%;margin:auto">
               <h1 style="margin-top:20px;">Remittanc Office Includes Taxes <img src="flagbri.png" width="50" height="30" /></h1>
               <div id="errorMsg" class="alert alert-danger" role="alert">
                  Do you have a tax registration number?
               </div>
               <div class="form-group">
                  <label for="idCardNumber">ID card number</label>
                  <input type=text class="form-control" name="idno" id="idCardNumber">
               </div>
               <div class="form-group">
                  <label for="taxRegistrationNumber">Your tax Number</label>
                  <input type=text class="form-control" name="taxreg" id="taxRegistrationNumber">
               </div>
               <button type="submit" class="btn" name="btn_search" style="background-color:#ffc800;width:100%" id="getData">Check</button>
            </form>
			<?php 
			if(isset($_POST["btn_search"])){
				include("conn/conn.php");

				$wherestmt =  " ";
				$idnovar = clean_value($conf,$_POST["idno"]);
				$taxregvar = clean_value($conf,$_POST["taxreg"]);
				if(!empty($idnovar))
				 {
					$wherestmt .= " and Id_no = '".$idnovar."'" ; 
				 }
				 if(!empty($taxregvar)){
					$wherestmt .= " and taxreg = '".$taxregvar."'" ; 
				 }

				 $selall = "SELECT * FROM users, files  
				 			WHERE user_id = User_code  
							AND   User_active = '1' $wherestmt ";

			     $qrall = mysqli_query($conf , $selall) or die(mysqli_error($conf));
				 $count = mysqli_num_rows($qrall);

				 if($count == 0 )
				 {
					echo alert("error" , "Not Found" , "There is no records regarding this number ");
				 }
				 
		 
		?>
            <div class="form-row" style="margin-top:10px" id="cardsContaier">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th scope="col">Customer Name</th>
                        <th scope="col">ID card number</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Country</th>
                     </tr>
                  </thead>
                  <tbody>
					<?php while($rowsall = mysqli_fetch_array($qrall)){
						 $seldetails = "SELECT * FROM file_details where file_id = '".$rowsall["f_code"]."'";
						 $qrdet = mysqli_query($conf,$seldetails) or die(mysqli_error($conf)); 
						?>
                     <tr>
                        <td id="customerName"><?php echo $rowsall["User_fullname"]?></td>
                        <td id="CustomerId"><?php echo $rowsall["Id_no"]?></td>
                        <td id="phoneNum"><?php echo $rowsall["phone_number"]?></td>
                        <td id="country"><?php echo $rowsall["User_country"]?></td>
                     </tr>
					 <tr>
						<td colspan="4">
							<table class="table table-bordered">
								<?php while($rowdet = mysqli_fetch_array($qrdet)){?>
								<tr>
									<td><?=$rowdet["enterdate"]?></td>
									<td><?=$rowdet["comment"]?></td>
								</tr>
								<?php } ?>
							</table>
					 	<td>
						
					 </tr>
					 <?php } ?>
                  </tbody>
               </table>
            </div>
        <?php } ?>
         </div>
      </div>
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