<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
 //

 public function dashboard_area()
 {
  return view('admin.dashboard');
 }

 public function user_profile(Request $request)
 {
  $user = auth()->user();
  return view('admin.profile', ['user' => $user]);
 }
}