function order_call(data){	
	var name = data.phone_name_modal.value;
	var tel = data.phone_phone_modal.value;
	if (name == '' || tel == ''){
		if(name == ''){
			jQuery('#modal-1 input#phone_name_modal').attr('placeholder','Введите имя');
			jQuery('#modal-1 input#phone_name_modal').css({"border":"1px solid red"});
			jQuery('#modal-1 input#phone_name_modal').focus();
		}
		else{
			jQuery('#modal-1 input#phone_name_modal').css({"border":"1px solid #ccc"});
		}
		if(tel == ''){
			jQuery('#modal-1 input#phone_phone_modal').attr('placeholder','Введите телефон');
			jQuery('#modal-1 input#phone_phone_modal').css({"border":"1px solid red"});
			jQuery('#modal-1 input#phone_phone_modal').focus();
		}
		else{
			jQuery('#modal-1 input#phone_phone_modal').css({"border":"1px solid #ccc"});
		}
		return false;
	}
	else if((/^((8|\+3)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/).test(tel) == false){
		jQuery('#modal-1 input').css({"border":"1px solid #ccc"});
		jQuery('#modal-1 input#phone_phone_modal').val('');
		jQuery('#modal-1 input#phone_phone_modal').attr('placeholder','Некорректный номер телефона');
		jQuery('#modal-1 input#phone_phone_modal').css({"border":"1px solid red"});
		jQuery('#modal-1 input#phone_phone_modal').focus();
		return false;
	}
	else{
		jQuery('#modal-1 input').css({"border":"1px solid #ccc"});
		jQuery('#modal-1 input').val('');
		jQuery('#modal-1 input#phone_name_modal').attr('placeholder','Ваше имя');
		jQuery('#modal-1 input#phone_phone_modal').attr('placeholder','Ваш телефон');
		//console.log(jQuery('#call_name').attr('value'));
		$.post('http://ifilters.by/handler_call.php',{name:name, tel:tel},thanks_call(),'json');
	}
	function thanks_call(){
		jQuery('#modal-1').hide();
		jQuery('#modal-2').show();
		setTimeout(function () {
			jQuery('#modal-2').fadeOut(800);
			jQuery('.modal-backdrop.in').hide();
		}, 3000);
	}	
}
function order_call_footer(data){	
	var name = data.phone_name.value;
	var tel = data.phone_phone.value;
	if (name == '' || tel == ''){
		if(name == ''){
			jQuery('#form_footer input#phone_name').attr('placeholder','Введите имя');
			jQuery('#form_footer input#phone_name').css({"border":"1px solid red"});
			jQuery('#form_footer input#phone_name').focus();
		}
		else{
			jQuery('#form_footer input#phone_name').css({"border":"1px solid #ccc"});
		}
		if(tel == ''){
			jQuery('#form_footer input#phone_phone').attr('placeholder','Введите телефон');
			jQuery('#form_footer input#phone_phone').css({"border":"1px solid red"});
			jQuery('#form_footer input#phone_phone').focus();
		}
		else{
			jQuery('#form_footer input#phone_phone').css({"border":"1px solid #ccc"});
		}
		return false;
	}
	else if((/^((8|\+3)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/).test(tel) == false){
		jQuery('#form_footer input').css({"border":"1px solid #ccc"});
		jQuery('#form_footer input#phone_phone').val('');
		jQuery('#form_footer input#phone_phone').attr('placeholder','Некорректный номер телефона');
		jQuery('#form_footer input#phone_phone').css({"border":"1px solid red"});
		jQuery('#form_footer input#phone_phone').focus();
		return false;
	}
	else{
		jQuery('#form_footer input').css({"border":"1px solid #ccc"});
		jQuery('#form_footer input').val('');
		jQuery('#form_footer input#phone_name').attr('placeholder','Ваше имя');
		jQuery('#form_footer input#phone_phone').attr('placeholder','Ваш телефон');
		//console.log(jQuery('#call_name').attr('value'));
		$.post('http://ifilters.by/handler_call.php',{name:name, tel:tel},thanks_call(),'json');
		
	}
	function thanks_call(){
		jQuery('#modal-1').hide();
		jQuery('#modal-2').show();
		setTimeout(function () {
			jQuery('#modal-2').fadeOut(800);
			jQuery('.modal-backdrop.in').hide();
		}, 3000);
	}	
}

function order_request(data){	
	var name = data.request_name_modal.value;
	var tel = data.request_phone_modal.value;
	var email = data.request_email_modal.value;
	if (name == '' || tel == ''){
		if(name == ''){
			jQuery('#modal-3 input#request_name_modal').attr('placeholder','Введите имя');
			jQuery('#modal-3 input#request_name_modal').css({"border":"1px solid red"});
			jQuery('#modal-3 input#request_name_modal').focus();
		}
		else{
			jQuery('#modal-3 input#request_name_modal').css({"border":"1px solid #ccc"});
		}
		if(tel == ''){
			jQuery('#modal-3 input#request_phone_modal').attr('placeholder','Введите телефон');
			jQuery('#modal-3 input#request_phone_modal').css({"border":"1px solid red"});
			jQuery('#modal-3 input#request_phone_modal').focus();
		}
		else{
			jQuery('#modal-3 input#request_phone_modal').css({"border":"1px solid #ccc"});
		}
		return false;
	}
	else if((/^((8|\+3)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/).test(tel) == false){
		jQuery('#modal-3 input').css({"border":"1px solid #ccc"});
		jQuery('#modal-3 input#request_phone_modal').val('');
		jQuery('#modal-3 input#request_phone_modal').attr('placeholder','Некорректный номер телефона');
		jQuery('#modal-3 input#request_phone_modal').css({"border":"1px solid red"});
		jQuery('#modal-3 input#request_phone_modal').focus();
		return false;
	}
	else if((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/).test(email) == false && email!=''){
		jQuery('#modal-3 input').css({"border":"1px solid #ccc"});
		jQuery('#modal-3 input#request_email_modal').val('');
		jQuery('#modal-3 input#request_email_modal').attr('placeholder','Некорректный E-mail');
		jQuery('#modal-3 input#request_email_modal').css({"border":"1px solid red"});
		jQuery('#modal-3 input#request_email_modal').focus();
		return false;
	}
	else{
		jQuery('#modal-3 input').css({"border":"1px solid #ccc"});
		jQuery('#modal-3 input').val('');
		jQuery('#modal-3 input#request_name_modal').attr('placeholder','Ваше имя');
		jQuery('#modal-3 input#request_phone_modal').attr('placeholder','Ваш телефон');
		jQuery('#modal-3 input#request_email_modal').attr('placeholder','Ваш E-mail');
		//console.log(jQuery('#call_name').attr('value'));
		$.post('http://ifilters.by/handler_request.php',{name:name, tel:tel, email:email},thanks_call(),'json');
	}
	function thanks_call(){
		jQuery('#modal-3').hide();
		jQuery('#modal-2').show();
		setTimeout(function () {
			jQuery('#modal-2').fadeOut(800);
			jQuery('.modal-backdrop.in').hide();
		}, 3000);
	}	
}
function order_request_no_modal(data){	
	var name = data.request_name.value;
	var tel = data.request_phone.value;
	var email = data.request_email.value;
	console.log(tel);
	if (name == '' || tel == ''){
		if(name == ''){
			jQuery('#form_request2 input#request_name').attr('placeholder','Введите имя');
			jQuery('#form_request2 input#request_name').css({"border":"1px solid red"});
			jQuery('#form_request2 input#request_name').focus();
		}
		else{
			console.log(name);
			jQuery('#form_request2 input#request_name').css({"border":"1px solid #ccc"});
		}
		if(tel == ''){
			jQuery('#form_request2 input#request_phone').attr('placeholder','Введите телефон');
			jQuery('#form_request2 input#request_phone').css({"border":"1px solid red"});
			jQuery('#form_request2 input#request_phone').focus();
		}		
		else{
			console.log(tel);
			jQuery('#form_request2 input#request_phone').css({"border":"1px solid #ccc"});
		}
		return false;
	}
	else if((/^((8|\+3)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/).test(tel) == false){
			jQuery('#form_request2 input').css({"border":"1px solid #ccc"});
			jQuery('#form_request2 input#request_phone').val('');
			jQuery('#form_request2 input#request_phone').attr('placeholder','Некорректный номер телефона');
			jQuery('#form_request2 input#request_phone').css({"border":"1px solid red"});
			jQuery('#form_request2 input#request_phone').focus();
			return false;
		}
		else if((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/).test(email) == false && email!=''){
			jQuery('#form_request2 input').css({"border":"1px solid #ccc"});
			jQuery('#form_request2 input#request_email').val('');
			jQuery('#form_request2 input#request_email').attr('placeholder','Некорректный E-mail');
			jQuery('#form_request2 input#request_email').css({"border":"1px solid red"});
			jQuery('#form_request2 input#request_email').focus();
			return false;
		}
	else{
		//console.log(jQuery('#call_name').attr('value'));
		jQuery('#form_request2 input').css({"border":"1px solid #ccc"});
		jQuery('#form_request2 input').val('');
		jQuery('#form_request2 input#request_name').attr('placeholder','Ваше имя');
		jQuery('#form_request2 input#request_phone').attr('placeholder','Ваш телефон');
		jQuery('#form_request2 input#request_email').attr('placeholder','Ваш E-mail');
		$.post('http://ifilters.by/handler_request.php',{name:name, tel:tel, email:email},thanks_call(),'json');
	}
	function thanks_call(){
		jQuery('#modal-2').show();
		setTimeout(function () {
			jQuery('#modal-2').fadeOut(800);
			jQuery('.modal-backdrop.in').hide();
		}, 3000);
	}	
}
function order_request_no_modal2(data){	
	var name = data.request_name2.value;
	var tel = data.request_phone2.value;
	var email = data.request_email2.value;
	if (name == '' || tel == ''){
		if(name == ''){
			jQuery('#form_request input#request_name2').attr('placeholder','Введите имя');
			jQuery('#form_request input#request_name2').css({"border":"1px solid red"});
			jQuery('#form_request input#request_name2').focus();
		}
		else{
			jQuery('#form_request input#request_name2').css({"border":"1px solid #ccc"});
		}
		if(tel == ''){
			jQuery('#form_request input#request_phone2').attr('placeholder','Введите телефон');
			jQuery('#form_request input#request_phone2').css({"border":"1px solid red"});
			jQuery('#form_request input#request_phone2').focus();
		}
		else{
			jQuery('#form_request input#request_phone2').css({"border":"1px solid #ccc"});
		}
		return false;
	}
			else if((/^((8|\+3)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/).test(tel) == false){
			jQuery('#form_request input').css({"border":"1px solid #ccc"});
			jQuery('#form_request input#request_phone2').val('');
			jQuery('#form_request input#request_phone2').attr('placeholder','Некорректный номер телефона');
			jQuery('#form_request input#request_phone2').css({"border":"1px solid red"});
			jQuery('#form_request input#request_phone2').focus();
			return false;
		}
		else if((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/).test(email) == false && email!=''){
			jQuery('#form_request input').css({"border":"1px solid #ccc"});
			jQuery('#form_request input#request_email2').val('');
			jQuery('#form_request input#request_email2').attr('placeholder','Некорректный E-mail');
			jQuery('#form_request input#request_email2').css({"border":"1px solid red"});
			jQuery('#form_request input#request_email2').focus();
			return false;
		}
	else{
		jQuery('#form_request input').css({"border":"1px solid #ccc"});
		jQuery('#form_request input').val('');
		jQuery('#form_request input#request_name2').attr('placeholder','Ваше имя');
		jQuery('#form_request input#request_phone2').attr('placeholder','Ваш телефон');
		jQuery('#form_request input#request_email2').attr('placeholder','Ваш E-mail');
		//console.log(jQuery('#call_name').attr('value'));
		$.post('http://ifilters.by/handler_request.php',{name:name, tel:tel, email:email},thanks_call(),'json');
	}
	function thanks_call(){
		jQuery('#modal-2').show();
		setTimeout(function () {
			jQuery('#modal-2').fadeOut(800);
			jQuery('.modal-backdrop.in').hide();
		}, 3000);
	}	
}