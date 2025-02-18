<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row mt-2">

                        <div class="col-md-3">
                            <div class="card text-center text-white bg-success mb-3" style="width: 18rem;">
                                <div class="card-body">
                                <h5 class="card-title">Total Expense Amount</h5>
                                <h1><span class="badge badge-secondary">${{ $totalExpenseAmount }}</span></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center text-white bg-success mb-3" style="width: 18rem;">
                                <div class="card-body">
                                <h5 class="card-title">Total Expenses</h5>
                                <h1><span class="badge badge-secondary">{{ $totalExpenses }}</span></h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card text-center text-white bg-success mb-3" style="width: 18rem;">
                                <div class="card-body">
                                <h5 class="card-title">Total Categories</h5>
                                <h1><span class="badge badge-secondary">{{ $totalCategories }}</span></h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card text-center text-white bg-success mb-3" style="width: 18rem;">
                                <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <h1><span class="badge badge-secondary">{{ $totalUsers }}</span></h1>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="row mt-2">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('categories.create') }}">Add Category</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('expenses.create') }}">Add Expense</a>
                            </li>
                          </ul>
                    </div>



                    <div class="row mt-2">
                        <hr>

                        <div class="row mt-2">
                            <form id="filterForm">
                                <label>Start Date:</label>
                                <input type="date" id="start_date" name="start_date" class="form-control mb-2">

                                <label>End Date:</label>
                                <input type="date" id="end_date" name="end_date" class="form-control mb-2">

                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-danger">Clear Filters</a>
                            </form>
                        </div>

                        <div class="message-alert"></div>
                        <div class="row mt-2">
                            <hr>
                            <div class="col-md-4 text-center"></div>
                            <div class="col-md-4 text-center">
                                <canvas id="pieChart"></canvas>
                            </div>
                            <div class="col-md-4 text-center"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="{{ asset('js/expense-charts.js') }}"></script>

