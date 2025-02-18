<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expenses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form action="{{route('expenses.index')}}" method="get">
                    <div class="mt-4">
                        <input type="text" name="search" class="block mt-1 w-full" placeholder="Search..." id="search" value="{{request()->query('search')}}" />
                    </div>
                    <div class="mt-4">
                        <select name="category_id" id="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category -> id }}" {{ request()->query('category_id') == $category -> id ? 'selected' : '' }}>{{ $category -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <input type="text" id="daterange" name="date_range" value="" class="form-control">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-info text-white">Search</button>
                        <a href="{{route('expenses.index')}}" class="btn btn-link">Clear</a>
                    </div>
                </form>

                <div class="mt-4">
                    <hr>
                </div>

                <div class="mt-4">
                    <a href="{{route('expenses.create')}}" class="btn btn-primary">Add Expense</a>
                </div>

                <div class="mt-4">
                    @include('expenses.table')
                </div>

            </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#daterange').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            startDate:  moment().startOf('month'),
            endDate: moment().endOf('month'),
        });


        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            console.log("Selected Date Range: " + picker.startDate.format('YYYY-MM-DD') + " to " + picker.endDate.format('YYYY-MM-DD'));
        });
    });
</script>


