@extends('layouts.admin_v1.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h1 class="page-header">Funções e permissões</h1>
                <div class="btn-group btn-group-justified">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#create_user">Criar Usuários</a>
                    <a class="btn btn-success" data-toggle="modal" data-target="#create_role">Criar Funções</a>
                    <a class="btn btn-info" data-toggle="modal" data-target="#create_permission">Criar Permissões</a>
                    <a class="btn btn-warning">Usuários e funções</a>
                    <a class="btn btn-danger">Funções e permissões</a>
                </div>
                <br>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Usuários
                </h4>
            </div>
            <div class="panel-body">
                @foreach($users as $key => $user)
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-user-{{$key}}">{{ $user->name }}</a>
                                </h4>
                            </div>
                            <div id="collapse-user-{{$key}}" class="panel-collapse collapse">
                                <div class="panel-body">

                                    @foreach($user->roles as $role)
                                        <button type="button" class="btn btn-default" style="margin: 5px 5px 5px 5px;" data-container="body" data-toggle="popover" data-placement="top" data-content="{{ $role->description }}">
                                            {{ $role->name }}
                                        </button>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Funções
                </h4>
            </div>
            <div class="panel-body">
                @foreach($roles as $key => $role)
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$key}}">{{ $role->name }}</a>
                                </h4>
                            </div>
                            <div id="collapse-{{$key}}" class="panel-collapse collapse">
                                <div class="panel-body">

                                    @foreach($role->permissions as $permission)
                                        <button type="button" class="btn btn-default" style="margin: 5px 5px 5px 5px;" data-container="body" data-toggle="popover" data-placement="top" data-content="{{ $permission->description }}">
                                            {{ $permission->name }}
                                        </button>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Permissões
                </h4>
            </div>
            <div class="panel-body">
                {{--lista os grupos das permissoes--}}
                @foreach($groupsPermissions as $key => $group)
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-group-permissions-{{$key}}">Manter {{ $group->group }}</a>
                                </h4>
                            </div>
                            <div id="collapse-group-permissions-{{$key}}" class="panel-collapse collapse">
                                <div class="panel-body">

                                    @foreach($permissions as $permission)
                                        @if($permission->group == $group->group)
                                            <button type="button" class="btn btn-default" style="margin: 5px 5px 5px 5px;" data-container="body" data-toggle="popover" data-placement="top" data-content="{{ $permission->description }}">
                                                {{ $permission->name }}
                                            </button>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('guardian.modals')

    @push('popover')
        <script>
            // popover demo
            $("[data-toggle=popover]")
                .popover()
        </script>
    @endpush

@endsection