@extends('admin.layouts.app')
@section('page.content')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Extra</a></li>
        <li class="active">Search Results</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Search Results <small>3 results found</small></h1>
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Data Table - Default</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" class="form-horizontal" role="form" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-xs-4 control-label">账号</label>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" id="name" name="adminname" placeholder="请输入名字">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-xs-4 control-label">密码</label>
                                <div class="col-xs-5">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="repass" class="col-xs-4 control-label">确认密码</label>
                                <div class="col-xs-5">
                                    <input type="password" class="form-control" id="repass" name="repass" placeholder="确认密码">
                                </div>
                            </div>
                            <div class="col-md-offset-5" >
                                <button type="button" class="btn btn-success m-2" id="repass" name="repass">保存</button>
                                <button type="reset" class="btn btn-success m-2" id="repass" name="repass">重置</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
@endsection
@section('script.js')
    <script>
        $("button").click(function () {
            $("form").submit();
        });
    </script>
    @endsection