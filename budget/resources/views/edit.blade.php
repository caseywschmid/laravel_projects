<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Budget Items') }}
        </h2>
    </x-slot>

    <!-- Flash Messages -->
    @if ($message = session('message'))
    <div class='py-6'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="text-green">
                    {{ $message }}
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Lables -->
            <div class="flex font-medium text-sm text-gray-700">
                <div><label for="budget_item_name">Name</label></div>
                <div><label for="budget_item_amount" >Amount</label></div>
                <div><label for="budget_item_category" >Category</label></div>
                <div><label for="budget_item_frequency" >Frequency</label></div>
            </div>

            <!-- Inputs -->
            @foreach ($budgetItems as $item)
            <form method="POST" action="{{ route('update', $item) }}">
                @csrf
                <div class="flex" style="align-items: center">
                    <!-- Name -->
                    <x-text-input id="budget_item_name" value="{{ $item->name }}" class="mt-1 w-72" type="text" name="name" autofocus />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}

                    <!-- Amount -->
                    <span class="mt-">$</span>
                    <input type="text" name="amount" value="{{ $item->amount }}" id="budget_item_amount" class="mt-1 w-10 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                    <!-- Category -->
                    <select id="budget_item_category" name="category" class="mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($expenseCategories as $row)
                            @if (\App\Models\Budget::oldCategory($item) == $row->expense_category_name)
                                <option value="{{ $row->id }}" selected>{{ $row->expense_category_name }}</option>
                            @else
                                <option value="{{ $row->id }}">{{ $row->expense_category_name }}</option>
                            @endif
                        @endforeach
                    </select>

                    <!-- Frequency -->
                    <select id="budget_item_frequency" name="frequency" selected="Monthly" class="mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($frequencies as $row)
                            @if (\App\Models\Budget::oldFrequency($item) == $row->frequency)
                                <option value="{{ $row->id }}" selected>{{ $row->frequency }}</option>
                            @else
                            <option value="{{ $row->id }}">{{ $row->frequency }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="flex items-center justify-end mt-2">
                        <x-primary-button class="ml-2" name="update">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                    <input type="submit" name="delete" value="{{ __('Delete') }}"></input>
                </div>
            </form>           
            @endforeach
        </div>
    </div>
    <form action="{{ route('budget') }}">
        <x-primary-button class="ml-2">
            {{ __('Cancel') }}
        </x-primary-button>
    </form>
</x-app-layout>