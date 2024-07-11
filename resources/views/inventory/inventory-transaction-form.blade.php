<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory Transaction') }}
        </h2>
    </x-slot>

    <div
        class="container mx-auto p-8 max-w-xl  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <b class="font-medium">Danger alert!</b>
                        @foreach ($errors->all() as $error)
                            <li class="font-medium">{{ $error }}</li>
                        @endforeach
                    </div>
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">Success alert!</span> {{ session('success') }}.
            </div>
        @endif
        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">Danger alert!</span> {{ session('error') }}.
            </div>
        @endif
        <form class="max-w-xl mx-auto grid grid-cols-1 gap-6 md:grid-cols-2" action="{{ route('add.inventory.transaction') }}"
            method="POST">
            @csrf

            <!-- Email Input -->

            <div class="col-span-2 md:col-span-1">
                <label for="transaction_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction
                    Type
                    <span class="text-red-500">*</span></label>
                <select id="transactionType" name="transaction_type"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    <option >Select transaction type</option>
                    <option value="check-in">Check-in</option>
                    <option value="check-out">Check-out</option>
                </select>
            </div>
            <div class="col-span-2 md:col-span-1 hidden" id="customers">
                <label for="suppliers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                    Customer
                    <span class="text-red-500">*</span></label>
                <select id="customer_id" name="customer_id"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    <option ></option>
                    @foreach ($customers as $key => $customer)
                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                    @endforeach

                </select>
            </div>

            <!-- Password Input -->

            <div class="col-span-1 md:col-span-1 ">
                <label for="suppliers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                    Product
                    <span class="text-red-500">*</span></label>
                <select id="transactionType" name="product_id"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    <option selected>Select Product</option>
                    @foreach ($products as $key => $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach


                </select>
            </div>
            <div class="col-span-1 md:col-span-3">
                <label for="repeat-password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price<span
                        class="text-red-500">*</span></label>
                <input type="text" name="price" id="repeat-password"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required />
            </div>
            <div class="col-span-2 md:col-span-3">
                <label for="repeat-password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity <span
                        class="text-red-500">*</span></label>
                <input type="text" name="quantity" id="repeat-password"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required />
            </div>

            {{-- <div class="col-span-2 md:col-span-3">
                <label for="repeat-password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description <span
                        class="text-red-500">*</span></label>
                <textarea id="comment" rows="4"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required name="description"> </textarea>
            </div> --}}

            <div class="col-span-2 md:col-span-2">
                <button type="submit"
                    class="w-50 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <button type="reset"
                    class="w-50 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Clear</button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#transactionType').on('change', function() {
                var transactionType = this.value;
                if (transactionType == 'check-out') {
                    $('#customers').show();
                }

                if (transactionType == 'check-in') {
                    $('#customers').hide();
                }
            });
        })
    </script>
</x-app-layout>
