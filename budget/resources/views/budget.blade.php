<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Budget') }}
        </h2>
    </x-slot>

    <!-- Flash Messages -->
    @if ($message = session('message'))
    <div class='py-6'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-green p-6 bg-white border-b border-gray-200">
                    {{ $message }}
                </div>
            </div>
        </div>
    </div>
    @endif


    <!-- Title Banner -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center font-semibold text-xl text-gray-800 leading-tight p-6 bg-white border-b border-gray-200">
                    Annual Overview
                </div>
            </div>
        </div>
    </div>

    <!-- Annual Table Construction -->
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="border-spacing-2">
                        <thead>
                            <tr>
                                <th><strong>Month</strong></th>
                                @for ($i = 0; $i < count($budgetItems) ; $i++)
                                <th><strong>{{ $budgetItems[$i]->name }}</strong></th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($months) ; $i++)
                            <tr>
                                <td>{{ $months[$i]->month_name }}</td>
                                @foreach ($budgetItems as $item)
                                    @if ($item->frequency_id == 1)
                                        <td>${{ $item->amount * (4.3333) }}</td>
                                    @elseif ($item->frequency_id == 2)
                                        <td>${{ $item->amount * (2.1666) }}</td>     
                                    @elseif ($item->frequency_id == 3)
                                        <td>${{ $item->amount * 2 }}</td>    
                                    @elseif ($item->frequency_id == 4)
                                        <td>${{ $item->amount }}</td>     
                                    @elseif ($item->frequency_id == 5 && ($months[$i]->id == 1 || $months[$i]->id == 3 || $months[$i]->id == 5 || $months[$i]->id == 7 || $months[$i]->id == 9 || $months[$i]->id == 11))
                                        <td>${{ $item->amount }}</td>   
                                    @elseif ($item->frequency_id == 5 && ($months[$i]->id !== 1 || $months[$i]->id !== 3 || $months[$i]->id !== 5 || $months[$i]->id !== 7 || $months[$i]->id !== 9 || $months[$i]->id !== 11))
                                        <td>$0.00</td>   
                                    @elseif ($item->frequency_id == 6 && ($months[$i]->id == 1 || $months[$i]->id == 4 || $months[$i]->id == 7 || $months[$i]->id == 10))
                                        <td>${{ $item->amount }}</td>       
                                    @elseif ($item->frequency_id == 6 && ($months[$i]->id !== 1 || $months[$i]->id !== 4 || $months[$i]->id !== 7 || $months[$i]->id !== 10))
                                        <td>$0.00</td>   
                                    @elseif ($item->frequency_id == 7 && ($months[$i]->id == 1|| $months[$i]->id == 7))
                                        <td>${{ $item->amount }}</td>      
                                    @elseif ($item->frequency_id == 7 && ($months[$i]->id !== 1|| $months[$i]->id !== 7))
                                        <td>$0.00</td>   
                                    @elseif ($item->frequency_id == 8 && ($months[$i]->id == 1))
                                        <td>${{ $item->amount }}</td>     
                                    @elseif ($item->frequency_id == 8 && ($months[$i]->id !== 1))
                                        <td>$0.00</td>        
                                    @endif
                                @endforeach
                            </tr>
                            @endfor
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Button -->
    <div>
        <form action="{{ route('add-item') }}" class="mt-6 ml-3">
            @csrf
            <x-primary-button class="ml-3 p-6">
                {{ __('Add New') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
