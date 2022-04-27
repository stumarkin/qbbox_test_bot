<?php

function debugmessage($v) {
    echo "<pre style='border:1px solid blue'>";
    print_r($v);
    echo "</pre>";
}

function sqlQuery($sql) {
    $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_DBNAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function getDateTimeNow ($format = 'Y-m-d\TH:i:s.u'){
    $d = new DateTime('NOW');
    return $d->format($format);
}

function botSendMessage($text, $chat_id, $parse_mode='', $inline_keyboard = false, $keyboard = false ){

    $url = "https://api.telegram.org/bot".BOT_TOKEN."/sendMessage";
    $data = array(
        'chat_id' => $chat_id, 
        // 'protect_content' => true, 
        'text' => $text,
        'disable_web_page_preview' => false
    );
    if ( $parse_mode!=''){ $data['parse_mode'] = $parse_mode; }
    if ( $inline_keyboard ){ $data['reply_markup'] = json_encode( array( "inline_keyboard" => $inline_keyboard ) ); }
    if ( $keyboard ){ $data['reply_markup'] = json_encode( array( "keyboard" => $keyboard ) );}
    // debugmessage(http_build_query($data));
    // debuglog ("tg_send_message_query", http_build_query($data));
    $fields_string = http_build_query($data);

    $ch = curl_init(); //open connection
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); //So that curl_exec returns the contents of the cURL; rather than echoing it

    $result = curl_exec($ch);
    return $result;
}


?>