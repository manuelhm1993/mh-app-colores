const formColores = document.querySelector('#form-colores');

document.addEventListener('click', (e) => {
    const fuenteEvento = e.target;

    if(fuenteEvento.matches('#form-colores .btn.btn-danger')) {
        e.preventDefault();

        Swal.fire({
            title: '¡Advertencia!',
            text: "Está a punto de eliminar todos los registros de la lista ¿desea continuar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if(result.isConfirmed) {
                formColores["accion"].setAttribute("name", "eliminar-todo");
                formColores.submit();
            }
        });
    }
});