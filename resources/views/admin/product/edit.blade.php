@extends('admin.layouts.backend')
@section('backend')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Cập nhật sản phẩm</h3>
    </div>
    @if(Session::has('message'))
    <div>
        <button> <div class="alert alert-{{Session::get('level')}}">
            <p>{{Session::get('message')}}</p>
        </div></button>

    </div>
    @endif
    <div class="panel-body">
        <div class="row">
            <form action="{{route('sua-san-pham.update',$listProduct->id)}}" method="POST" role="form" enctype="multipart/form-data">
               {!! csrf_field() !!}
               {!! method_field('PUT') !!}
               <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="{!! old('name',isset($listProduct)? $listProduct->name: null)!!}">
                    @if($errors->has('name'))
                    <div class="help-block" style="color: red">
                        {!!$errors->first('name')!!}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện </label>

                    <div class="input-group">
                     <span class="input-group-btn">
                       <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                         <i class="fa fa-picture-o"></i> Chọn hình ảnh
                     </a>
                 </span>
                 <input id="thumbnail" class="form-control" type="text" name="image"  value="{{old('image',isset($listProduct)? $listProduct->image: null)}}" >
             </div>
             <img id="holder" style="margin-top:15px;max-height:100px;">
             @if($listProduct->image)
             <img src="{{$listProduct->image}}" alt="" height="200" alt="">
             @endif

         </div> 



         <div class="form-group">
            <label for="">Mô tả chi tiết</label>

            <textarea name="description" class="form-control my-editor">{!! old('description',isset($listProduct)? $listProduct->description: null)!!}</textarea>
        </div>
    </div>
    <!-- <div class="col-sm-3">
        @for ($lfm = 1; $lfm < 6; $lfm++)
        <div class="form-group">
            <label for="">Ảnh chi tiết {{$lfm}}</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm{{$lfm}}"  name="image" data-input="thumbnail{{$lfm}}" data-preview="holder{{$lfm}}" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> chọn ảnh
                    </a>
                </span>
                <input id="thumbnail{{$lfm}}" class="form-control" type="text" name="link[]" >
            </div>
            <img id="holder{{$lfm}}" style="margin-top:15px;max-height:100px;">
        </div>
        @endfor
    </div> -->

    <div class="col-md-6">
        <div class="form-group">
            <label for="">Danh mục</label>
            <select name="category_id" id="inputStatus" class="form-control" required="required">
                <option value="">Chọn danh mục</option>
                @foreach($listCate as $c)

                <?php  ?>
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
                <?php showCategories($listCate);?>
            </select>

        </div>

        <div class="form-group">
            <label for="">Giá</label>
            <input type="text" class="form-control" name="price" value="{{old('price',isset($listProduct)? $listProduct->price: null)}}">
        </div>
        <div class="form-group">
            <label for="">Giá khuyến mãi</label>
            <input type="text" class="form-control" name="sale_price" value="{{old('sale_price',isset($listProduct)? $listProduct->sale_price: null)}}">
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <select name="status" class="form-control">
                <option value="0" >Ẩn</option>
                <option value="1" selected>Hiện</option>
                <option value="2">Hotdeal</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lưu lại</button>
    </div>
</div>
</form>
</div>
</div>
</div>
@stop()
@section('script' )
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function (field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
<!-- <script>
    $('#lfm').filemanager('image');
</script> -->
<script type="text/javascript">
    var domain = "/laravel-filemanager";


    $('#lfm').filemanager('image');
    $('#lfm').filemanager('image', {prefix: domain});

    for (var i = 0; i <= 5; i++) {
        $('#lfm' + i).filemanager('image');
        $('#lfm' + i).filemanager('image', {prefix: domain});
    }
</script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
@stop()