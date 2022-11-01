<?php

namespace App\Http\Controllers\Cite;

use App\Http\Controllers\Controller;
use App\Models\Cite;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Cite $cite)
    {
        $cite->delete();
        return response(['Deleted'],200);
    }
    
}
