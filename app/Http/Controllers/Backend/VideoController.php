<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Video;
use App\Model\Category;

class VideoController extends Controller
{
    /**
     Hien video ra trang danh sach
     */
     public function index()
     {
        $listVideo = Video::orderBy('id','Desc')->search()->paginate(2);
        return view('admin.video.list',compact('listVideo'));
    }

    /**
     Them video
     */
     public function add()
     {
        $listVideo=Video::all();
        $listCates=Category::all();


        return view('admin.video.add',compact('listVideo','listCates'));
    }

    /**
     Phuong thuc Post de them video
     */
     public function store(Request $request)
     {
      $this->validate($request,[
        'name'=>'required|unique:video,name',
        'link'=>'required|unique:video,link',


    ],[
        'name.required'=>'Tên video không được để trống!',
        'name.unique'=>'Tên video đã tồn tại!',
        'link.required'=>'Tên video không được để trống!',
        'link.unique'=>'Tên  video đã tồn tại!',


    ]);

      $video= new Video();
      $video->name=$request->name; 
      $video->link=$request->link;
      $video->category_id=$request->category_id;
      $video->status=$request->status;
      $video->save();

      return redirect()->route('danh-sach-video')->with(['level'=>'success','message'=>'Thêm video thành công!']);

            //ham xu ly viec them danh muc
  }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $listVideo = Video::find($id);

       return view('admin.video.edit',[

        'listVideo'=>$listVideo,
        'listCate' => Category::where('id','<>',$id)->get()

    ]);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id,Request $request)
    {  
      $this->validate($request,[
        'name'=>'required|unique:video,name,'.$id,
        'link'=>'required|unique:video,link,'.$id,


    ],[
        'name.required'=>'Tên video không được để trống!',
        'name.unique'=>'Tên video đã tồn tại!',
        'link.required'=>'Tên video không được để trống!',
        'link.unique'=>'Tên  video đã tồn tại!',


    ]);

      Video::find($id)->update($request->all());

      return redirect()->route('danh-sach-video')->with(['level'=>'success','message'=>'Cập nhật video thành công!']);
    }

    
    public function destroy($id)
    {
        Video::destroy($id);
        return redirect()->route('danh-sach-video')->with(['level'=>'success','message'=>'Xóa Video thành công!']);
    }
}
