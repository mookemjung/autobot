<?php

//echo "Hello everyone. Are you there?";
//echo "bla bla ...";
require_once('./vendor/autoload.php');

use \LINE\LINEBot\HTTPClient\CurlHTTPClient;

use \LINE\LINEBot;

use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

$channel_token = 'jra+Ecst9ju1KRTMl6KLCQl6uP7jag8mayRDQxQF68eWfUePohFI5xAB3Y12s8pziavYhr2nb50J5xC5Ie+SK3+llrDSmkHsrOOqsKceCJnVk9dUXXnrw+0SoRTolRNPzybUUG+9f1yE80sIqDrzYQdB04t89/1O/w1cDnyilFU=';

$channel_secret = '5c0528b536650228907f3e4cce3bde13';

// Get message from Line API
$content = file_get_contents('php://input');
$events = json_decode($content, true);

if(!is_null($events['events'])) {
	// Loop through each event
	foreach($events['events'] as $event) {
		// Get replyToken
		$replyToken = $event['replyToken'];
		$ask = $event['message']['text'];

		switch (strtolower($ask)) {
			case 'm':
				$respMessage = 'What sup man. Go away!!';
				break;
			case 'f':
				$respMessage = 'Love you lady.';
			default:
				$respMessage = 'What is your sex? M or F';
				break;
		}

		$HTTPClient = new CurlHTTPClient($channel_token);
		$bot = new LINEBot($HTTPClient, array('channelSecret' => $channel_secret));

		$TextMessageBuilder = new TextMessageBuilder($respMessage);
		$response = $bot->replyMessage($respMessage, $TextMessageBuilder);
		
	}
}






























