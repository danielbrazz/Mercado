$(document).ready(function() {    
    $('#btn_acess').click(function(e) {        

        const email = $('#emailInput').val();
        const senha = $('#passwordInput').val();

        // let data = {email: email, password: senha};
        let formData = new FormData();
        formData.append('email', email);
        formData.append('password', senha);
        url_atual = window.location.href;
        fetch('http://localhost/Estudo php/Mercado/Mercado/Controller/LoginController.php', {

        method: 'POST',        
        body: (formData),
        })
         .then(response => response.json()) // pode usar .json() se o PHP responder em JSON
        .then(data => {
            console.log(data);
            if(data.success == true){            
                window.location.href = './frontend/Telas/inicio.php'
            }else{
                trata_alerta(1,data.msg);
            }                        
        })
        .catch(error => console.error('Erro:', error));
        
         
    });
});
