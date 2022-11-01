<?php

namespace App\Services\Cite;

use App\Models\Cite;

class Service{
   public function store($data){
      $cite=(array)(json_decode($data['dreams']));
      Cite::firstOrCreate(['eng'=>$cite['eng']],$cite);
   }
   public function update($cite,$data){
      // dd($cite);
      $upd=(array)(json_decode($data['dreams']));
      
      $cite->update($upd);
   }
}