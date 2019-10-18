<?php

namespace App\Actions\Telegram;

use App\Models\Token;
use Telegram\Bot\Api;

class PostMessageAction
{
     public function execute($chatId, $text)
     {
          $telegram = new Api(Token::first()->value);
          $response = $telegram->sendMessage([
               'chat_id' => $chatId,
               'text' => $text,
          ]);

          return $response->getMessageId();
     }
}
