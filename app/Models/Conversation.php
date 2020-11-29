<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'job_id',
    ];


    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }

    
}
