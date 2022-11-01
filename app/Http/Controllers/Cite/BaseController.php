<?php

namespace App\Http\Controllers\Cite;

use App\Http\Controllers\Controller;
use App\Services\Cite\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Class constructor.
     */
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
