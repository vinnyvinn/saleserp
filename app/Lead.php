<?php

namespace Dsc;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(Lead_Status::class, 'status_id');
    }

}
