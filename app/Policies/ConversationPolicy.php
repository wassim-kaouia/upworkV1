<?php

namespace App\Policies;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

 
  

    public function view(User $user, Conversation $conversation)
    {
        if($user->id === $conversation->job->user_id){
            return true;
        }else{
            return $user->proposals->contains(function($value,$key) use ($conversation,$user){
                return $value['validated'] == 1 && $value['job_id'] == $conversation->job->id && $conversation->to = $user->id; 
            });
        }
    }


}
