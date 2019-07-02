$(document).ready(function() {
	$('.add-cart').click(function(e) {
		 e.preventDefault();
		var url = $(this).attr('href');
		// alert('Bạn thêm sản phẩn vào giỏ hàng thành công');
		$.ajax({
			url:url,
			type:'GET',
			// dataType:'json',
			success:function(res) {
				// console.log(res);
				// alert(res);	
				alert('Bạn thêm sản phẩn vào giỏ hàng thành công!');
				$('#qty').load(location.href + ' #qty>*');	
			}
		});
	});
	
});
