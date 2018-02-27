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
                                        <button type="button" data-data="{{ $type }}" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="modal" data-target="#delModal">
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

<!-- Modal -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModal">
    <input type="hidden" name="del_id" class="del_id" value="" />
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                您确定要删除这个类别吗？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="doDel()">确认</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('#delModal').on('show.bs.modal', function (event) {
        var target = $(event.relatedTarget);
        var data = target.data('data');
        $('.del_id').val(data.id);
    });

    function doDel()
    {
        $.ajax({  
            type: "delete",  
            url: "/admin/poem-types/" + $('.del_id').val(),
            success: function() {  
                $('#delModal').modal('hide');
            },
            error: function() {
                alert(error);
            }
        });  
    }
</script>
@endpush