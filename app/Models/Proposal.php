<?php

namespace App\Models;

use App\Models\Job;
use App\Models\User;
use App\Models\CoverLetter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id',
        'job_id',
        'validated',
    ];

    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->user_id = auth()->user()->id;
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function coverletter(){
        return $this->hasOne(CoverLetter::class);
    }
}
