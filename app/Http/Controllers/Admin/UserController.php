<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        // TODO: Fetch all users with filters
        // - Search by name/email
        // - Filter by role (provider/learner/admin)
        // - Filter by status (active/suspended/banned)
        // - Pagination
        
        return view('admin.users.index');
    }

    /**
     * Display the specified user.
     */
    public function show($id)
    {
        // TODO: Fetch user details
        // - User info
        // - Sessions history
        // - Reviews
        // - Reports
        
        return view('admin.users.show', compact('id'));
    }

    /**
     * Suspend user account.
     */
    public function suspend($id)
    {
        // TODO: Suspend user account
        // - Update user status to 'suspended'
        // - Send notification to user
        // - Log action
        
        return redirect()->route('admin.users.index')
            ->with('success', 'تم تعليق الحساب بنجاح');
    }

    /**
     * Activate user account.
     */
    public function activate($id)
    {
        // TODO: Activate user account
        // - Update user status to 'active'
        // - Send notification to user
        // - Log action
        
        return redirect()->route('admin.users.index')
            ->with('success', 'تم تفعيل الحساب بنجاح');
    }

    /**
     * Remove the specified user.
     */
    public function destroy($id)
    {
        // TODO: Delete user account
        // - Soft delete or hard delete
        // - Delete related data
        // - Log action
        
        return redirect()->route('admin.users.index')
            ->with('success', 'تم حذف الحساب بنجاح');
    }
}
