function destroy(id) {
	if (confirm('Voc� tem certeza?')) {
		location.href = "destroy.php?id=" + id;
	}
}