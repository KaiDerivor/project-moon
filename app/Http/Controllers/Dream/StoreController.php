<?php

namespace App\Http\Controllers\Dream;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dream\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data=$request->validated();
        $response = $this->service->store($data['dreams']);
        return response([$response],201);
        // return response($data);
        
    }
}
