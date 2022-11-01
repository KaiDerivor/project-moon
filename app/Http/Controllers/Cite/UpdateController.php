<?php

namespace App\Http\Controllers\Cite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cite\StoreRequest;
use App\Models\Cite;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(Cite $cite, StoreRequest $request)
    {
        $data=$request->validated();
        $this->service->update($cite,$data);
        return response(['Updated']);
    }
    
}
