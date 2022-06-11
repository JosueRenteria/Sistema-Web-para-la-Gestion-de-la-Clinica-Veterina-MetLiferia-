/* No funciona 'this' con funciones flecha https://tinyurl.com/yckmw9mh */
$(document).ready(() => {
    $('.fixed-action-btn').floatingActionButton();
    $('.tooltipped').tooltip();

    $(".icoEliminar").click(function() {
        let boleta = $(this).data("boleta");
        Swal.fire({
            title: '¿Está seguro de eliminar al Usuario: ' + boleta,
            icon: "question",
            showDenyButton: true,
            confirmButtonText: 'SÍ',
            denyButtonText: 'NO',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "./eliminar_.php",
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
                                if (AX.cod == 1) window.location.href = "./../inicio.html";
                            }
                        });
                    }
                });
            }
        });
    });

    $(".icoEditar").click(function() {
        let boleta = $(this).attr("data-boleta");
        window.location.href = "./editar.php?boleta=" + boleta;
    });

    $(".icoPDF").click(function() {
        let boleta = $(this).attr("data-boleta");
        window.location.href = "./pdf.php?boleta=" + boleta;
    });
});