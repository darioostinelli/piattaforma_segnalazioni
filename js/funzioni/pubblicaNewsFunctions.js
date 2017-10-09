function logout(){
    $.post('../api/logout/logout.php',
           {logout: ''},
           function(){
                window.location.href = "/index.html"; 
            });
}

$().ready(function(){
    $('textarea').text('');
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