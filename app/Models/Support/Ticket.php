<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';

    protected $fillable = ['theme'];

    public function support()
    {
        return $this->hasMany('App\Models\Support\Support');
    }

    public function pendingCount()
    {
        return $this->support()
            ->selectRaw('ticket_id, count(*) as aggregate')
            ->where('status', 'PENDIENTE')
            ->groupBy('ticket_id');
    }

    public function respondedCount()
    {
        return $this->support()
            ->selectRaw('ticket_id, count(*) as aggregate')
            ->where('status', 'RESPONDIDO')
            ->groupBy('ticket_id');
    }

}
