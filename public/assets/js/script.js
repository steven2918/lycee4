
function ConfirmDelete(){

	var supr = confirm("Êtes-vous sûr de vouloir supprimer ?");
	if (supr)
		return true;
	else
		return false;

}

function ConfirmResponse(){

	var supr = confirm("Voulez-vous valider vos réponses ?");
	if (supr)
		return true;
	else
		return false;

}


$( "#check-all" ).click(function() {

	if ($(this).is(':checked') ) {

		$( "tbody input[type='checkbox']" ).prop('checked', true);
		id = $(this).attr('id');
		$('.is-check').val(true);

	}else{

		$( "tbody input[type='checkbox']" ).prop('checked', false);
		id = $(this).attr('id');
		$('.is-check').val('');
	}

});


$( "#select-action" ).change(function() {

	if ($(this).val() == 'delete') {

		$('form').attr('onsubmit', 'return ConfirmDelete()');
		
	}else{

		$('form').attr('onsubmit', '');

	}

});

