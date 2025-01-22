<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PajakRestoranController extends Controller
{
    public function index ()
    {
        return view('admin.restoran.index');
    }

    public function create ()
    {
        return view('admin.restoran.create');
    }
}
