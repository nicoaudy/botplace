<?php

namespace App\Http\Controllers;

use Telegram\Bot\Laravel\Facades\Telegram;

class SettingController extends Controller
{
    public function index()
    {
        Telegram::sendMessage([
            'chat_id' => '280560002',
            'text' => 'Something'
        ]);

        // $response = Telegram::getMe();

        // $botId = $response->getId();
        // $firstName = $response->getFirstName();
        // $username = $response->getWebhookUpdates();

        dd($response = Telegram::getUpdates());
    }
}
