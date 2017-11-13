function logout(){
    $.post('../api/logout/logout.php',
           {logout: ''},
           function(){
                window.location.href = "/index.html"; 
            });
}

$().ready(function(){
    $('textarea').text('');
    $('.textAreaContainer textarea').keyup(function(event){
		if(event.keyCode == 13){
        	appendBr();
		}
	});
    $('#title , textarea').focus(function(){
        $('#title , textarea').css("border","1px solid grey");
    });
    
});

function bold(){
    appendTag('b');
}

function italic(){
    appendTag('i');
}

function underline(){
    appendTag('u');
}
function titolo(tipo){
    appendTag('h'+tipo);
}
function appendTag(tag){
    var textarea = $('.textAreaContainer textarea');
    var htmlTag = '<' + tag + '></' + tag + '>';
    textarea.focus();
    textarea.val(function(){
        return textarea.val() + htmlTag;
    });
    textarea.selectRange(textarea.val().length - (3 + tag.length));
}

function appendBr(){
    var textarea = $('.textAreaContainer textarea');
    textarea.focus();
    textarea.val(function(){
        return textarea.val() + '<br>';
    });
}
function preview(){
    if($('#btnPreview').text() == "Preview"){
        $('#btnPreview').text('Editor');
    }
    else{
         $('#btnPreview').text('Preview');
    }
    $('.textAreaContainer').toggle();
    $('#preview').toggle();
    var prev = '<h1>' + $('#title').val() + '</h1>';
    prev += $('.textAreaContainer textarea').val();
    $('#preview').html(prev);
}
$.fn.selectRange = function(start, end) {
    if(end === undefined) {
        end = start;
    }
    return this.each(function() {
        if('selectionStart' in this) {
            this.selectionStart = start;
            this.selectionEnd = end;
        } else if(this.setSelectionRange) {
            this.setSelectionRange(start, end);
        } else if(this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
    });
};


function pubblica(){
    if($('#title').val() == ""){
        $('#title').css("border","2px solid red");
        return;
    }
    if($('.textAreaContainer textarea').val() == ""){
        $('.textAreaContainer textarea').css("border","2px solid red");
        return;
    }
    sendNew();
}

function sendNew(){
    var evidenza = $("#evidenza").is(':checked') ? 1 : 0;
    var obj = {titolo: $('#title').val(), testo : $('textarea').val(), evidenza : evidenza};
    $.post(
        "../api/news/scrivi.php",
        {notizia : JSON.stringify(obj)},
        function(data){
            console.log(data);
        });
}


