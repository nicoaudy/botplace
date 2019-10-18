<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Actions\Telegram\GetUpdatesAction;
use App\DataTables\ContactDatatable;

class ContactController extends Controller
{
    public function index(ContactDatatable $datatable)
    {
        return $datatable->render('contact.index');
    }

    public function store(GetUpdatesAction $action)
    {
        $activity = $action->execute();

        foreach ($activity as $row) {
            $user = $row['message']['from'];
            $response = $this->checkIfExist($user['id']);

            if (!$response) {
                Contact::create([
                    'token_id'  => Token::active()->first()->id,
                    'identifier' => $user['id'],
                    'first_name' => $user['first_name'],
                    'last_name' => isset($user['last_name']) ? $user['last_name'] : null,
                    'username' => $user['username'],
                    'is_bot' => $user['is_bot']
                ]);
            }
        }

        flash('Sync data successfully')->success();
        return redirect()->back();
    }

    private function checkIfExist($identifier)
    {
        $contact = Contact::whereIdentifier($identifier)->first();
        return $contact ? true : false;
    }
}
