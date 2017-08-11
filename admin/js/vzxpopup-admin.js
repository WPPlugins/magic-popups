var $ = jQuery;
$(document).ready(function(){
	
	$("#popupdisplay").on("change", function(){
		popupdisplay = $("#popupdisplay").val();
		if(popupdisplay =="onload"){
			$("#waitspan").css("display","none");
			$("#timein").css("display","none");
		}
		if(popupdisplay =="wait"){
			$("#waitspan").css("display","block");
			$("#timein").css("display","block");
		}
	});
	$("#popuptype").on("change", function(){
	
	popuptype = $("#popuptype").val();
		if(popuptype==1){
			$("#ministyle").hide();
		}
		if(popuptype==2){
			$("#ministyle").show();
		}
	});
	$("#submitbutton").on("click", function(e){
		e.preventDefault();
		popuptype = $("#popuptype").val();
		popupstyle = $("#popupstyle").val();
		popuppost = $("#popuppost").val();
		popupdisplay = $("#popupdisplay").val();
		popupwait = $("#waitfor").val();
		if(popuptype == 1 && popupdisplay == "onload"){
		var shortcode="";
		shortcode+="[magicpopup";
		shortcode+=" type='"+$('#popuptype').val()+"'";
		shortcode+=" data='"+$('#popuppost').val()+"'";
		shortcode+=" display='"+$('#popupdisplay').val()+"'";
		shortcode+="]";
		$("#shorttext").css("display","block");
		$('#shorttext').val(shortcode);
		}
		else if(popuptype == 1 && popupdisplay == "wait"){
		var shortcode="";
		shortcode+="[magicpopup";
		shortcode+=" type='"+$('#popuptype').val()+"'";
		shortcode+=" data='"+$('#popuppost').val()+"'";
		shortcode+=" display='"+$('#popupdisplay').val()+"("+$('#waitfor').val()+")'";
		shortcode+="]";
		$("#shorttext").css("display","block");
		$('#shorttext').val(shortcode);
		}
		
		else if(popuptype == 2 && popupdisplay == "onload"){
		var shortcode="";
		shortcode+="[magicpopup";
		shortcode+=" type='"+$('#popuptype').val()+"'";
		shortcode+=" style='"+$('#popupstyle').val()+"'";
		shortcode+=" data='"+$('#popuppost').val()+"'";
		shortcode+=" display='"+$('#popupdisplay').val()+"'";
		shortcode+="]";
		$("#shorttext").css("display","block");
		$('#shorttext').val(shortcode);
		}
		else{
		var shortcode="";
		shortcode+="[magicpopup";
		shortcode+=" type='"+$('#popuptype').val()+"'";
		shortcode+=" style='"+$('#popupstyle').val()+"'";
		shortcode+=" data='"+$('#popuppost').val()+"'";
		shortcode+=" display='"+$('#popupdisplay').val()+"("+$('#waitfor').val()+")'";
		shortcode+="]";
		$("#shorttext").css("display","block");
		$('#shorttext').val(shortcode);
		}
	});

});