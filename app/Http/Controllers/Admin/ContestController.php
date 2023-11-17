<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    public function index(): View
    {
      return view('admin.contests.index', []);
    }

    public function create(): view
    {
      return view('admin.contests.create');
    }

    public function edit(Contest $contest): View
    {
      return view('admin.contests.edit', compact('contest'));
    }
}
