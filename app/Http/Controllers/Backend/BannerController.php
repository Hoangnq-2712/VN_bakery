<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $listBanner = Banner::orderBy('id','DESC')->search()->get();
     return view('admin.banner.list',compact('listBanner'));   
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $listBanner=Banner::all();

        return view('admin.banner.add',compact('listBanner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:banner,name',
            'image' => 'required'


        ], [

            'image.required' => 'Vui lòng chọn ảnh!',
            'name.required' => 'Nhập tên Banner!',
            'name.unique' => 'Tên đã bị trùng!'

        ]);
        $banner = new Banner();

        $banner->name = $request->name;
        $banner->slug=str_slug($banner->name);
        $banner->image = $request->image;
        $banner->status = $request->status;
        $banner->save();


        return redirect()->route('banner')->with(['level'=>'success','message'=>'Thêm mới Banner thành công!']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {

        $banner = Banner::find($id);

        return view('admin.banner.edit',compact('banner'));
    }


    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:category,name,'.$id,
            'image'=>'required'

        ],[
            'name.required'=>'Tên banner không được để trống!',
            'name.unique'=>'Tên banner đã tồn tại!',
            'image.required'=>'Ảnh banner không được để trống!',


        ]);
            //cap nhat san pham
        Banner::find($id)->update($request->all());



        return redirect()->route('banner')->with(['level'=>'success','message'=>'Cập nhật banner thành công!']);;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Banner::destroy($id);
       return redirect()->route('banner')->with(['level'=>'success','message'=>'Xóa banner thành công!']);
   }
}
