<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\User;

class AdminController extends Controller
{
    public function viewHomePage()
    {
        $superAdmin = User::where('role', '=', 'Super Admin')->get();
        $totalSuperAdmin = count($superAdmin);

        $admin = User::where('role', '=', 'Admin')->where('status', '=', 1)->get();
        $totalAdmin = count($admin);

        $pendingAdmin = User::where('role', '=', 'Admin')->where('status', '=', 0)->get();
        $totalPendingAdmin = count($pendingAdmin);

        $client = User::where('role', '=', 'Client')->where('status', '=', 1)->get();
        $totalClient = count($client);

        $pendingClient = User::where('role', '=', 'Client')->where('status', '=', 0)->get();
        $totalPendingClient = count($pendingClient);

        $features = Feature::all();

        $ip = request()->ip();

        return view('home', compact('admin', 'superAdmin', 'totalSuperAdmin', 'totalAdmin', 'totalClient', 'totalPendingAdmin', 'totalPendingClient','features','ip'));
    }


    public function ControlAccess(){
        return view('admin.pages.control_access.control_access');
    }

}
