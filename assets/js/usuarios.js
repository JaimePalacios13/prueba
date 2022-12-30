

$(document).ready(function () {
    $('#tabledUsuarios').DataTable();

    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');

        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }else{
                event.preventDefault();
                nuevoUsuario();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
});

function nuevoUsuario(){
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
        url: baseURL + "nuevoUsuario",
        data: {
            nombres: document.getElementById('nombresUsuarioN').value,
            apellidos: document.getElementById('apellidosUsuarioN').value,
            email: document.getElementById('emailUsuarioN').value,
            estado: document.getElementById('estadoUsuarioN').value,
            rol: document.getElementById('rolUsuarioN').value,
            pwd: document.getElementById('passwordUsuarioN').value
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

function verPassword(){
    if ($('#passwordUsuarioN').attr("type") == 'text') {
        $("#passwordUsuarioN").attr("type", "password");
    }else{
        $("#passwordUsuarioN").attr("type", "text");
    }
}

function deleteUser(idUsuario) {
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
                url: baseURL + "eliminarUsuario",
                data: {
                    id_usuario: idUsuario
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

function editarDatos(idUsuario){
    Swal.fire({
        title: 'Espere...',
        html: 'Editando los datos...',
        allowEscapeKey: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading()
        }
    });

    $.ajax({
        type: "POST",
        url: baseURL + "editarUsuario",
        data: {
            idUsuario: idUsuario,
            nombres: document.getElementById('nombresUsuario'+idUsuario).value,
            apellidos: document.getElementById('apellidosUsuario'+idUsuario).value,
            email: document.getElementById('emailUsuario'+idUsuario).value,
            estado: document.getElementById('estadoUsuario'+idUsuario).value,
            rol: document.getElementById('rolUsuario'+idUsuario).value,
        },
        dataType: "json",
        success: function (rsp) {
            swal.close();
            if (rsp) {
                Swal.fire(
                    'Creado!',
                    'El registro ha sido actualizado.',
                    'success'
                )
                location.reload();
            } else {
                Swal.fire(
                    'No se puedo actualizar el usuario',
                    'Al parecer sucedió algo al momento de actualizar, intente nuevamente',
                    'error'
                )
            }
        }
    })
}