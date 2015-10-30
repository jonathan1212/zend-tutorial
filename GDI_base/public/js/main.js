/* Close closing dismissable alerts*/ 
$('.close').click(function(){
    	$('.alert').fadeOut('slow');
 });
 
 
 /*Confirm Logout
 $('#logout-btn').click(function(e){
	 e.preventDefault();
	if(confirm("Are you sure, you want to logout ?")){
		window.location.replace("auth/logout");
	}
	
 })*/

/*Disabled all sumit buttons 
$('input[type="submit"]').click(function(e){
	$('input[type="submit"]').attr('disabled','disabled');
	$( "form" ).submit();
});*/
