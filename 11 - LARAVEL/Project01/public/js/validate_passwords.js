$("form").on("submit", function() {
	// do validation here
	if($("#password1").val() != $("#password2").val()) {
		alert($('meta[name=passwords_not_match]').attr("content"));
		return false;
	}
});