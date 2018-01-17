@extends('layouts.app')

@section('title', $poem->title . "&nbsp;|&nbsp;" . $poem->author)

@section('keywords', $poem->title . ',' . $poem->author . ',' . $poem->type->name)

@section('description', $poem->title . ',' . $poem->author . ',' . $poem->type->name)

@push('style')

<style>
	.container { 
		color: #2a2525;  font-family: "Microsoft YaHei","Segoe UI", "Lucida Grande", Helvetica, Arial,sans-serif; 
	}
    ruby { font-weight: 500; font-size: 1.05em;}
	rt { font-weight: 500; font-size: 0.59em; }
</style>
@endpush

@section('content')
	<div class="container">
		{{--  <div><a href="/">首页</a> >> {{ $poem->type->name }}</div>  --}}
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
			@foreach($results as $result)
				<p class='margin-bottom grey'>
					@foreach($result as $key => $val)
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
@endsection
