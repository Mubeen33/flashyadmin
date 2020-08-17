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
	
	//contact edit
	$("#btn-edit-contact-details").on("click", function(){
		$('#show--contact-details').addClass('d-none')
    	$('#edit--contact-details').removeClass('d-none')
	})
	$("#cancel-contact-edit--btn").on("click", function(){
		$('#show--contact-details').removeClass('d-none')
    	$('#edit--contact-details').addClass('d-none')
	})

	//Bank edit
	$("#btn-edit-bank-details").on("click", function(){
		$('#show--bank-details').addClass('d-none')
    	$('#edit--bank-details').removeClass('d-none')
	})
	$("#cancel-bank-edit--btn").on("click", function(){
		$('#show--bank-details').removeClass('d-none')
    	$('#edit--bank-details').addClass('d-none')
	})

	//director edit
	$("#btn-edit-director-details").on("click", function(){
		$('#show--director-details').addClass('d-none')
    	$('#edit--director-details').removeClass('d-none')
	})
	$("#cancel-director-edit--btn").on("click", function(){
		$('#show--director-details').removeClass('d-none')
    	$('#edit--director-details').addClass('d-none')
	})
})