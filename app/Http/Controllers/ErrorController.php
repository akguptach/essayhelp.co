<?php

namespace App\Http\Controllers;



class ErrorController extends Controller
{
    //

    public function notFound()
    {
        return view('errors.404');
        
        
        
    }
}
