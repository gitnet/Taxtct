$(document).ready(function() {
	$(document).on('click','#getData',function(e){
		e.preventDefault();
		emptyFunc();
		ajaxGetUser();
		ajaxGetUserStatus();
	});
	
	$(document).on('click','#getFileNumberData',function(e){
		e.preventDefault();
		emptyFunc();
		ajaxGetFileNumberUser();
		ajaxGetFileNumberUserStatus();
	});
	
	function emptyFunc(){
		$('#phoneNum').empty();
		$('#country').empty();
		$('#customerName').empty();
		$('#CustomerId').empty();
		$('#tracking-list').empty();	
		$('#alertMsg').empty();	
		$("#alertMsg").removeClass("alert alert-danger");		
	}
	// DO GET
	function ajaxGetUser(){
		$.ajax({
			contentType : "application/json",
			type : "GET",
			url : "getCustomer.php",
			//data: "casenum="+$("#caseNumber").val(),
			data: {id: $("#idCardNumber").val(), tax: $("#taxRegistrationNumber").val()},
			dataType: 'json',
			async:false,
        	cache: false,			
			success: function(result){
				if(result.length==0){
					$('#errorMsg').empty();
					$('#errorMsg').append("Your ID card number or Tax Registration Number not found !!");
				}
				
				$.each(result, function(index, val) {
					$('#cardsContainer').css("display", "block");
					$('#phoneNum').append(val.customerPhone);
					$('#country').append(val.customerCountry);
					$('#customerName').append(val.customerName);
					$('#CustomerId').append(val.customerId);
				});				
			},
			error : function(e) {
				console.log("ERROR: ", e);
			}
		});	
	}
	
	// DO GET
	function ajaxGetUserStatus(){
		$.ajax({
			contentType : "application/json",
			type : "GET",
			url : "getCustomerData.php",
			data: {id: $("#idCardNumber").val(), tax: $("#taxRegistrationNumber").val()},
			dataType: 'json',
			async:false,
        	cache: false,			
			success: function(result){
				if(result.length==0){
					$("#alertMsg").addClass("alert alert-danger");
					$("#alertMsg").append("The file number OR Tax Registration Number is incorrect or is being processed.");
				}				
				$.each(result, function (i, val) {
					let $row = $('<tr>'+
						'<th scope="row"><img src="imgs/logo1.png" width="30" height="30" /></th>'+
						'<td>'+val.date+'</td>'+
						'<td>'+val.message+'</td>'+		
						'<td id="'+val.id+'-file"></td>'												
					+'</tr>');
					$('#tracking-list').append($row);						 	
					if(val.file){
						$("#"+val.id+"-file").append('<a href="uploads/'+val.file+'" target="_blank"><img src="imgs/file.svg" width="25" height="25" class="img-responsive" alt="order-placed" /></a>');
					}	
				});
			},
			error : function(e) {
				console.log("ERROR: ", e);
			}
		});	
	}
	
	//File Number
	// DO GET
	function ajaxGetFileNumberUser(){
		$.ajax({
			contentType : "application/json",
			type : "GET",
			url : "getFileNumberCustomer.php",
			//data: "casenum="+$("#caseNumber").val(),
			data: {id: $("#idCardNumber").val(), tax: $("#taxRegistrationNumber").val()},
			dataType: 'json',
			async:false,
        	cache: false,			
			success: function(result){
				if(result.length==0){
					$('#errorMsg').empty();
					$('#errorMsg').append("Your ID card number or File Number not found !!");
				}
				
				$.each(result, function(index, val) {
					$('#cardsContainer').css("display", "block");
					$('#phoneNum').append(val.customerPhone);
					$('#country').append(val.customerCountry);
					$('#customerName').append(val.customerName);
					$('#CustomerId').append(val.customerId);
				});				
			},
			error : function(e) {
				console.log("ERROR: ", e);
			}
		});	
	}
	
	// DO GET
	function ajaxGetFileNumberUserStatus(){
		$.ajax({
			contentType : "application/json",
			type : "GET",
			url : "getFileNumberCustomerData.php",
			data: {id: $("#idCardNumber").val(), tax: $("#taxRegistrationNumber").val()},
			dataType: 'json',
			async:false,
        	cache: false,			
			success: function(result){
				if(result.length==0){
					$("#alertMsg").addClass("alert alert-danger");
					$("#alertMsg").append("The file number is incorrect or is being processed.");
				}				
				$.each(result, function (i, val) {
					let $row = $('<tr>'+
						'<th scope="row"><img src="imgs/logo1.png" width="30" height="30" /></th>'+
						'<td>'+val.date+'</td>'+
						'<td>'+val.message+'</td>'+		
						'<td id="'+val.id+'-file"></td>'												
					+'</tr>');
					$('#tracking-list').append($row);						 	
					if(val.file){
						$("#"+val.id+"-file").append('<a href="uploads/'+val.file+'" target="_blank"><img src="imgs/file.svg" width="25" height="25" class="img-responsive" alt="order-placed" /></a>');
					}	
				});
			},
			error : function(e) {
				console.log("ERROR: ", e);
			}
		});	
	}	

});