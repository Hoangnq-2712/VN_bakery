@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Thêm mới Banner</h3>
	</div>
	@if(Session::has('message'))
	<div>
		<div class="alert alert-{{Session::get('level')}}">
			<p>{{Session::get('message')}}</p>
		</div>
	</div>
	@endif
	<div class="panel-body">
		<div class="row">
			<form action="{{route('them-banner')}}" method="POST" role="form" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="col-sm-12">
					<div class="form-group">
						<label for="">Tên banner</label>
						<input type="text" class="form-control" name="name" placeholder="Nhập tên banner" >

						@if($errors->has('name'))
						<div class="help-block" style="color: red">
							{!!$errors->first('name')!!}
						</div>
						@endif

					</div>				
					
					<div class="form-group">
						<label for="">Ảnh banner</label>
						<div class="input-group">
							<span class="input-group-btn">
								<a id="lfm"  name="image" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
									<i class="fa fa-picture-o"></i> chọn ảnh
								</a>
							</span>
							<input id="thumbnail" class="form-control" type="text" name="image" required>
						</div>
						<img id="holder" style="margin-top:15px;max-height:100px;">
					</div>
					

					<div class="form-group">
						<label for="">Trạng thái</label>
						<select name="status" id="inputStatus" class="form-control" required="required">
							<option value="1">Hiển thị</option>
							<option value="0">Ẩn</option>
						</select>
					</div>
				</div>
				
				<div class="form-inline text-center">
					<button type="submit" class="btn btn-primary">Thêm</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop
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