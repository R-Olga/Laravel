<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorld extends Controller
{
    function index() {
        return 'Hello world!';
    }
}
