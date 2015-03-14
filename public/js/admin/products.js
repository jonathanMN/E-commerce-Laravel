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
			var img_url = $('#data-image').attr('rel') + '/images/products/' + data.image;

			$('#data-id').val(data.id);
			$('#data-category').val(data.category_id);
			$('#data-brand').val(data.brand_id);
			$('#data-product').val(data.name);
			$('#data-desc').val(data.description);
			$('#data-qty').val(data.quantity);
			$('#data-cost').val(data.unit_cost);
			$('#data-image').attr('src', img_url);
			
			$('#change_img_link').attr('rel', img_url + '|' + data.id);
		}
	});
});

/*New*/
(function(){
	var URL = window.URL || window.webkitURL;
	var input = document.querySelector('#input_img');
	var preview = document.querySelector('#preview');

	input.addEventListener('change', function(){
		$('#preview').show();
		preview.src = URL.createObjectURL(this.files[0]);
	});
	preview.addEventListener('load', function(){
		URL.revokeObjectURL(this.src);
	});
})();

/* Edit */
(function(){
	var URL = window.URL || window.webkitURL;
	var input = document.querySelector('#input_img_edit');
	var preview = document.querySelector('#preview_edit');

	input.addEventListener('change', function(){
		preview.src = URL.createObjectURL(this.files[0]);
	});
	preview.addEventListener('load', function(){
		URL.revokeObjectURL(this.src);
	});
})();

$('#change_img_link').click(function(){
	var vals = $(this).attr('rel').split('|');
	var id = vals[1];
	var img = vals[0];
	$('#data-img-id').val(id);
	$('#preview_edit').attr('src', img);
});

/* Ajax image upload */
$('#change_img_form').submit(function(){
	$.ajax({
		url: $(this).attr('action'),
		dataType: 'json',
		cache: false,
        contentType: false,
        processData: false,
        data: new FormData(this),                         
        type: 'post',
		success:function(data){
			if (data.success)
				alert("Image Changed Success");
		}
	});
	return false;
});