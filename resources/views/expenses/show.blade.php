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

                    <div class="mt-4">
                        <x-input-label for="amount" :value="__('Amount')" />
                        <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount', $expense -> amount)"  autofocus autocomplete="amount"  placeholder="Amount" readonly />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $expense -> description)"  autofocus autocomplete="description" placeholder="Description" readonly />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="date" :value="__('Date')" />
                        <input type="text" id="datepicker" class="form-control mb-3" name="date" value="{{ old('date', $expense -> date) }}">
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Category')" />
                        <x-text-input id="category" class="block mt-1 w-full" type="text" name="description" :value="old('category', $expense->category?->name)"  autofocus autocomplete="category" placeholder="category" readonly />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="user" :value="__('User')" />
                        <x-text-input id="user" class="block mt-1 w-full" type="text" name="user" :value="old('user', $expense->user?->name)"  autofocus autocomplete="user" placeholder="user" readonly />
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('expenses.index') }}" class="btn btn-warning">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
