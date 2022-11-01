<?php

namespace App\Http\Controllers\Daily;

use App\Http\Controllers\Controller;
use App\Http\Requests\Daily;
use App\Http\Requests\Daily\Request;

class StoreController extends BaseController
{
    public function __invoke(Request $request)
    {
        $data = $request->validated();
        $responce=$this->service->store($data);
        return response([$responce],200);
    }
}
