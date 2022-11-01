<?php

namespace App\Http\Controllers\Dream;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dream\UpdateRequest;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request)
    {
        $data=$request->validated();
        $this->service->update($data);
        return response(['Updated'],202);
    } 
}
