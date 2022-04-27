<?php
function cutToken ( $str ) {
    return str_replace(BOT_TOKEN,"TOKEN",$str);
}

function escapeCharsInString ($str) {
    return str_replace(
        Array('_',  /*'*',  '[',  ']',  '(',  ')', */ '~',  '`',  '>',  '#',  '+',  '-',  '=',  '|',  '{',  '}',  '.',  '!'),
        Array('\_', /*'\*','\[', '\]', '\(', '\)', */ '\~', '\`', '\>', '\#', '\+', '\-', '\=', '\|', '\{', '\}', '\.', '\!'), 
        $str
    );
}

function tgEsc($str) { // escapeCharsInString alias
    return escapeCharsInString($str);
}

?>