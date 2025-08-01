<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $carCount = Car::count();
        return view('admin.dashboard' , compact('userCount' , 'carCount'));
    }
}
