<?php

namespace App\Services\Dream;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

// use App\Models\User;
// use DateTime;

// use function GuzzleHttp\json_encode;

class Service
{
   public function store($data)
   {
      $data = (array) json_decode($data);

      $category = array_keys($data)[0];
      $aim = $data[$category];
      $time = time();

      $user = User::find(auth()->user()->id);
      // dd(["$category->$time" => ['aim' => $aim, 'isFinished' => false, 'isInTrash' => false]]);
      $user->forceFill(["$category->$time" => ['aim' => $aim, 'isFinished' => false, 'isInTrash' => false]])->save();
      return json_encode(["$time" => ['aim' => $aim, 'isFinished' => false, 'isInTrash' => false]]);
   }
   public function update($data)
   {
      $data = (array) json_decode($data['dreams']);
      $user = User::find(auth()->user()->id);
      foreach ($data as $aim => $value) {
         foreach ($value as $id => $arr) {
            // dd($arr,$id,$aim);
            $user->forceFill(["$aim->$id" => $arr])->save();
            break;
         }
      }
   }
   public function delete($data)
   {
      $data = (array) json_decode($data);
      $aim = array_keys($data)[0];
      $id = array_keys((array)$data[$aim])[0];
      $user = User::find(auth()->user()->id);

      $task = ($user[$aim]);
      unset($task[$id]);
      $user->update([$aim => $task]);
   }
}
