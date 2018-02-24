@extends('layouts.dashboard')

@section('title', '诗歌类型列表')

@section('content')
    <div class="block-area" id="defaultStyle">
        <h3 class="block-title">诗歌类型列表</h3> 
        <button type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add
        </button>
        <table class="table tile">
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
            </tbody>
        </table>

        {{ $types->links() }}
    </div>
@endsection