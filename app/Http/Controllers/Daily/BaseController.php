<?php

namespace App\Http\Controllers\Daily;

use App\Http\Controllers\Controller;
use App\Services\Daily\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $service;
    public function __construct(Service $service)
    {   
        $this->service=$service;
    }
}
