var error_alert = Swal.mixin({
    toast: true,
    icon: 'error',
    title: 'General Title',
    animation: false,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

function validarEmail(value){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(value) ? true : false;
}

$('#iniciarSession').on('click', ()=>{
    login();
})

function login(){
    var email = $('#inputUserName').val(),
        pwd   = $('#inputPwd').val();

    if (!validarEmail(email) || email.length == 0) {
        $('#inputUserName').css('border-color', 'red');
    }else{
        $('#inputUserName').css('border-color', 'green');
    }
    if (pwd.length == 0) {
        $('#inputPwd').css('border-color', 'red')
    }else{
        $('#inputPwd').css('border-color', 'green')
    }

    if (validarEmail(email) && pwd.length > 0) {
        Swal.fire({
            title: 'Espere...',
            html: 'Verificando credenciales...',
            allowEscapeKey: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });

        $.ajax({
            type: "POST",
            url: baseURL + "verificar_credenciales",
            data: {
                correo: email,
                pwd: pwd
            },
            dataType: "json",
            success: function(rsp) {
                swal.close();
                if (rsp.length == 0) {
                    error_alert.fire({
                        title: "Verificar las credenciales ingresadas.",
                    });
                } else if (rsp.length > 0) {
                    if (rsp[0].estado == 1) {
                        if (rsp[0].id_rol == 1) {
                            location.href = baseURL + "usuarios";
                        }else{
                            location.href = baseURL + "welcome";
                        }
                    }else{
                        error_alert.fire({
                            title: "Su cuenta esta desactivada.",
                        });
                    }
                }
            },
            error: function() {
                $("#error_izi").iziModal({
                    title: "Error",
                    subtitle: '¡El correo o la contraseña es incorrecto!',
                    icon: 'fas fa-exclamation-triangle',
                    headerColor: '#e84335',
                    width: 400,
                    timeout: 5000,
                    transitionIn: 'comingIn',
                    transitionOut: 'comingOut',
                    onClosed: function() {
                        $('#error_izi').iziModal('destroy');
                    },
                });
                $('#error_izi').iziModal('open');
            }
        })
    }
    console.log(validarEmail(email));
}