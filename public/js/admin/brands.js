/* Toggle checkboxes */
$('#toggle-check').click(function(){
	$('.brand-ids').prop('checked', this.checked);
	getChecked();
});
$('.brand-ids').click(function(){ getChecked(); });
function getChecked()
{
	var len = $('.brand-ids:checked').length;
	if (len > 0)
		$('#multi-delete').prop('disabled', false);
	else
		$('#multi-delete').prop('disabled', true);
}

/* View Edit in modal */
$('.btn-edit-brand').click(function(){
	var link = $(this).attr('rel');
	$.ajax({
		url: link,
		type: 'get',
		dataType: 'json',
		success: function(data){
			$('#data-id').val(data.id);
			$('#data-brand').val(data.brand);
		}
	});
});

/* Multiple Input forms */ 
$(function() {
    var appendTbl = $('#input-tbl');
    var i = $('#input-tbl tr').size() + 1;
    var main_cat = $('#main_cat_val').html();

	$('#btn-add-input').click(function(){
        $('<tr><td><input class="form-control" type="text" name="brand[]" required /></td><td align="center"><a href="#" id="rem-input" class="text-warning btn-xs"><i class="glyphicon glyphicon-minus"></i></a></td></tr>').appendTo(appendTbl);
        i++;
        return false;
	});
    
    $(document).on('click','#rem-input', function () {
        if (i > 2) {
            $(this).parents('tr').remove();
            i--;
        }
        return false;
    });
});