    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
        <div class="col-md-9">
            <input type="text" id="Nombre" name="nombre" class="form-control" placeholder="Nombre de usuario" required>
            <span class="help-block">(*) Ingrese el nombre del usuario</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Tipo Documento</label>
        <div class="col-md-9">
            <select class="form-control" id="tipo_documento" name="tipo_documento">
                <option value="Cedula">Cedula</option>
                <option value="Documento Extrangero">Documento Extrangero</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Numero Documento</label>
        <div class="col-md-9">
            <input type="number" id="Num_Documento" name="num_documento" class="form-control" placeholder="Numero De documento" required>
            <span class="help-block">(*) Ingrese el numero de doumento</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Direccion</label>
        <div class="col-md-9">
            <input type="text" id="Direccion" name="direccion" class="form-control" placeholder="Direccion" required>
            <span class="help-block">(*) Ingrese la direccion del Usuario</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Telefono</label>
        <div class="col-md-9">
            <input type="number" id="telefono" name="telefono" class="form-control" placeholder="Telefono" required>
            <span class="help-block">(*) Ingrese el telefono del usuario</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Email</label>
        <div class="col-md-9">
            <input type="Email" id="email" name="email" class="form-control" placeholder="Email" required>
            <span class="help-block">(*) Ingrese el email del usuario</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Usuario</label>
        <div class="col-md-9">
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required>
            <span class="help-block">(*) Usuario de acceso</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">password</label>
        <div class="col-md-9">
            <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
            <span class="help-block">(*) password de acceso</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Rol de usuario</label>
        <div class="col-md-9">
            <select class="form-control" id="id_rol" name="id_rol">
                @foreach($roles as $rol)
                        <option value="{{$rol->id}}"> {{$rol->Nombre}} </option>
                @endForEach
            </select>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>