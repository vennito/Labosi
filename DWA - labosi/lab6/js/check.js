jQuery(function($){
	$("#tegobe1, #tegobe2").change(function () {
		if($("#tegobe1").is(":checked")){
			$("#tegobeinfo").css({"visibility": "visible", "display": "inline"});
		}else{
			$("#tegobeinfo").css({"visibility": "hidden", "display": "none"});
		}
	});
	$("#alergija1, #alergija2, #alergija3").change(function () {
		if($("#alergija1").is(":checked")){
			$("#alergijainfo").css({"visibility": "visible", "display": "inline"});
		}else{
			$("#alergijainfo").css({"visibility": "hidden", "display": "none"});
		}
	});
	$("#submit").click(function(){
		if($("#ime").val().length < 3){
			alert("Upisite ime!");
			return false;
		}else if($("#prezime").val().length < 3){
			alert("Upisite prezime!");
			return false;
		}else if($("#adresa").val().length < 8){
			alert("Upisite adresu!");
			return false;
		}else if($("#datum").val().length < 11){
			alert("Upisite datum roðenja!");
			return false;
		}else if($("#tegobe1").is(":checked") && $("#tegobeinfotext").val().length < 3){
			alert("Upisite tegobe!");
			return false;
		}else if($("#alergija1").is(":checked") && $("#alergijainfotext").val().length < 3){
			alert("Upisite alergije!");
			return false;
		}
	});
});