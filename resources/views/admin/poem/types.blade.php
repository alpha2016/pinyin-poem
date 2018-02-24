@extends('layouts.dashboard')

@section('title', '诗歌类型列表')

@section('content')
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{ url('/admin/index') }}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">歌谣</a></li>
                <li class="active">歌谣类型列表</li>
            </ul>
            <section class="panel panel-default">
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light text-sm">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>名称</th>
                            <th>创建时间</th>
                            <th>删除时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($types->isNotEmpty())
                                @foreach($types as $type)
                                    <tr>
                                        <td>{{ $type->id }}</td>
                                        <td>{{ $type->name }}</td>
                                        <td>{{ $type->created_at }} </td>
                                        <td>{{ $type->deleted_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
                                            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </section>
@endsection
