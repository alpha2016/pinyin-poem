@extends('layouts.dashboard')

@section('title', '添加诗歌')

@section('content')
<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">UI kit</a></li>
            <li><a href="#">Form</a></li>
            <li class="active">Validation</li>
        </ul>
        <div class="row">
            <div class="col-sm-6">
                <form data-validate="parsley" method="post" action="{{ url('/admin/poem') }}">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                    <section class="panel panel-default">
                        <header class="panel-heading"> <span class="h4">添加诗歌</span> </header>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>标题</label>
                                <input type="text" max="100" class="form-control" data-required="true" name="title">
                            </div>
                            <div class="form-group">
                                <select data-required="true" class="form-control m-t" name="poem_type_id">
                                    <option value="">请选择类型</option>
                                    @if($types->isNotEmpty())
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>作者</label>
                                <input type="text" class="form-control" max="20" name="author" data-required="true">
                            </div>
                            <div class="form-group">
                                <label>封面</label>
                                <input type="text" class="form-control" max="20" name="picture" data-required="true">
                            </div>
                            <div class="form-group">
                                <label>内容</label>
                                <textarea class="form-control" rows="6" cols="30" name="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label>描述</label>
                                <textarea class="form-control" rows="6" cols="30" name="description"></textarea>
                            </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                            <button type="submit" class="btn btn-success btn-s-xs">Submit</button>
                        </footer>
                    </section>
                </form>
            </div>
        </div>
    </section>
</section>
@endsection
