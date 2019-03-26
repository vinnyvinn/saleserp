<?php

namespace Dsc;

use Dsc\Account;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    //
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function accounts()
    {
        return $this->belongsTo(Account::class, 'user_id');
    }
}
