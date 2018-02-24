@extends('layouts.dashboard')

@section('title', '诗歌列表')

@section('content')
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{ url('/admin/index') }}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">歌谣</a></li>
                <li class="active">歌谣列表</li>
            </ul>
            <section class="panel panel-default">
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light text-sm">
                        <thead>
                            <tr>
                                <th width="20">ID</th>
                                {{--<th class="th-sortable" data-toggle="class">Project
                                    <span class="th-sort">
                                        <i class="fa fa-sort-down text"></i>
                                        i class="fa fa-sort-up text-active"></i>
                                        <i class="fa fa-sort"></i>
                                    </span>
                                </th>--}}
                                <th>题目</th>
                                <th>类型</th>
                                <th>作者</th>
                                <th>内容</th>
                                <th width="30"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($poems->isNotEmpty())
                                @foreach($poems as $poem)
                                    <tr>
                                        <td>{{ $poem->id }}</td>
                                        <td>{{ $poem->title }}</td>
                                        <td>{{ $poem->type->name }} </td>
                                        <td>{{ $poem->author }}</td>
                                        <td>{{ str_limit($poem->content, 22) }}</td>
                                        <td>
                                            <a href="#" class="active" data-toggle="class">
                                                <i class="fa fa-check text-success text-active"></i>
                                                <i class="fa fa-times text-danger text"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-4 text-right text-center-xs">
                            {{ $poems->links() }}
                            {{--<ul class="pagination pagination-sm m-t-none m-b-none">
                                <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                            </ul>--}}
                        </div>
                    </div>
                </footer>
            </section>
        </section>
    </section>
@endsection
