@extends('layouts.dashboard')

@section('title', '诗歌列表')

@section('content')
    <div class="block-area" id="defaultStyle">
        <h3 class="block-title">诗歌列表</h3>
        <table class="table tile">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>题目</th>
                    <th>类型</th>
                    <th>作者</th>
                    <th>内容</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($poems as $poem)
                    <tr>
                        <td>{{ $poem->id }}</td>
                        <td>{{ $poem->title }}</td>
                        <td>{{ $poem->type->name }} </td>
                        <td>{{ $poem->author }}</td>
                        <td>{{ str_limit($poem->content, 22) }}</td>
                        <td>TODO</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $poems->links() }}
    </div>
@endsection
