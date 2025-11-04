<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function index()
    {
        // TODO: Fetch dashboard statistics
        // - Total users count
        // - Active sessions count
        // - Total skills count
        // - Pending reports count
        // - Recent users
        // - System status
        
        return view('admin.dashboard');
    }
}
