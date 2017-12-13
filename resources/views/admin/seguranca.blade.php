@extends('layouts.admin_v1.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Funções e permissões</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

    <div class="col-lg-6">
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

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Permissões
                </h4>
            </div>
            <div class="panel-body">
                @foreach($role->permissions as $permission)
                    <button type="button" class="btn btn-default" style="margin: 5px 5px 5px 5px;" data-container="body" data-toggle="popover" data-placement="top" data-content="{{ $permission->description }}">
                        {{ $permission->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    @push('popover')
        <script>
            // popover demo
            $("[data-toggle=popover]")
                .popover()
        </script>
    @endpush

@endsection