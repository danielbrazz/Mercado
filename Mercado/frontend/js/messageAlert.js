
function trata_alerta(tipo, msg) {
    let alert;

    switch (tipo) {
        case 1:
            alert = $("#alert");
            break;
        case 2:
            alert = $("#success");
            break;
    }

    if (alert) {
        
        alert.text(msg).fadeIn();//animação para aparecer gradualmente

     
        setTimeout(() => {
            alert.fadeOut();//some com animação em 2 segundos.
        }, 2000);
    }
}