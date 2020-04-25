    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
        <div class="col-md-9">
            <input type="text" id="Nombre" name="Nombre" class="form-control" placeholder="Nombre de cliente" required>
            <span class="help-block">(*) Ingrese el nombre del cliente</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Tipo Documento</label>
        <div class="col-md-9">
            <select class="form-control col-md-3" id="Tipo_Documento" name="Tipo_Documento">
                <option value="Nit">Nit</option>
                <option value="Cedula">Cedula</option>
                <option value="Codigo">Codigo</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Numero Documento</label>
        <div class="col-md-9">
            <input type="number" id="Num_Documento" name="Num_Documento" class="form-control" placeholder="Numero De documento" required>
            <span class="help-block">(*) Ingrese el numero de doumento</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Direccion</label>
        <div class="col-md-9">
            <input type="text" id="Direccion" name="Direccion" class="form-control" placeholder="Direccion" required>
            <span class="help-block">(*) Ingrese la direccion del cliente</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Telefono</label>
        <div class="col-md-9">
            <input type="number" id="Telefono" name="Telefono" class="form-control" placeholder="Telefono" required>
            <span class="help-block">(*) Ingrese el telefono del cliente</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Email</label>
        <div class="col-md-9">
            <input type="Email" id="Email" name="Email" class="form-control" placeholder="Email" required>
            <span class="help-block">(*) Ingrese el email del cliente</span>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>