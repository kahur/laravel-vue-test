<?php

namespace App\Http\Controllers;

use App\Http\Response\JsonResponseTrait;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller
{
    use JsonResponseTrait;
    use ValidatesRequests;
}
