var news = [{id : 1, evidenza : true, data : '18-10-2017', autore : 'admin', titolo : 'Titolo placeholder 1'},
            {id : 2, evidenza : false, data : '19-10-2017', autore : 'admin', titolo : 'Titolo placeholder 2'},
            {id : 3, evidenza : false, data : '17-10-2017', autore : 'admin', titolo : 'Titolo placeholder 3'},
            {id : 4, evidenza : false, data : '15-10-2017', autore : 'admin', titolo : 'Titolo placeholder 4'}];
//[{id, titolo, evidenza, data, autore}]
$().ready(function(){
    for(i = 0; i < news.length; i++){
        displayNews(news[i]);
    }
});

function displayNews(aNew){
    var html = generaHtml(aNew);
    if(aNew.evidenza){
        $('#evidenza').append(html);
    }
    else{
        $('#news').append(html);
    }
}

function generaHtml(aNew){
    var html = '<div class="aNew"><a href="displayNews.html?new=';
    html += aNew.id;
    html += '">';
    html += aNew.titolo;
    html += '</a>';
    html += '<span class="data">' + aNew.data + '</span>';
    html += '</div>';
    return html;
}