$(document).ready(function(){
    $("#loginBtn").click(function(){
        $("#loginModal").modal();
    });
});
$(document).ready(function(){
    $("#signupBtn").click(function(){
    	$("#loginModal").modal('hide').data('bs.modal', null);
		$("#signupModal").modal();
    });
});
