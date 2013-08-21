function destroy(id) {
	if (confirm('Você tem certeza?')) {
		location.href = "destroy.php?id=" + id;
	}
}