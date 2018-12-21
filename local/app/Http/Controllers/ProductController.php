<?php

namespace App\Http\Controllers;


use App\CategoryItem;
use App\Product;
use App\Repositories\Backend\Product\ProductRepositoryInterface;
use App\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'DESC')->paginate(5);
        $products->makeVisible('id');
        return view('backend.admin.product.index', compact('products'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->productRepository->showCreateProduct();
        $categoryProduct = $data['categoryProduct'];
        return view('backend.admin.product.create', compact('roles', 'categoryProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->productRepository->createNewProduct($request);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->productRepository->showEditProduct($id);
        $product = $data['product'];
        $categoryProduct = $data['categoryProduct'];
        return view('backend.admin.product.edit', compact('product','categoryProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->productRepository->updateProduct($request, $id);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=$this->productRepository->deleteProduct($id);
        return redirect()->route('product.index')->with('success', 'Đã Xóa Thành Công');
    }

    public function search(Request $request)
    {
        $keywords = preg_replace('/\s+/', ' ', $request->input('txtSearch'));
        $products = Product::where('name', 'like', '%' . $keywords . '%')->orderBy('id', 'DESC')->paginate(5);
        return view('backend.admin.product.index', compact('products', 'keywords'))->with('i', ($request->input('product', 1) - 1) * 5);
    }

    public function paste(Request $request)
    {
        $listId = $request->input('listID');
        $products = Product::find(explode(',', $listId));
        foreach ($products as $key => $data) {
            $data->name = $data->name . ' ' . rand(pow(10, 2), pow(10, 3) - 1);
            $data->path = chuyen_chuoi_thanh_path($data->name);
        }
        Product::insert($products->toArray());
        return redirect()->route('product.index')->with('success', 'Tạo Mới Thành Công Sản Phẩm');
    }
}
