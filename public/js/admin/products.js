$('#toggle-checks').click(function(){
	$('.p_id').prop('checked', this.checked);
	getChecked();
});

$('.p_id').click(function(){ getChecked(); });

function getChecked()
{
	var len = $('.p_id:checked').length;
	if (len > 0)
		$('#multi-delete').prop('disabled', false);
	else
		$('#multi-delete').prop('disabled', true);
}

$('.edit-product').click(function(){
	var link = $(this).attr('rel');
	$.ajax({
		url: link,
		type: 'get',
		dataType: 'json',
		success:function(data){
			$('#data-id').val(data.id);
			$('#data-category').val(data.category_id);
			$('#data-brand').val(data.brand_id);
			$('#data-product').val(data.name);
			$('#data-desc').val(data.description);
			$('#data-qty').val(data.quantity);
			$('#data-cost').val(data.unit_cost);
		}
	});
});