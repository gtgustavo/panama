<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'support';

    protected $fillable = ['ticket_id', 'user_id', 'problem', 'answer', 'status'];

    public function ticket()
    {
        return $this->hasOne('App\Models\Support\Ticket', 'id', 'ticket_id');
    }

    public function client()
    {
        return $this->hasMany('App\Models\Credentials\User', 'id', 'user_id');
    }
}
