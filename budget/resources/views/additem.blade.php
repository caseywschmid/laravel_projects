<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Budget Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="POST" action="{{ route('save-item') }}">
                @csrf
                <!-- Name -->
                <div>
                    <x-input-label for="budget_item_name" :value="__('Name')" />
                    <x-text-input id="budget_item_name" class="block mt-1 w-full" type="text" name="name" autofocus />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
    
                <!-- Amount -->
                <div class="mt-4">
                    <x-input-label for="budget_item_amount" :value="__('Amount')" />
                    <div class="">
                        <span class="mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">$</span>
                        <input type="number" step="0.01" data-type="currency" name="amount" id="budget_item_amount" class="mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="0.00">
                    </div>
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>

                <!-- Category -->
                <div class="mt-4">
                    <x-input-label for="budget_item_category" :value="__('Category')" />
                    <select id="budget_item_category" name="category" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($expenseCategories as $row)
                            <option value="{{ $row->id }}">{{ $row->expense_category_name }}</option>
                        @endforeach
                    </select>
                    
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                </div>

                <!-- Frequency -->
                <div class="mt-4">
                    <x-input-label for="budget_item_frequency" :value="__('Frequency')" />
                    <select id="budget_item_frequency" name="frequency" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($frequencies as $row)
                            <option value="{{ $row->id }}">{{ $row->frequency }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('budget') }}">
                        {{ __('Cancel') }}
                    </a>
                    <x-primary-button class="ml-4">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
z