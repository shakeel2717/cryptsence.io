<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function priceUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required|numeric',
        ]);

        $option = Option::where('name', 'coin_exchange_rate')->firstOrFail();
        $option->value = $validatedData['price'];
        $option->save();

        // new Log
        logEntry('Price Update', 'Admin has updated the price of the coin exchange');

        return redirect()->back()->with('success', 'Price updated successfully');
    }
}
