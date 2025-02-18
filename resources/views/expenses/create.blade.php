<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Expense') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('expenses.store') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="mt-4">
                            <x-input-label for="amount" :value="__('Amount *')" />
                            <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')"  autofocus autocomplete="amount"  placeholder="Amount" />
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"  autofocus autocomplete="description" placeholder="Description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="date" :value="__('Date *')" />
                            <input type="text" id="datepicker" class="form-control mb-3" name="date">
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="category_id" :value="__('Category *')" />

                            <select class="block mt-1 w-full" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category -> id }}" {{ old('category_id') == $category -> id ? 'selected' : '' }} >{{ $category -> name }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />

                        </div>

                        <div class="mt-4">
                            <x-input-label for="user" :value="__('User *')" />

                            <select class="block mt-1 w-full" name="user_id" id="user_id">
                                <option value="">Select Category</option>
                                @foreach ($users as $user)
                                <option value="{{ $user -> id }}" {{ old('user_id') == $user -> id ? 'selected' : '' }}>{{ $user -> name }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />

                        </div>


                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('expenses.index') }}" class="btn btn-warning">Back</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
<script>
$(document).ready(function() {
    // Initialize Single Date Picker
    $('#datepicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD' // Customize the format
        }
    });

    // Listen for changes in Date Picker
    $('#datepicker').on('apply.daterangepicker', function(ev, picker) {
        console.log("Selected Date: " + picker.startDate.format('YYYY-MM-DD'));
    });
});

</script>
