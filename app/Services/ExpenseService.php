<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Expense;

class ExpenseService
{
    /**
     * getExpenses function
     *
     * @param [type] $requestKey
     * @param [type] $categoryId
     * @param [type] $dateRange
     * @return void
     */
    public function getExpenses($requestKey = null, $categoryId = null, $dateRange = null)
    {
        $expenses = Expense::when($requestKey, function($query) use($requestKey){
            $query->whereAny(['amount', 'description'], 'like',  "%$requestKey%");
        })
        ->when($categoryId, function($query) use($categoryId){
            $query->where('category_id', $categoryId);
        })
        ->when($dateRange, function($query) use($dateRange){
            $dates = explode(' - ', $dateRange);
            $startDate = date_create($dates[0]);
            $endDate = date_create($dates[1]);
            $query->whereBetween('date', [$startDate, $endDate]);
        })
        ->latest()
        ->paginate(50);

        $categories = Category::select('id', 'name')->latest()->get();

        return [
            'expenses' => $expenses ?? [],
            'categories' => $categories ?? [],
        ];
    }
    /**
     * getExpensesByCategoryData function
     *
     * @param [type] $startDate
     * @param [type] $endDate
     * @return void
     */
    public function getExpensesByCategoryData($startDate = null, $endDate = null)
    {
        $startDate = $startDate ?? now()->startOfMonth();
        $endDate = $endDate ?? now()->endOfMonth();
        $expensesByCategory = Expense::selectRaw('category_id, SUM(amount) as total_amount')
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy('category_id')
            ->get();

        $categories = Category::whereIn('id', $expensesByCategory->pluck('category_id'))->pluck('name', 'id');

        return [
            'labels' => $expensesByCategory->map(fn($e) => $categories[$e->category_id] ?? 'Unknown'),
            'data' => $expensesByCategory->pluck('total_amount'),
        ];
    }

}
