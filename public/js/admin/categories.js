/* toggle checkboxes */
$('#toggle-catids').click(function(){
	$('.catids').prop('checked', this.checked);
	getChecked();
});

/* View data of selected item using ajax */
$('.edit-view').click(function() {
	var link = $(this).attr('rel');
	$.ajax({
		url: link,
		dataType: 'json',
		type: 'get',
		success: function(data){
			$('#data-id').val(data.id);
			$('#data-cat').val(data.category);
			$('#data-main-cat').val(data.main_category);
		}
	});
});

/* Multiple Input forms */ 
$(function() {
    var appendTbl = $('#input-tbl');
    var i = $('#input-tbl tr').size() + 1;
    var main_cat = $('#main_cat_val').html();

	$('#btn-add-input').click(function(){
        $('<tr><td><input class="form-control" type="text" name="category[]" required /></td><td><select class="form-control" name="main_category[]">' + main_cat + '</select></td><td align="center"><a href="#" id="rem-input" class="text-warning btn-xs"><i class="glyphicon glyphicon-minus"></i></a></td></tr>').appendTo(appendTbl);
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

$('.catids').click(function(){ getChecked(); });

function getChecked()
{
	var len = $('.catids:checked').length;
	if (len > 0)
		$('#multi-delete').prop('disabled', false);
	else
		$('#multi-delete').prop('disabled', true);
}