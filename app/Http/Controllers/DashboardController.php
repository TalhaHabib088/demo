<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\AddInventoryRequest;
use App\Http\Requests\InventoryTransactionRequest;
use App\Models\Customer;
use App\Models\InventoryTransaction;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $sales = Sale::get();
        $lossProfit = 0;

      
        foreach ($sales as $key => $sale) {

            $checkOutInventory = InventoryTransaction::where('product_id',$sale->product_id)->where('transaction_type','check-out')->first();

            $lossProfit += ($sale->selling_price - $checkOutInventory->price) * $sale->quantity;
 
        }

        return $lossProfit;

        return view('dashboard');
    }

    public function inventoryList()
    {
        $products = Product::with('categories', 'suppliers')->get();
        return view('inventory.list', ['products' => $products]);
    }

    public function inventoryForm()
    {
        $suppliers = Supplier::get();
        $categories = Category::get();
        return view('inventory.inventory-form', ['suppliers' => $suppliers, 'categories' => $categories]);
    }

    public function addInventory(AddInventoryRequest $request)
    {
        try {
            $validData = $request->validated();

            $product = Product::create($validData);

            return redirect('/inventory')->with('success', 'Product create successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function inventoryTransaction()
    {
        $customers = Customer::get();
        $products = Product::get();
        return view('inventory.inventory-transaction-form', ['customers' => $customers, 'products' => $products]);
    }

    public function addInventoryTransaction(InventoryTransactionRequest $request)
    {
        DB::beginTransaction();
        try {
            $validData = $request->validated();
            $product = Product::find($validData['product_id']);

            if ($validData['transaction_type'] === 'check-out') {
                if ($product->quantity < $validData['quantity']) {
                    return redirect()->back()->with('error', 'Insufficient stock');
                } else {
                    $sale = Sale::create([
                        'customer_id' => $validData['customer_id'],
                        'product_id' => $validData['product_id'],
                        'quantity' => $validData['quantity'],
                        'selling_price' => $validData['price']
                    ]);

                    $product->quantity -= $validData['quantity'];
                    $product->save();
                }
            } else {
                $product->unit_per_price = $validData['price'];
                $product->quantity += $validData['quantity'];
                $product->save();
            }

            $inventoryTransaction = InventoryTransaction::create($validData);
            DB::commit();

            return redirect()->back()->with('success', 'Inventory transaction created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
