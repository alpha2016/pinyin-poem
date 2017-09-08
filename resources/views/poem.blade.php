@extends('layouts.app')

@push('style')
<style>
    rt {
        font-size: 18px;
        padding-left: 10px;
    }
    .row {
        background : #ffffff;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
			<!-- Section Image -->
			<div class="row no-margin padding-onlytop-lg">
				<div class="col-md-6 padding-leftright-null">
					<div data-responsive="parent-height" data-responsive-id="about" class="text">
						<h3 class="margin-bottom-null left">{{ $poem->title }}
                                  <small>{{ $poem->author }}</small>
                        </h3>
						<div class="padding-onlytop-sm">
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

							{{--<a href="#" class="btn-pro">Read More</a>--}}
                            <blockquote>
                                <p>
                                    <small>{{ $poem->description }}</small>
                                </p>
                            </blockquote>
						</div>
					</div>
				</div>
				<div class="col-md-6 padding-leftright-null">
					<div data-responsive="child-height" data-responsive-id="about" class="section-image height-auto-sm">
						<picture class="section right">
							<img src="{{ $poem->picture }}"  class="img-responsive" alt="{{ $poem->title }}">
						</picture>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
