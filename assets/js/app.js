const feedbackEliminar = (alertObject, formColores = null, formEliminarColor = null) => {
    Swal.fire({
        title: alertObject.title,
        text: alertObject.text,
        icon: alertObject.icon,
        showCancelButton: alertObject.showCancelButton,
        confirmButtonColor: alertObject.confirmButtonColor,
        cancelButtonColor: alertObject.cancelButtonColor,
        confirmButtonText: alertObject.confirmButtonText
    }).then((result) => {
        if(result.isConfirmed) {
            if(alertObject.id === "eliminar-todo") {
                alertObject.eliminarTodo(formColores);
            }
            if(alertObject.id === "eliminar") {
                alertObject.eliminarColor(formEliminarColor);
            }
        }
    });
};

document.addEventListener('click', (e) => {
    const fuenteEvento = e.target;

    const alertObject = {
        id: '',
        title: '¡Advertencia!',
        text: '',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        idColor: '',
        eliminarTodo(formColores) {
            formColores["accion"].setAttribute("name", "eliminar-todo");
            formColores.submit();
        },
        eliminarColor(formEliminarColor) {
            formEliminarColor.submit();
        }
    };

    if(fuenteEvento.matches('#form-colores .btn.btn-danger')
    || fuenteEvento.matches('#form-colores-actualizar .btn.btn-danger')) {
        e.preventDefault();
        
        alertObject.id = "eliminar-todo";
        alertObject.text = "Está a punto de eliminar todos los registros de la lista ¿desea continuar?";

        let formColores = null;

        if(fuenteEvento.matches(".actualizar")) {
            formColores = document.querySelector("#form-colores-actualizar");
        }
        else {
            formColores = document.querySelector("#form-colores");
        }

        feedbackEliminar(alertObject, formColores, null);
    }

    if(fuenteEvento.matches('.form-eliminar .btn')
    || fuenteEvento.matches('.form-eliminar .btn .i')
    || fuenteEvento.matches('.form-eliminar .btn .i path')) {
        e.preventDefault();

        alertObject.id = "eliminar";
        alertObject.idColor = fuenteEvento.dataset.idColor;

        alertObject.text = `Está a punto de eliminar el color ${ alertObject.idColor } ¿desea continuar?`;

        feedbackEliminar(alertObject, null, document.querySelector(`#form-eliminar-${alertObject.idColor}`));
    }
});