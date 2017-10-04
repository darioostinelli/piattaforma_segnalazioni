function toggleLogin(){
    $('#login').toggle();
    $('#pageBody').toggle();
}

function login(){
    loginError();
    if($('#username').val() == '')
        loginError('Inserire nome utente');
    else if($('#password').val() == '')
        loginError('Inserire password');
}

function loginError(error = ''){
    $('#loginInfo').text(error);
}