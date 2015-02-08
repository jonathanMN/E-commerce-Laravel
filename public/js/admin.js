/* Delete Confirmation */
$('.confirm-delete').click(function(){
	var con = confirm('Are you sure to delete record?');
	return con;
});

/* Form Delete Confirmation */
$('.form-delete-confirm').submit(function(){
	var con = confirm('You are about to delete record/s?');
	return con;
});