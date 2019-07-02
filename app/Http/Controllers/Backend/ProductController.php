<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\ProductImage;
use App\Model\Category;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listProducts = Product::orderBy('id','desc')->search()->paginate(10);

        return view('admin.product.list', compact('listProducts'));
    }
    public function imagedetails($id)
    {
        $model=Product::where('id',$id)->first();
        return view('admin.product.imagedetails',compact('model'));
    }
    /**
    Thêm mới sản phẩm
     */
    public function add()
    {

        $listProducts = Product::all();
        $listCates = Category::all();
        $productimage = ProductImage::all();
        return view('admin.product.add', compact('listProducts', 'listCates', 'productimage'));
    }

    /**

     */
    public function store(Request $request)
    {
     $this->validate($request,[
        'name'=>'required|unique:product,name',


    ],[
        'name.required'=>'Tên danh mục không được để trống!',
        'name.unique'=>'Tên danh mục đã tồn tại!',


    ]);
     $product= new Product();
     $product->name = $request->name;
     $product->slug = str_slug($product->name);
     $product->image = $request->image;
     $product->category_id = $request->category_id;
     $product->price = $request->price;
     $product->sale_price = $request->sale_price;
     $product->description = $request->description;
     $product->status = $request->status;



     $product->save();
     $id =$product->id;
     if($request->link != null){
        $imageDetails = $request->link;
        foreach ($imageDetails as $imageDetail) {
                # code...
            $imgProduct=new ProductImage();
            if(isset($imageDetail)){
                $imgProduct->product_id = $id;
                $imgProduct->link = $imageDetail;
                $imgProduct->save();
            }
        }
    }


    return redirect()->route('san-pham')->with(['level' => 'success', 'message' => 'Thêm sản phẩm thành công!']);

}

    /**
        edit Product
     */
        public function edit($id)
        {
           $listProduct = Product::find($id);
           $listCates = Category::find($id);
           return view('admin.product.edit',[

            'listProduct'=>$listProduct,
            'listCates'=>$listCates,
            'listCate' => Category::where('id','<>',$id)->get()

        ]);
       }

    /**
     cập nhật sản phẩm
     */
     public function update(Request $request, $id)
     {
       
        $product = Product::find($id);  
        $product->update([       

            'name' => $request->get('name'), 
            'image'=> $request->get('image'),
            'category_id'=> $request->get('category_id'),
            'price'=> $request->get('price'),
            'sale_price'=> $request->get('sale_price'),
            'description'=> $request->get('description'),
            'status'=> $request->get('status'),
     

      ]);


        return redirect()->route('san-pham')->with(['level' => 'success', 'message' => 'Cập nhật sản phẩm thành công!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('san-pham')->with(['level' => 'success', 'message' => 'Xóa sản phẩm thành công!']);
    }
}
