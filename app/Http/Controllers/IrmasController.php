<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IrmasController extends Controller
{
    public function index()
    {
        if (request()->user()->hasRole('irmas')) {
            return view('irmas.index');
        } else {
            return redirect('/');
        }
    }
}
