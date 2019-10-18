<?php

namespace App\Actions\Telegram;

use App\Models\Token;
use Telegram\Bot\Api;

class GetUpdatesAction
{
     public function execute()
     {
          $token = Token::active()->first()->value;
          $activity = new Api($token);
          return $activity->getUpdates();
     }
}
