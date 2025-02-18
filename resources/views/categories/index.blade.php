<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form action="{{route('categories.index')}}" method="get">
                    <div class="mt-4">
                        <input type="text" name="search" class="block mt-1 w-full" id="search" placeholder="Search..." value="{{request()->query('search')}}" />
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-info text-white">Search</button>
                        <a href="{{route('categories.index')}}" class="btn btn-link">Clear</a>
                    </div>
                </form>
                <div class="mt-4">
                    <hr>
                </div>
                <div class="mt-4">
                    <a href="{{route('categories.create')}}" class="btn btn-primary">Create Category</a>
                </div>

                <div class="mt-4">
                    @include('categories.table')
                </div>

            </div>
            </div>
        </div>
    </div>
</x-app-layout>
