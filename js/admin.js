$(document).ready(() => {
    $("form#formLogin").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid: (e) => {
            e.preventDefault();
            let boleta = $("input#boleta").val();
            let contrasena = $("input#contrasena").val();
            $.ajax({
                method: "POST",
                url: "./php/admin.php",
                data: { boleta: boleta, contrasena: contrasena },
                cache: false,
                success: (respAX) => {
                    let AX = JSON.parse(respAX);
                    let icono;
                    AX.cod == 1 ? icono = "success" : icono = "error";
                    Swal.fire({
                        title: "Administradores - MitLife",
                        html: AX.msj,
                        icon: icono,
                        confirmButtonText: "OK",
                        didDestroy: () => {
                            if (AX.cod == 1) window.location.href = "./php/priv-adm.php";
                        }
                    });
                }
            });
        }
    });
});