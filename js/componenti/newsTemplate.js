$().ready(function(){
    getNews();
});
function getNews(){
    $.get('api/news/leggi.php',
          {news : true},
          function(data){
                decodedData = JSON.parse(data);
                if(decodedData.status == "error"){
                    
                }
                else{
                    displayAllNews(decodedData);
                }
            });
}

function displayAllNews(news){
    cancellaCaricamento();
    for(i = 0; i < news.length; i++){
        displayNews(news[i]);
    }
    gestisciNessunaNew();
}
function displayNews(aNew){
    var html = generaHtml(aNew);
    if(aNew.evidenza == 1){
        $('#evidenza  .newContainer').append(html);
    }
    else{
        $('#news  .newContainer').append(html);
    }
}

function generaHtml(aNew){
    var html = '<div class="aNew"><a href="displayNews.php?new=';
    html += aNew.id;
    html += '">';
    html += aNew.titolo;
    html += '</a>';
    html += '<span class="data">' + aNew.data + '</span><br>';
    html += '<span class="autore">' + aNew.user_name + '</span>';
    html += '</div>';
    return html;
}

function cancellaCaricamento(){
    $('#evidenza .newContainer').text('');
    $('#news  .newContainer').text('');
}

function gestisciNessunaNew(){
    if($('#evidenza  .newContainer').text() === ''){
        $('#evidenza  .newContainer').text('Nessuna notizia disponibile');
    }
    if($('#news  .newContainer').text() === ''){
        $('#news  .newContainer').text('Nessuna notizia disponibile');
    }
}