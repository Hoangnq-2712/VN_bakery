@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Form điền thông tin</h3>
	</div>
	<div class="panel-body">
		<form action="{{route('sua-banner.update',$banner->id)}}" method="POST" role="form" enctype="multipart/form-data">
			{{csrf_field()}}
			{{method_field('put')}}
			<div class="form-group">
				<label>Tên Banner</label>
				<input type="text" class="form-control form-control-line"
				name="name" value="{!! old('name'),isset($banner)? $banner->name:Null !!}">
			</div>
			<div class="form-group">
				<label>Ảnh đại diện </label>
				<div class="input-group">
					<span class="input-group-btn">
						<a id="lfm"  name="image" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
							<i class="fa fa-picture-o"></i> chọn hình ảnh
						</a>
					</span>
					<input id="thumbnail" class="form-control" type="text" name="image"
					value="{{$banner->image}}" required>
				</div>
			</div>
			<img src="{{$banner->image}}" alt="{{str_slug($banner->name)}}" width="300" height="300" class="img-responsive">
			<img id="holder" style="margin-top:15px;max-height:100px;">

			<div class="form-group">
				<label for="">Trạng thái</label>
				<select name="status" id="inputStatus" class="form-control" required="required">
					<option value="1" {{$banner->status==1? "selected": ""}}>Hiển thị</option>
					<option value="0"  {{$banner->status==0? "selected": ""}}>Ẩn</option>
				</select>
			</div>
			<div class="form-group">
				<button class="btn btn-success text-center" type="submit">Cập nhật
				</button>
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