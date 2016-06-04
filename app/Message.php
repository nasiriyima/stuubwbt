<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    //

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['subject', 'body', 'receiver_id', 'sender_id', 'status', 'deleted_at'];

    public function scopeInbox($query)
    {
        return $query->whereIn('status',[0,1]);
    }

    public function scopeUnread($query)
    {
        return $query->whereIn('status',[0]);
    }

    public function scopeSent($query)
    {
        return $query->whereIn('status',[2]);
    }

    public function scopeDraft($query)
    {
        return $query->whereIn('status',[3,4]);
    }

    public function scopeUnsent($query)
    {
        return $query->whereIn('status',[4]);
    }

    public function scopeTrash($query)
    {
        return $query->where('deleted_at','=', 'NOT NULL');
    }

    public function sender(){
        return $this->belongsTo('\App\User', 'sender_id', 'id');
    }
}
