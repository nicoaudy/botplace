<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['token_id', 'identifier', 'first_name', 'last_name', 'username', 'is_bot'];

    public function token()
    {
        return $this->belongsTo(Token::class);
    }
}
