<?php
include('conn/conn.php');
$email = $_POST['email'];
$pass = $_POST['password'];

if(empty($email) && empty($pass) || empty($email) || empty($pass) ){

   header('Location: login.html');

}

$matchmail = 'trans_admin';
$matchpass = '0b6cb5ef75b3fad747f522627fd1291f';// TransferFirst2000


if($matchmail != $email && $matchpass != md5($pass) || $matchmail != $email || $matchpass != md5($pass) ){
	 header('Location: login.html');
}else{
?>

 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>LEADS </title>
    <style type="text/css">
		  @media print {
		  * {
		    display: none;
		  }
		  #printableTable {
		    display: block;
		  }
		}

body {

direction:rtl;
}
    </style>
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  		<div class="col-md-12 col-sm-12">
  			<h3 class="text-center mt-5 mb-5">LEADS</h3>
  			<button type="button" class="btn btn-primary btn-sm p-3 mb-5" onclick="exportTableToExcel('tblData')">Export CSV</button>
            <button type="button" class="btn btn-secondary btn-sm p-3 mb-5" onclick="printDiv()">Print</button>
            <a href="login.html" type="button" class="btn btn-secondary btn-sm p-3 mb-5">Logout</a>
            <div  id="printableTable">
  			<table class="table table-hover table-bordered" id="tblData">
			  <thead>
			    <tr>
					<th scope="col">الصورة</th>
					<th scope="col">القسم</th>
					<th scope="col">الاسم الاول</th>
        	        <th scope="col">الاسم الاخير</th>
                    <th scope="col">الدولة</th>
                    <th scope="col">البريد</th>
                    <th scope="col">الهاتف</th>
                    <th scope="col">الرسالة</th>
                   

                     <th scope="col">التاريخ</th>
			    </tr>
			  </thead>
			  <tbody>
<?php       
$sql = "SELECT * FROM info";
$result =  mysqli_query($conf,$sql) or die(mysqli_error($conf));
$counter =0;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
  
          echo"<tr>
                <td><img src='".$row["photo"]."' width='100'  height='100' /></td>
                <td>".$row['department']."</td>
                 <td>".$row['firstname']."</td>
                 <td>".$row['lastname']."</td>
                 <td>".$row['country']."</td>
                 <td>".$row['email']."</td>
                 <td>".$row['phone']."</td>
                 <td>".$row['message']."</td>
  
                <td>".$row['enterdate']."</td>
              </tr>";
    }
} else {
    echo "No data available";
}
 
?> 
 
			  </tbody>
			</table>
			  <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
		 </div>
  		</div>
  	   </div>
  	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
	function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}

       function printDiv() {
         window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
       }
</script>
  </body>
</html>

<?php

}

?>