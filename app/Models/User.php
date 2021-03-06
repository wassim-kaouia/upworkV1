<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Role;
use App\Models\Proposal;
use App\Models\Conversation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Job::class);
    }

    public function proposals(){

        return $this->hasMany(Proposal::class);
    }

    public function conversations(){
        
        return Conversation::where(function($query){
            return $query->where('to',$this->id)->orWhere('from',$this->id);
        });
    }

    public function getConversationsAttributes(){
        return $this->conversations->get();
    }
}
