<?php

namespace App\Http\Controllers\Cite;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cite\Resource;
use App\Models\Cite;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $cites=Cite::all();
        // return new Resource::collection(($cites));
        return Resource::collection($cites);
    }
    
}
