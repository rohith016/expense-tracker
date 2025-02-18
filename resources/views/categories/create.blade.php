<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('categories.store') }}" id="categoryForm" method="post">
                        @csrf
                        @method('post')

                        <div class="valdation-error"></div>

                        <div>
                            <x-input-label for="name" :value="__('Name*')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" placeholder="Category Name" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" id="name-error" />
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-warning">Back</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

