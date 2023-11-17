<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    public function index(): View
    {
      return view('user.contests.index', []);
    }

    public function show(Contest $contest): View
    {
      return view('user.contests.show', compact('contest'));
    }
}
