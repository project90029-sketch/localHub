<?php

namespace App\Http\Controllers\Business;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')
                ->store('product_photos', 'public');
        }

        Product::create([
            'user_id'     => auth()->id(),   // or hardcode for now
            'name'        => $validated['name'],
            'category'    => $validated['category'],
            'price'       => $validated['price'],
            'stock'       => $validated['stock'],
            'photo'       => $photoPath,
        ]);

        return redirect()->back()->with('success', 'Product added');
    }
    public function index()
    {
        $products = Product::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('business.inventory', compact('products'));
    }
/*     public function dashboard()
    {
            $user = auth()->user();   // ADD THIS

        $products = Product::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('business.businessDashboard', compact('products', 'user'));
    } */
 
        public function dashboard()
   {
    if (!session('b2b_user_id')) {
        return redirect('/b2b-login');
    }

    $user = (object)[
        'name' => session('b2b_user_name'),
        'profile_image' => 'default.png',
        'user_type' => session('b2b_user_type')
    ];

    $products = Product::where('user_id', session('b2b_user_id'))
        ->latest()
        ->get();

    return view('business.businessDashboard', compact('products', 'user'));
}

}
