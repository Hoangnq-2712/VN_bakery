@extends('admin.layouts.backend')


@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
    <div class="panel-heading">
        <h3 class="panel-title">Cập nhật Video</h3>
    </div>
    
    <div class="panel-body">
        <form action="{{route('video.update',$listVideo->id)}}" method="POST" role="form">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
            <div class="form-group">
                <label for="">Tên Video</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="{{$listVideo->name}}">
                @if($errors->has('name'))
                <div class="help-block" style="color: red">
                    {!!$errors->first('name')!!}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="">Đường dẫn (Link video)</label>
                <input type="text" class="form-control" name="link" placeholder="Nhập đường dẫn" value="{{$listVideo->link}}">
                @if($errors->has('link'))
                <div class="help-block" style="color: red">
                    {!!$errors->first('link')!!}
                </div>
                @endif
            </div>
            

            <div class="form-group">
                <label for="">Danh mục cha</label>
                <select name="parent" id="inputStatus" class="form-control" required="required">
                    <option value="0">--Chọn danh mục cha--</option>
                    @foreach($listCate as $c)

                    <?php  ?>
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                    <?php showCategories($listCate);?>
                </select>

            </div>

            <div class="form-group">
                <label for="">Trạng thái</label>
                <select name="status" id="inputStatus" class="form-control" required="required" value="">
                    <option value="1" selected>Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@stop()