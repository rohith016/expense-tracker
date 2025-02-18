<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Dashboard\GetExpenseSummaryRequest;
use App\Services\ExpenseService;

class ExpenseController extends Controller
{
    /**
     * __construct function
     *
     * @param ExpenseService $service
     */
    public function __construct(public readonly ExpenseService $service){}
    /**
     * getExpensesByCategory function
     *
     * @param GetExpenseSummaryRequest $request
     * @return void
     */
    public function getExpensesByCategory(GetExpenseSummaryRequest $request)
    {
        try {
            $expenseData = $this->service->getExpensesByCategoryData($request->validated('start_date'), $request->validated('end_date'));
            return response()->json($expenseData);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => 'An error occurred while retrieving the expenses.'], 500);
        }

    }
}
