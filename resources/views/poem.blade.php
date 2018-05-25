@extends('layouts.app')

@section('title', $poem->title . "&nbsp;|&nbsp;" . $poem->author)

@section('keywords', $poem->title . ',' . $poem->author . ',' . $poem->type->name)

@section('description', $poem->title . ',' . $poem->author . ',' . $poem->type->name)

@push('style')
<style>
	.container { 
		font-weight: 500; color: #2a2525; font-family: "Microsoft YaHei","Segoe UI", "Lucida Grande", Helvetica, Arial,sans-serif; 
	}
    ruby {  font-size: 1.05em;}
	rt { font-size: 0.78em; }
</style>
@endpush

@section('content')
	<div class="container">
		<div class="row">
			<div class="span6">
				<ul class="breadcrumb">
					<li>
						<a href="/">首页</a> <span class="divider">>></span>
					</li>
					{{ $poem->type->name }}
				</ul>
			</div>
		</div>

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
		<h5>更新于：{{ $poem->created_at }} 
			<a id="send" data-href="{{ url('/poem/' . $poem->id . '/mail') }}" onclick="sendMail()">
				<span class="glyphicon glyphicon-envelope"></span> 邮寄本页
			</a>
		</h5>
	</div>
@endsection

@push('script')
<script>
	// send this page to mail
	function sendMail()
	{
		let url = document.getElementById('send').getAttribute('data-href');
		window.location.href = url;
	}

	// todo 定时器发送数据
    setInterval("record()", 10000);
    function record()
    {
        $.ajax({url: '/poem/' + "{{ $poem->id }}" + '/record', async:false});
    }

	// todo prev and next poem function
</script>
@endpush
