$(document).ready(function () {
    $('#tableClases').DataTable();

    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation-clases');

        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }else{
                event.preventDefault();
                nuevaClase();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
});

function nuevaClase() {
    Swal.fire({
        title: 'Espere...',
        html: 'Guardando los datos...',
        allowEscapeKey: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading()
        }
    });

    $.ajax({
        type: "POST",
        url: baseURL + "nuevaClase",
        data: {
            tipoclase: document.getElementById('tipoClases').value,
            cantidad: document.getElementById('CantidadHoraClase').value,
            montoapagar: document.getElementById('montopagar').value,
            fechapagar: document.getElementById('fechaPagar').value,
            comentario: document.getElementById('comentarios').value,
            aignadoA: document.getElementById('asignadoa').value,
            estadoPago: document.getElementById('estadoPago').value
        },
        dataType: "json",
        success: function (rsp) {
            swal.close();
            if (rsp) {
                Swal.fire(
                    'Creado!',
                    'El registro ha sido creado.',
                    'success'
                )
                location.reload();
            } else {
                Swal.fire(
                    'No se puedo crear el usuario',
                    'Al parecer sucedió algo al momento de crear, intente nuevamente',
                    'error'
                )
            }
        }
    })
}

function editarClase(idClase){
    Swal.fire({
        title: 'Espere...',
        html: 'Guardando los datos...',
        allowEscapeKey: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading()
        }
    });

    $.ajax({
        type: "POST",
        url: baseURL + "editarClase",
        data: {
            idClase: idClase,
            tipoclase: document.getElementById('tipoClases'+idClase).value,
            cantidad: document.getElementById('CantidadHoraClase'+idClase).value,
            montoapagar: document.getElementById('montopagar'+idClase).value,
            fechapagar: document.getElementById('fechaPagar'+idClase).value,
            comentario: document.getElementById('comentarios'+idClase).value,
            aignadoA: document.getElementById('asignadoa'+idClase).value,
            estadoPago: document.getElementById('estadoPago'+idClase).value
        },
        dataType: "json",
        success: function (rsp) {
            swal.close();
            if (rsp) {
                Swal.fire(
                    'Editando!',
                    'El registro ha sido editado.',
                    'success'
                )
                location.reload();
            } else {
                Swal.fire(
                    'No se puedo editar la clase',
                    'Al parecer sucedió algo al momento de editar, intente nuevamente',
                    'error'
                )
            }
        }
    })
}

function deleteClase(idClase) {
    Swal.fire({
        title: 'Estas seguro/a?',
        text: "No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si, eliminarlo!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Espere...',
                html: 'Eliminando registro...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
            $.ajax({
                type: "POST",
                url: baseURL + "eliminarClase",
                data: {
                    idClase: idClase
                },
                dataType: "json",
                success: function (rsp) {
                    swal.close();
                    if (rsp) {
                        Swal.fire(
                            'Eliminado!',
                            'El registro ha sido eliminado.',
                            'success'
                        )
                        location.reload();
                    } else {
                        Swal.fire(
                            'No se puedo eliminar el usuario',
                            'Al parecer sucedió algo al momento de eliminar, intente nuevamente',
                            'error'
                        )
                    }
                }
            })
        }
    })
}