<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChickenOrderController extends Controller
{
    // Show form
    public function create()
    {
        return view('chicken-order');
    }

    // Handle form submission
    public function store(Request $request)
    {
        // VALIDATION RULES
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'quantity' => 'required|numeric|min:1|max:20',
            'flavor' => 'required',
            'payment' => 'required',
            'address' => 'required|min:10',
        ], [
            'name.required' => 'Name is required.',
            'name.min' => 'Name must be at least 3 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'quantity.required' => 'Quantity is required.',
            'quantity.max' => 'You can only order up to 20 chickens.',
            'address.min' => 'Please enter complete address.',
        ]);

        return back()->with('success', '🍗 Your chicken order has been placed successfully!');
    }
}