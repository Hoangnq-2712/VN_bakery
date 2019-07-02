<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;



class CategoryController extends Controller
{
    public function index()
    {

        $listCates=Category::orderBy('id','DESC')->search()->paginate(5);
        return view('admin.category.list',compact('listCates'));
    }


    public function add(Request $req)
    {


     $listCates=Category::all();

     return view('admin.category.add',compact('listCates'));

    }


        // tao request
     public function store(Request $request)
     {
        $this->validate($request,[
            'name'=>'required|unique:category,name',


        ],[
            'name.required'=>'Tên danh mục không được để trống!',
            'name.unique'=>'Tên danh mục đã tồn tại!',


        ]);
            // ve trai thi tro toi cot trong bang categories trong csdl, ve phải  lay gia tri tu ben view do nguoi dung nhap, name ve phai bang name cua input tuong ung
        $category= new Category();
        $category->name=$request->name; 
        $category->slug=str_slug($category->name);
        $category->parent=$request->parent;
        $category->status=$request->status;
        $category->save();

        return redirect()->route('danh-muc')->with(['level'=>'success','message'=>'Thêm danh mục thành công!']);

            //ham xu ly viec them danh muc
    }


    public function edit($id)
    {

        $listCates = Category::find($id);
        // return view('admin.category.edit',compact('listCates'));

        return view('admin.category.edit',[

            'listCates'=>$listCates,
            'listCate' => Category::where('id','<>',$id)->get()

        ]);
    }


    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:category,name,'.$id,
            'slug'=>'unique:category,slug,'.$id,

        ],[
            'name.required'=>'Tên danh mục không được để trống!',
            'name.unique'=>'Tên danh mục đã tồn tại!',
            'slug.unique'=>'Tên slug đã bị trùng!',


        ]);
            //cap nhat san pham
        Category::find($id)->update($request->all());



        return redirect()->route('danh-muc')->with(['level'=>'success','message'=>'Cập nhật danh mục thành công.']);;

    }


    public function destroy($id)
    {

        Category::destroy($id);
        return redirect()->route('danh-muc')->with(['level'=>'success','message'=>'Xóa danh mục thành công.']);
    }
}
