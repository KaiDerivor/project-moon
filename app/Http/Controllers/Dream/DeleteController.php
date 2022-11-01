<?php

namespace App\Http\Controllers\Dream;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dream\DeleteRequest;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(DeleteRequest $request)
    {
        $data=$request->validated();
        $this->service->delete($data['dreams']);
        return response(['Deleted'],200);
    }
}
