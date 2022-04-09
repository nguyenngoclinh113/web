@extends('master')
@section('content')

	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.0113184426104!2d108.14848271476936!3d16.06490244382118!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421929366960db%3A0xdb879dd7c782e123!2zUGjhuqFtIE5oxrAgWMawxqFuZywgTGnDqm4gQ2hp4buDdSwgxJDDoCBO4bq1bmcsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1525506184085" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Liên hệ với chúng tôi</h2>
					<div class="space20">&nbsp;</div>
					<p>Sweet Bakery được sản xuất trên dây chuyền hiện đại, với những nguyên liệu được nhập khẩu trực tiếp từ các nước có truyền thống làm bánh lâu đời trên thế giới. Thực khách tới đây có thể thưởng thức rất nhiều loại bánh : Bánh Sinh Nhật, Bánh Cưới, Bánh Valentine, Bánh Giáng sinh… Barkery, Bánh mỳ Pháp, Pizza, Hotdog, Patechaux, Cookies</p>
					<div class="space20">&nbsp;</div>
					<form action="{{ url('/contact/post') }}" method="GET"  class="contact-form">
					
						<div class="form-group">
							<input name="name" type="text" placeholder="Tên của bạn" class="form-control" required>
						</div>
						<div class="form-group">
							<input name="email" type="email" placeholder="Email của bạn" class="form-control" required>
						</div>
						<div class="form-group">
							<input name="address" type="text" placeholder="Địa chỉ" class="form-control" required>
						</div>
						<div class="form-group">
							<textarea name="message" placeholder="Nội dung muốn nhắn gửi" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-warning">Gửi tin nhắn <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<img src="source/image/product/contact.jpg" width="800px">
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection
