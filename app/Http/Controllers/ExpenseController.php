<?php

namespace App\Http\Controllers;

use App\Http\Requests\expenses\AddRequest;
use App\Http\Requests\expenses\UpdateRequest;
use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use App\Services\ExpenseService;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * __construct function
     *
     * @param ExpenseService $service
     */
    public function __construct(public readonly ExpenseService $service){}
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requestKey = request()->input('search');
        $categoryId = request()->input('category_id');
        $dateRange = request()->input('date_range');

        $expensesData = $this->service->getExpenses($requestKey, $categoryId, $dateRange);

        $expenses = $expensesData['expenses'] ?? [];
        $categories = $expensesData['categories'] ?? [];

        return view('expenses.index', compact('expenses', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name')->latest()->get();
        $categories = Category::select('id', 'name')->latest()->get();
        return view('expenses.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddRequest $request)
    {
        Expense::create($request->validated());
        return redirect()->route('expenses.index')->with('success', 'Expense created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $users = User::select('id', 'name')->latest()->get();
        $categories = Category::select('id', 'name')->latest()->get();
        return view('expenses.edit', compact('expense', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Expense $expense)
    {
        try {
            $expense->update($request->validated());
            return redirect()->route('expenses.index')->with('success', 'Expense updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('expenses.index')->with('error', $th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully');
    }
}
