<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config.php");
require_once($_SERVER['DOCUMENT_ROOT']."/functions.shared.php");
require_once("functions.php");



$inputJSON = file_get_contents('php://input');
$inputObj = json_decode( $inputJSON );

if ( isset($inputObj->message->text) ){
    botSendMessage('👋 Привет! ', $inputObj->message->from->id);
    botSendMessage('Это прототип бота для расчета стоимости хранения и оформления заявки. Здесь пока не оформляются настоящие заказы и не производится настоящий расчет.', $inputObj->message->from->id);
    botSendMessage('Если вы заинтересованы во внедрении такого бота, напишите @stumarkin', $inputObj->message->from->id);
    botSendMessage('Приступим?', $inputObj->message->from->id, '', [[Array("text" => "Расчитать стоимость хранения", "web_app" => Array("url" => "https://qbbox.tmweb.ru/bot/webapp/public/") )]]);
} 

$strLog = '"'.date(DATE_ATOM, time()).'": {'.PHP_EOL
    .'"inputRequest": '.$inputJSON.','.PHP_EOL
    .'"outputBotApiRequest": {"url": "'.cutToken($outputBotApiRequest).'"},'.PHP_EOL
    .'},'.PHP_EOL;

error_log( $strLog , 3, "log/all_requests_".date("Y-m-d").".log");
?>