function destroy(id) {
	if (confirm('Você tem certeza?')) {
		location.href = "destroy.php?id=" + id;
	}
}

function logout() {
	if (confirm('Sair do sistema ?')) {
		location.href = ROOT+"logout.php";
	}
}


$(document).ready(function() {
	
	/* Validação dos formulários */
	$("form").on("submit", function() {
		
		$(this).find('p.errors').remove();
		errors = false;

		required_fields = $(this).find('.required');
		required_fields.each(function() {
			if($(this).val() == "") {
				$(this).addClass('error_field');
				$(this).parent().append("<p class='errors'>" + $(this).parent().find("label").text() + " é obrigatório.</p>");
				errors = true;
			} else {
				$(this).removeClass('error_field');
			}
		});
		
		password_fields = $(this).find('input[type="password"]');
		if(password_fields.length > 0) {
			if((password_fields[0].value != password_fields[1].value)) {
				password_fields.each(function() {
					$(this).addClass('error_field');
					$(this).parent().append("<p class='errors'>Os campos de senha devem sem iguais!</p>");
					errors = true;
				});
			}
		}
		
		if(!errors) {
			return true;
		} 
		
		return false;		
	});
});