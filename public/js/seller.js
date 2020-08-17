$(document).ready(function(){
	//seller edit
	$("#btn-edit-seller-details").on("click", function(){
		$('#show--seller-details').addClass('d-none')
    	$('#edit--seller-details').removeClass('d-none')
	})
	$("#cancel-seller-edit--btn").on("click", function(){
		$('#show--seller-details').removeClass('d-none')
    	$('#edit--seller-details').addClass('d-none')
	})
	
})