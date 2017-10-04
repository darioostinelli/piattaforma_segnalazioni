function toggleLogin(){
    $('#login').toggle();
    $('#pageBody').toggle();
}

function login(){
    loginError();
    var user = $('#username').val();
    var pass = $('#password').val();
    if(user === '')
        loginError('Inserire nome utente');
    else if(pass === '')
        loginError('Inserire password');
    else{
        performLogin(user, pass);
    }
}

function loginError(error = ''){
    $('#loginInfo').text(error);
}

function performLogin(user, pass){
    var data = {user: user, pass: pass};
    var jsonData = JSON.stringify(data);
    $.post('api/login/login.php',
           {login: jsonData},
           function(data){
                var decodedData = JSON.parse(data);
                if(decodedData.status == "error")
                    loginError(decodedData.error);
                else if(decodedData.status == "success")
                {
                    //TODO: implementare lato server controllo dei permessi e ritorno di una variabile che indichi se reindirizzare alla home admin
                }
            });
}