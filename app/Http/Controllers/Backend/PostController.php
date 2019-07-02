<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\PostDetail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost=Post::orderBy('id','DESC')->search()->paginate(3);
        return view('admin.post.list',compact('listPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $listPost=Post::all();

        return view('admin.post.add',compact('listPost'));
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
            'title' => 'required|unique:post|max:255|min:1',
            'content' => 'required|min:1',
            'creator' => 'required|min:1',
            'body' => 'required|min:1',

        ],

        [
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'title.unique' => 'tiêu đề đã tồn tại',
            'content.required' => 'Vui lòng điền nội dung tóm tắt',
            'content.min' => 'Nội dung content quá ngắn',
            'creator.required' => 'Vui lòng điền tên tác giả',
            'creator.min' => 'Tên quá ngắn',
            'body.required' => 'Vui lòng điền nội dung bài viết',
            'body.min' => 'Nội dung bài viết quá ngắn!',

        ]);
        $post= new Post();
        $post->title=$request->title;
        $post->creator=$request->creator;
        $post->content=$request->content;
        $post->slug = str_slug($post->title);
        $post->image = $request->image;
        $post->body=$request->body;
        $post->status=$request->status;
        
        $post->save();

        return redirect()->route('tin-tuc')->with(['level'=>'success','message'=>'Thêm bài post thành công!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $listPost = Post::find($id);

        return view('admin.post.edit',compact('listPost'));
    }


    public function update($id,Request $request)
    {


        $this->validate($request,[
            'title'=>'required,'.$id,
            'creator'=>'required',
            'content'=>'required|min:1,'.$id,
            'body'=>'required|min:1,'.$id,

        ],[
            'title.required'=>'Tiêu đề không được để trống!',
            'creator.required'=>'Tên tác giả không được để trống!',
            'content.required'=>'Tóm tắt không được để trống!',
            'content.min'=>'Tóm tắt quá ngắn!',
            'body.required'=>'Nội dung không được để trống!',
            'body.min'=>'Nội dung quá ngắn!',


        ]);

            //cap nhat san pham
        Post::find($id)->update($request->all());



        return redirect()->route('tin-tuc')->with(['level'=>'success','message'=>'Cập nhật tin tức thành công!']);;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('tin-tuc')->with(['level' => 'success', 'message' => 'Xóa tin tức thành công!']);
    }
}

