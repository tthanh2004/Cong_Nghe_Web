<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at')->paginate(5);
        return view('products.list', [
            'products' => $products
        ]);
    }

    public function search(Request $request)
    {
        if (!empty($request)) {
            $search  = $request->input('search');

            $products = Product::where(
                'name',
                'like',
                "$search%"
            )
                ->orWhere('email', 'like', "$search%")
                ->paginate(5);
            return view('products.list', compact('products'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Định nghĩa các quy tắc xác thực
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'phone' => 'required|regex:/^(\+?\d{1,3}?)?\d{10}$/',
            'email' => 'required|email',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->phone = $request->phone;
        $product->email = $request->email;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imageName;
        } else {
            $product->image = 'default.jpg';
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'phone' => 'required|regex:/^(\+?\d{1,3}?)?\d{10}$/',
            'email' => 'required|email',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('products.edit', $product->id)->withInput()->withErrors($validator);
        }

        //update products
        $product->name = $request->name;
        $product->description = $request->description;
        $product->phone = $request->phone;
        $product->email =  $request->email;
        $product->price = $request->price;
        $product->image = $request->image;

        if ($request->hasFile('image')) {

            if ($product->image && $product->image != 'default.jpg') {
                File::delete(public_path('uploads/products/' . $product->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product update sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        File::delete(public_path('uploads/products/' . $product->image));

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product update sucessfully');
    }
}
