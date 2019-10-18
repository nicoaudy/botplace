<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\DataTables\MessageDatatable;
use App\Actions\Telegram\PostMessageAction;

class MessageController extends Controller
{
    public function index(MessageDatatable $datatable)
    {
        return $datatable->render('message.index');
    }

    public function create()
    {
        $contact = Contact::activeToken()->get()->pluck('username', 'identifier');
        return view('message.create', compact('contact'));
    }

    public function store(PostMessageAction $post)
    {
        $response = $post->execute(request('chat_id'), request('text'));
        flash('Send message successfully, with message id ' . $response)->success();
        return redirect('/message');
    }
}
