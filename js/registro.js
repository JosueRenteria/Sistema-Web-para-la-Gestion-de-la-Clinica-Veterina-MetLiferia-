$(document).ready(() => {
    $("form#formRegistro").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid: (e) => {
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: "./registro_.php",
                data: $("form#formRegistro").serialize(),
                cache: false,
                success: (respAX) => {
                    let AX = JSON.parse(respAX);
                    let icono;
                    AX.cod == 1 ? icono = "success" : icono = "error";
                    Swal.fire({
                        title: "Servidor - MitLife",
                        html: AX.msj,
                        icon: icono,
                        confirmButtonText: "OK",
                        didDestroy: () => {
                            if (AX.cod == 1) window.location.href = "./privado.php";
                        }
                    });
                }
            });
        }
    });
});