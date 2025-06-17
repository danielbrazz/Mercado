function trata_alerta(tipo,msg){
//tipo 1 alerta
//tipo 2 success

switch(tipo){
    case 1:
        $("#alert").show();
        $("#alert").text(msg);
    break;
    case 2:
        $("#success").show();
        $("#success").text(msg);
    break
}


}