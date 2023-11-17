<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function index(): View
    {
      return view('user.spaces.index', []);
    }
}
