<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
	.container { 
		font-weight: 500; color: #2a2525; font-family: "Microsoft YaHei","Segoe UI", "Lucida Grande", Helvetica, Arial,sans-serif; 
	}
	ruby {  font-size: 1.05em;}
	rt { font-size: 0.78em; }
</style>
<body>
	<!-- content start -->
	<div class="container">
		<h3>{{ $poem->title }}
			<small>{{ $poem->author }}</small>
		</h3>
		<p>
			<img src="{{ $poem->picture }}" alt="{{ $poem->title }}" class='img-responsive center-block' src="http://d.hiphotos.baidu.com/image/pic/item/a044ad345982b2b713b5ad7d3aadcbef76099b65.jpg"
			/>
		</p>

		<hr>
			@foreach($contents as $content)
				<p class='margin-bottom grey'>
					@foreach($content as $key => $val)
						<ruby>
							{{ $val[0] }}
							<rt>{{ $val[1] }}</rt>
						</ruby>
					@endforeach
				</p>
			@endforeach
			
		<hr>
			<blockquote>
				<small>{{ $poem->description }}</small>
			</blockquote>
			
		<hr>
		<h5>更新于：{{ $poem->created_at }}</h5>
	</div>
	<!-- content end-->
	
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
