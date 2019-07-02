@extends('admin.layouts.backend')


@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Form điền thông tin</h3>
	</div>
	@if(Session::has('message'))
	<div>
		<div class="alert alert-{{Session::get('level')}}">
			<p>{{Session::get('message')}}</p>
		</div>
	</div>
	@endif
	<div class="panel-body">
		<div class="form-group">

			<a href="{{route('tin-tuc')}}" class="btn btn-success fa  fa-address-card"> Tin Tức</a>

		</div>
		<form action="{{route('tin-tuc.update',$listPost->id)}}" method="POST" role="form">
			{!! csrf_field() !!}
			{!! method_field('PUT') !!}

			<div class="form-group">
				<label for="">Tiêu đề</label>
				<input type="text" class="form-control" name="name"  value="{{old('title',isset($listPost)? $listPost->title:null)}}">

				@if($errors->has('title'))
				<div class="help-block" style="color: red">
					{!!$errors->first('title')!!}
				</div>
				@endif

			</div>
			<div class="form-group">
				<label for="">Tác giả</label>
				<input type="text" class="form-control" name="creator"  value="{{old('creator',isset($listPost)? $listPost->creator:null)}}">

				@if($errors->has('creator'))
				<div class="help-block" style="color: red">
					{!!$errors->first('creator')!!}
				</div>
				@endif

			</div>
			<div class="form-group">
				<label for="">Tóm tắt</label>
				<textarea  name="content"
				class="form-control my-editor" height="500px">{{old('content',isset($listPost)? $listPost->content:null)}}</textarea>

				@if($errors->has('content'))
				<div class="help-block" style="color: red">
					{!!$errors->first('content')!!}
				</div>
				@endif

			</div>
			<div class="form-group">
				<label>Ảnh</label>
				<div class="input-group">
					<span class="input-group-btn">
						<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
							<i class="fa fa-picture-o"></i> Chọn ảnh
						</a>
					</span>
					<input id="thumbnail" class="form-control" type="text" name="image"
					value="{{old('image',isset($listPost)? $listPost->image:null)}}">
				</div>
				<img id="holder" style="margin-top:15px;max-height:100px;">
				@if($listPost->image !=null)
				<img src="{{$listPost->image}}" alt="" width="100px" height="auto">
				@endif
			</div>
			<div class="form-group" >
				<label for="">Nội Dung</label>

				<textarea  name="body"
				class="form-control my-editor" height="1024px">{{old('body',isset($listPost)? $listPost->body:null)}}</textarea>
				@if($errors->has('content'))
				<div class="help-block" style="color: red">
					{!!$errors->first('content')!!}
				</div>
				@endif
			</div>
			<div class="form-group">
				<label for="">Trạng thái</label>
				<select name="status" id="inputStatus" class="form-control" required="required">
					<option value="1" {{$listPost->status==1? "selected": ""}}>Hiển thị</option>
					<option value="0"  {{$listPost->status==0? "selected": ""}}>Ẩn</option>
				</select>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Sửa</button>
			</div>
		</form>
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
<script>
	$('#lfm').filemanager('image');
</script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
@stop()