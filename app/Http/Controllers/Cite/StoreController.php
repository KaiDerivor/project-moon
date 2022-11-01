<?php

namespace App\Http\Controllers\Cite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cite\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data=$request->validated();
        
        $this->service->store($data);
        return response(['Created'],200);
    }
    
}
