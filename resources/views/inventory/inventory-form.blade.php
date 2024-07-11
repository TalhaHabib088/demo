<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Inventory') }}
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
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success alert!</span> {{ session('success') }}.
          </div>
        @endif
        @if (session('error'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success alert!</span> {{ session('error') }}.
          </div>
        @endif
        <form class="max-w-xl mx-auto grid grid-cols-1 gap-6 md:grid-cols-2" action="{{ route('inventory.add') }}"
            method="POST">
            @csrf
            <input type="hidden" name="created_by" value="{{auth()->user()->id}}">
            <!-- Email Input -->
            <div class="col-span-1 md:col-span-1">
                <label for="suppliers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supply By
                    <span class="text-red-500">*</span></label>
                <select id="suppliers" name="supplier_id"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    <option selected>Select Supplier</option>
                    @foreach ($suppliers as $key => $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Password Input -->
            <div class="col-span-1 md:col-span-1">
                <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                    <span class="text-red-500">*</span></label>
                <select id="categories" name="category_id"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    <option selected>Select Category</option>
                    @foreach ($categories as $key => $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1 md:col-span-3">
                <label for="repeat-password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name <span
                        class="text-red-500">*</span></label>
                <input type="text" name="name" id="repeat-password"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required />
            </div>
            <div class="col-span-1 md:col-span-3">
                <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Per
                    Unit Price <span class="text-red-500">*</span></label>
                <input type="text" name="unit_per_price" id="repeat-password"
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

            <div class="col-span-2 md:col-span-3">
                <label for="repeat-password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description <span
                        class="text-red-500">*</span></label>
                <textarea id="comment" rows="4"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required name="description"> </textarea>
            </div>

            <div class="col-span-2 md:col-span-2">
                <button type="submit"
                    class="w-50 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <button type="reset"
                    class="w-50 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Clear</button>
            </div>
        </form>
    </div>
</x-app-layout>
