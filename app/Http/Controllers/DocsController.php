<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenApi\Generator;



class DocsController extends Controller
{
    public function json(): string
    {

        $openapi = Generator::scan([base_path('Definitions')]);

        return $openapi->toJson();
    }



}
