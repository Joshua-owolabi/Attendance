<?php

namespace App\Http\Controllers;

use App\User;
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

  public function print_panel()
  {
    return view('admin.printarea');
  }

  public function all_members_print()
  {
    $members = User::all();
    // dd($members);
    return view('prints.all-members')->with(['members' => $members]);
  }

  public function subunit_print(Request $request)
  {
    $members = User::where('sub_unit', $request->sub_unit)->get();
    // dd($members);
    return view('prints.sub-unit')->with(['members' => $members]);
  }
}
