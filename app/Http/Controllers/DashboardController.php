<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $dados = Activity::with('category','user')
            ->take(3)
            ->orderByDesc('created_at')
            ->get();
        return view('dashboard',['dados' => $dados]);
    }
}
