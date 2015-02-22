$('#toggle-checks').click(function(){
	$('.u_id').prop('checked', this.checked);
	getChecked();
});

$('.u_id').click(function(){ getChecked(); });

function getChecked()
{
	var len = $('.u_id:checked').length;
	if (len > 0)
		$('#multi-delete').prop('disabled', false);
	else
		$('#multi-delete').prop('disabled', true);
}

$('#add-user-form').submit(function(){
	var vals = $(this).serialize();
	$.ajax({
		url: $(this).attr('action'),
		dataType: 'json',
		type: 'post',
		data: vals,
		success:function(data){
			if (data.username != "")
				$('#error_username').html(data.username);
			if (data.password != "")
				$('#error_password').html(data.password);
			if (data.re_password != "")
				$('#error_repassword').html(data.re_password);
			if (data.email != "")
				$('#error_email').html(data.email);

			if (data.success)
				window.location="";
		}
	});
	return false;
});

$('.edit-user').click(function(){
	var vals = $(this).attr('rel');
	$.ajax({
		url: vals,
		dataType: 'json',
		type: 'get',
		success:function(data){
			$('#data-username').val(data.username);
			$('#data-password').val('**********');
			$('#data-email').val(data.email);
		}
	});
});