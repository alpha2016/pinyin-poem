@extends('layouts.dashboard')

@section('title', '诗歌类型列表')

@section('content')
<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{ url('/admin/index') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">歌谣</a></li>
            <li class="active">歌谣类型列表</li>
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="modal" data-target="#createModal">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </ul>
        <section class="panel panel-default">
            <div class="table-responsive">
                <table class="table table-striped b-t b-light text-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($types->isNotEmpty())
                            @foreach($types as $type)
                                <tr class="type_{{$type->id}}">
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->created_at }} </td>
                                    <td>
                                        <button type="button" data-data="{{ $type }}" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="modal" data-target="#delModal">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" data-data="{{ $type }}" class="btn btn-default btn-xs" aria-label="Left Align" data-toggle="modal" data-target="#modifyModal">
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

<!-- delModal -->
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

<!-- createdModal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal">
    <input type="hidden" name="del_id" class="del_id" value="" />
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">名称:</label>
                        <input type="text" class="form-control name" id="name" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="doCreate()">确认</button>
            </div>
        </div>
    </div>
</div>

<!-- modifyModal -->
<div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="modifyModal">
    <input type="hidden" name="modify_id" class="modify_id" value="" />
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">名称:</label>
                        <input type="text" class="form-control modify_name" id="name" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="doModify()">确认</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    // 删除操作
    $('#delModal').on('show.bs.modal', function (event) {
        var target = $(event.relatedTarget);
        var data = target.data('data');
        $('.del_id').val(data.id);
    });

    function doDel()
    {
        var id = $('.del_id').val();
        $.ajax({  
            type: "delete",
            url: "/admin/poem-types/" + id,
            success: function() {
                $('.type_' + id).remove();
                $('#delModal').modal('hide');
                console.log($('.type_' + id));
            },
            error: function() {
                alert(error);
            }
        });
    }

    // 编辑操作
    $('#modifyModal').on('show.bs.modal', function (event) {
        var target = $(event.relatedTarget);
        var data = target.data('data');
        $('.modify_id').val(data.id);
        $('.modify_name').val(data.name);
    });

    function doModify()
    {
        var id = $('.modify_id').val();
        var name = $('.modify_name').val();
        $.ajax({
            type: "put",
            url: "/admin/poem-types/" + id,
            data: {name: name},
            success: function() {
                $('.type_' + id).children("td:eq(1)").text(name);
                $('#modifyModal').modal('hide');
            },
            error: function() {
                alert(error);
            }
        });
    }

    // 添加操作
    function doCreate()
    {
        var name = $('.name').val();
        $.ajax({  
            type: "post",  
            url: "/admin/poem-types",
            data: {name: name},
            success: function(res) {
                var data = res.data;
                var dom = "<tr class='type_'+data.id><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.created_at+"</td><td><button type='button' data-data='"+data+"' class='btn btn-default btn-xs' aria-label='Left Align' data-toggle='modal' data-target='#delModal'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button><button type='button' data-data='"+data+"' class='btn btn-default btn-xs' aria-label='Left Align' data-toggle='modal' data-target='#modifyModal'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></td></tr>"
                $('tbody').children("tr:eq(0)").before(dom);
                $('#createModal').modal('hide');
            },
            error: function() {
                alert(error);
            }
        });  
    }
</script>
@endpush