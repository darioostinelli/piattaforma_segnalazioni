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
                
            });
}