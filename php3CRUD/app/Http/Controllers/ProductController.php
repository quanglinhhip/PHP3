<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // paginate: phân trang
        $data = Product::query()->with('category')->latest('id')->paginate();
        // dd($data);
        return view('products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::query()->pluck('name', 'id')->all();
        // dd($categories);
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'price' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:0',
            'img_thumb' => 'nullable|image|mimes:jpeg,png,jpg',
            'overview' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $data = $request->except('img_thumb');
        if ($request->hasFile('img_thumb')) {
            $pathFile = Storage::putFile('products', $request->file('img_thumb'));
            $data['img_thumb'] = 'storage/' . $pathFile;
        }
        Product::query()->create($data);
        // dd($data);
        return redirect()->route('products.index');
    }

    /**
     *
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // dd($product->toArray());
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // dd($product);
        $categories = Category::query()->pluck('name', 'id')->all();
        return view('products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->except('img_thumb');
        if ($request->hasFile('img_thumb')) {
            $pathFile = Storage::putFile('products', $request->file('img_thumb'));
            $data['img_thumb'] = 'storage/' . $pathFile;
        }
        $currentImgThumb = $product->img_thumb;

        $product->update($data);

        // Thêm thông báo vào session
        $request->session()->flash('success', 'Sửa sản phẩm thành công');
        if (
            $request->hasFile('img_thumb')
            && $currentImgThumb
            && file_exists(public_path($currentImgThumb))
        ) {
            unlink(public_path($currentImgThumb));
        }
        // dd($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        if (
            $product->img_thumb
            && file_exists(public_path($product->img_thumb))
        ) {
            unlink(public_path($product->img_thumb));
        }
        return redirect()->route('products.index');
    }
}
