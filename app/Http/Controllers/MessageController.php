<?php

namespace App\Http\Controllers;

use App\DataTables\MessageDatatable;
use App\Models\Token;
use Telegram\Bot\Api;

class MessageController extends Controller
{
    public function index(MessageDatatable $datatable)
    {
        // $telegram = new Api(Token::first()->value);
        // $query = $telegram->getUpdates();
        // dd(\Carbon\Carbon::parse($query[0]['message']['date'])->format('D M Y'));
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
