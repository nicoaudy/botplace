<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Telegram\Bot\Api;
use App\DataTables\MessageDatatable;

class MessageController extends Controller
{
    public function index(MessageDatatable $datatable)
    {
        return $datatable->render('message.index');
    }

    public function store()
    {
        $telegram = new Api(Token::first()->value);
        $response = $telegram->sendMessage([
            'chat_id' => '280560002',
            'text' => 'Hi From me'
        ]);

        dd($response->getMessageId());
    }
}
