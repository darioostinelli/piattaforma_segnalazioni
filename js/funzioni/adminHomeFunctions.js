function logout(){
    $.post('api/logout/logout.php',
           {logout: ''},
           function(){
                window.location.href = "index.html"; 
            });
}