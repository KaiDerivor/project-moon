<?php

namespace App\Services\Daily;

use App\Models\User;

class Service
{

   public function store($data)
   {

      $record = (array) json_decode($data['daily']);
      extract($record);
      $time=time();


      $user = User::find(auth()->user()->id);
      $user->forceFill(["daily->$time" => ['text' => $text, 'day' => $day]])->save();
      return ["$time"=>['text' => $text, 'day' => $day]];
   }
   public function delete($data)
   {
   }
   public function update($data)
   {
   }
}
