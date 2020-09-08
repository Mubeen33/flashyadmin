function formSubmitWithFile(formID, url, type, form_data){
		$.ajax({
			url: url,
			data: new FormData(document.getElementById(formID)),
			method: type,
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#"+formID +" button[type=submit]").attr('disabled', true)
			},
			success: function(response){
				$("#"+formID +" button[type=submit]").attr('disabled', false)
				if (response.success === true) {
					$("#display--success--msg").removeClass('d-none')
					$("#display--success--msg .place-text").html((response.msg))
					
					if ($("#"+formID +" .preview--file").length) {
						$("#"+formID +" .preview--file").addClass('d-none')
					}
					$("#"+formID)[0].reset();
					$('html, body').animate({
	                    scrollTop: $("#display--success--msg").offset().top
	                }, 1000);

				}else{
					console.log(response);
					//alert("Something went wrong...")
					//window.location.reload(true)
				}
									
			},
			error: function (jqXHR, textStatus, errorThrown) {
				$("#"+formID +" button[type=submit]").attr('disabled', false)
				if (jqXHR.status === 422) {
                  	let string_to_obj = JSON.parse(jqXHR.responseText)
                  	//console.log(string_to_obj.field)
                  	if ($("input[name="+string_to_obj.field+"]").length) {
                  		$("input[name="+string_to_obj.field+"]").addClass('border-danger-alert');
                  		$("input[name="+string_to_obj.field+"]").siblings('.place-error--msg').html(string_to_obj.msg);

                  		if (string_to_obj.need_scroll === "yes") {
	                  		$('html, body').animate({
			                    scrollTop: $("input[name="+string_to_obj.field+"]").offset().top
			                }, 1000);
	                  	}
                  	}

                  	if ($("select[name="+string_to_obj.field+"]").length) {
                  		$("select[name="+string_to_obj.field+"]").addClass('border-danger-alert');
                  		$("select[name="+string_to_obj.field+"]").siblings('.place-error--msg').html(string_to_obj.msg);

                  		if (string_to_obj.need_scroll === "yes") {
	                  		$('html, body').animate({
			                    scrollTop: $("select[name="+string_to_obj.field+"]").offset().top
			                }, 1000);
	                  	}
                  	}


                  	if ($("textarea[name="+string_to_obj.field+"]").length) {
                  		$("textarea[name="+string_to_obj.field+"]").addClass('border-danger-alert');
	              		$("textarea[name="+string_to_obj.field+"]").siblings('.place-error--msg').html(string_to_obj.msg);

	              		if (string_to_obj.need_scroll === "yes") {
	                  		$('html, body').animate({
			                    scrollTop: $("textarea[name="+string_to_obj.field+"]").offset().top
			                }, 1000);
	                  	}
                  	}
                  	
                  	
                  	
                }else if (jqXHR.status === 500) {
                  	alert('Sorry\n'+ jqXHR.responseText)
                  	//window.location.reload(true)
                }else if (jqXHR.status === 404) {
                  	alert('Sorry\n'+ jqXHR.responseText)
                }else{
                  	alert('Sorry\n Something unknown problem')
                  	//window.location.reload(true)
                }

            },
            complete:function(){
            	$("#"+formID +" button[type=submit]").attr('disabled', false)
            }
        });
}

//remove form validation error
function removeErrorLevels(getThis, type){
	if (type === "input") {
		getThis.removeClass('border-danger-alert')
		getThis.siblings('.place-error--msg').html('')
		return;
	}

	if (type === "id__") {
		getThis.removeClass('border-danger-alert')
		getThis.siblings('.place-error--msg').html('')
		return;
	}
	console.log('yes outside')
	
}