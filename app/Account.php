<?php

namespace Dsc;

use Illuminate\Database\Eloquent\Model;
use Dsc\User;
use Dsc\Contact;
use Dsc\Opportunity;
class Account extends Model
{
    //
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contacts()
    {
        return $this->belongsTo(Contact::class, 'account_id');
    }

    public function opportunities()
    {
        return $this->belongsTo(Opportunity::class, 'account_id');
    }
}
