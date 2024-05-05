function confirmacion(event) {
	if (confirm("¿Está segur@ de eliminar su usuario?")) {
		return true;
	} else {
		event.preventDefault();
	}
}

let enlace_borrado_usuario = document.querySelectorAll("#eliminar_usuario");

for (var i = 0; i < enlace_borrado_usuario.length; i++) {
	enlace_borrado_usuario[i].addEventListener('click', confirmacion);
}