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

    public function getBodyAttribute($value){
        $sentence = explode(' ', $value);
        $word = strip_tags($sentence[0]);
        $first_letter = ucwords($word[0]);
        $dropcap_first_letter = '<span class="dropcap-bg">'.$first_letter.'</span>';
        $word = substr_replace($word, $dropcap_first_letter, 0, 1);
        $sentence[0] = $word;
        $body = implode(' ', $sentence);
        return $body;
    }

    public function scopeInbox($query)
    {
        return $query->whereIn('store',[1])->orderBy('created_at', 'dsc');
    }

    public function scopeUnread($query)
    {
        return $query->where(['status' => 0])->whereIn('store',[0,1])->orderBy('created_at', 'dsc');
    }

    public function scopeSent($query){
        return $query->where(['status' => 0])->whereIn('store',[2])->orderBy('created_at', 'dsc');
    }

    public function scopeDraft($query)
    {
        return $query->whereIn('store',[0])->orderBy('created_at', 'dsc');
    }

    public function scopeTrash($query)
    {
        return $query->whereNotNull('deleted_at')->orderBy('created_at', 'dsc');
    }

    public function scopeSentConversation($query, $startDate, $endDate){
        return $query->whereIn('store',[2])->whereBetween('created_at', [
            $startDate, $endDate
        ])->orderBy('created_at', 'dsc');
    }

    public function scopeReceivedConversation($query, $startDate, $endDate){
        return $query->whereIn('store',[1])->whereBetween('created_at', [
            $startDate, $endDate
        ])->orderBy('created_at', 'dsc');
    }

    public function sender(){
        return $this->belongsTo('\App\User', 'sender_id', 'id');
    }

    public function receiver(){
        return $this->belongsTo('\App\User', 'receiver_id', 'id');
    }
}
