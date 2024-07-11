<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <div class="flex flex-wrap -mx-4">
            <!-- Profit Card -->
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700 flex items-center">
                        Profit
                        <span class="ml-2 text-green-500">
                            <i class="fas fa-arrow-up"></i>
                        </span>
                    </h3>
                    <p class="text-2xl font-bold text-green-500 mt-2">$1,000</p>
                </div>
            </div>
            <!-- Loss Card -->
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700 flex items-center">
                        Loss
                        <span class="ml-2 text-red-500">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                    </h3>
                    <p class="text-2xl font-bold text-red-500 mt-2">$200</p>
                </div>
            </div>
            <!-- Total Products Card -->
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700 flex items-center">
                        Total Products
                        <span class="ml-2 text-blue-500">
                            <!-- You can add an icon here if needed -->
                        </span>
                    </h3>
                    <p class="text-2xl font-bold text-blue-500 mt-2">150</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
