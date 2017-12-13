<div class="modal fade bs-example-modal-lg" id="create_role" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Criar função</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'guardian.roles.store', 'method' => 'POST']) !!}
                <div class="form-group">
                        {!! Form::label('name', 'Nome'); !!}
                        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome da função']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Descrição'); !!}
                        {!! Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Descrição da função']); !!}
                    </div>

                    <h4 class="text-center">Vincular a permissões</h4>
                    <hr>
                    @foreach($groupsPermissions as $key => $group)

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-group-permissions-create-{{$key}}">Manter {{ $group->group }}</a>
                                    </h4>
                                </div>
                                <div id="collapse-group-permissions-create-{{$key}}" class="panel-collapse collapse">
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
                    @endforeach

                        <p>["Bootstrap","Tags","Input"]</p>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        {!! Form::submit('Criar', ['class' => 'btn btn-primary']); !!}
                {!! Form::close() !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->