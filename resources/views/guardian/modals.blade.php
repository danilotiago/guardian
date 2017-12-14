<div class="modal fade bs-example-modal-lg" id="create_user" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Criar usuário</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'guardian.users.store', 'method' => 'POST']) !!}
                <div class="form-group">
                        {!! Form::label('name', 'Nome'); !!}
                        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome do usuário']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail'); !!}
                        {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'E-mail do usuário']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Senha'); !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'E-mail do usuário']); !!}
                    </div>

                    <h4 class="text-center">Vincular a funções</h4>
                    <hr>
                    @foreach($roles as $key => $role)

                        <label class="checkbox-inline"><input type="checkbox" value="{{ $role->id }}" name="roles[]">{{ $role->name }}</label>

                    @endforeach
                    <br><br>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    {!! Form::submit('Criar', ['class' => 'btn btn-primary']); !!}
                {!! Form::close() !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                                        <label class="checkbox-inline"><input type="checkbox" value="{{ $permission->id }}" name="permissions[]">{{ $permission->name }}</label>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!! Form::submit('Criar', ['class' => 'btn btn-primary']); !!}
                {!! Form::close() !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-lg" id="create_permission" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Criar permissão</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'guardian.permissions.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nome'); !!}
                    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome da função']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Descrição'); !!}
                    {!! Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Descrição da função']); !!}
                </div>

                <h4 class="text-center">Vincule aos grupos existentes</h4>
                <hr>
                @foreach($groupsPermissions as $key => $group)

                    <label class="radio-inline"><input type="radio" value="{{ $group->group }}" name="group">{{ $group->group }}</label>

                @endforeach
                <br><br>
                <div class="form-group">
                    {!! Form::label('new_group', 'Ou crie um novo grupo'); !!}
                    {!! Form::text('new_group', '', ['class' => 'form-control', 'placeholder' => 'Grupo']); !!}
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!! Form::submit('Criar', ['class' => 'btn btn-primary']); !!}
                {!! Form::close() !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->