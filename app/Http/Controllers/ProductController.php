<?php

namespace App\Http\Controllers;

use App\Repositories\Interface\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = $this->productRepository->getProductById($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'size' => 'required|string',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $this->productRepository->createProduct($data);
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = $this->productRepository->getProductById($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'size' => 'required|string',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $this->productRepository->updateProduct($id, $data);
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->productRepository->deleteProduct($id);
        return redirect()->route('products.index');
    }
}
