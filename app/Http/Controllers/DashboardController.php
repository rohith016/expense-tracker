<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * index function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $totalExpenseAmount = Expense::sum('amount');
        $totalExpenses = Expense::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        return view('dashboard', compact('totalExpenseAmount', 'totalExpenses', 'totalCategories', 'totalUsers'));
    }
}
