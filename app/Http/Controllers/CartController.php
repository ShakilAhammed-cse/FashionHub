<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Show cart
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('cart', compact('cart', 'total'));
    }

    // Add to cart
    public function add(Request $request)
    {
        $productName = $request->input('name', 'Product');
        $productPrice = $request->input('price', 0);
        $productId = $request->input('id', 1);

        $cart = session()->get('cart', []);

        // If product already in cart, increase quantity
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            // Add new product
            $cart[$productId] = [
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', $productName . ' added to cart!');
    }

    // Remove from cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    // Update quantity
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $quantity = $request->input('quantity', 1);
            if ($quantity > 0) {
                $cart[$id]['quantity'] = $quantity;
            } else {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    // Clear cart
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }
}
