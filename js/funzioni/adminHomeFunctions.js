function logout(){
    $.post('api/logout/logout.php',
           {logout: ''},
           function(){
                window.location.href = "index.html"; 
            });
}

function pubblicaNews(){
    window.location.href = "amministrazione/pubblicaNews.php";
}