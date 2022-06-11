$(document).ready(() => {
    $("form#formRegistro").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid: (e) => {
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: "./citas_.php",
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
                            if (AX.cod == 1) window.location.href = "./citas.php";
                        }
                    });
                }
            });
        }
    });

    $(".icoEliminar").click(function() {
        let boleta = $(this).data("boleta");
        Swal.fire({
            title: '¿Está seguro de que deseas eleminar esta cita medica?',
            icon: "question",
            showDenyButton: true,
            confirmButtonText: 'SÍ',
            denyButtonText: 'NO',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "./eliminar_cita.php",
                    data: { boleta: boleta },
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
                                if (AX.cod == 1) window.location.href = "./citas.php";
                            }
                        });
                    }
                });
            }
        });
    });
});