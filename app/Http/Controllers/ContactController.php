<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Telegram\GetUpdatesAction;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $contact = Contact::when($keyword, function ($query) use ($keyword) {
            $query->where('identifier', 'LIKE', "%$keyword%")
                ->orWhere('first_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('username', 'LIKE', "%$keyword%")
                ->orWhere('is_bot', 'LIKE', "%$keyword%");
        })->paginate($perPage);

        return view('contact.index', compact('contact'));
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
                    'last_name' => $user['last_name'],
                    'username' => $user['username'],
                    'is_bot' => $user['is_bot']
                ]);
            }
        }

        flash('Your data has been created')->success();
        return redirect()->back();
    }

    private function checkIfExist($identifier)
    {
        $contact = Contact::whereIdentifier($identifier)->first();
        return $contact ? true : false;
    }
}
