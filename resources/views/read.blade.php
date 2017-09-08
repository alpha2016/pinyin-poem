@extends('layouts.app')

@push('style')
<style>
    rt {
        font-size: 18px;
        padding-left: 10px;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <?php $i = 0; ?>
                @foreach($results as $key => $result)
                    {!! $i == 0 ? "<ruby>" : "" !!}
                    <?php $i++; ?>
                    @if ($key != '，')
                        {{ $key }} <rt> {{ $result }} </rt>
                    @else
                        </rudy><br />
                        <?php $i = 0; ?>
                    @endif 

                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
