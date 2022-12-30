<div class="container">
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevoUsuario">Nuevo Usuario</button>
        </div>
        <div class="col-12 mt-3">
            <table id="tabledUsuarios" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Rol</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($listaUsuarios as $value) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $value['nombres'] ?></td>
                            <td><?= $value['apellidos'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['estado'] == 1 ? 'Activo' : 'Inactivo' ?></td>
                            <td><?= $value['rol'] ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-sm">
                                        <i class="fas fa-edit" data-toggle="modal" data-target="#modalUserEdit<?= $value['id_usuario'] ?>" style="cursor:pointer;"></i>
                                    </div>
                                    <div class="col-sm">
                                        <i class="fas fa-trash-alt" style="cursor:pointer;" onclick="deleteUser(<?= $value['id_usuario'] ?>)"></i>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalUserEdit<?= $value['id_usuario'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalUserEditLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalUserEditLabel">Actualizar los datos del usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nombresUsuario<?= $value['id_usuario'] ?>">Nombres*:</label>
                                                    <input type="text" value="<?= $value['nombres'] ?>" class="form-control" 
                                                    id="nombresUsuario<?= $value['id_usuario'] ?>"
                                                    name="nombresUsuario">
                                                </div>
                                                <div class="form-group">
                                                    <label for="apellidosUsuario<?= $value['id_usuario'] ?>">Apellidos*:</label>
                                                    <input type="text" value="<?= $value['apellidos'] ?>" class="form-control" 
                                                    id="apellidosUsuario<?= $value['id_usuario'] ?>"
                                                    name="apellidosUsuario">
                                                </div>
                                                <div class="form-group">
                                                    <label for="emailUsuario<?= $value['id_usuario'] ?>">Correo*:</label>
                                                    <input type="email" value="<?= $value['email'] ?>" class="form-control" 
                                                    id="emailUsuario<?= $value['id_usuario'] ?>"
                                                    name="emailUsuario">
                                                </div>
                                                <div class="form-row align-items-center">
                                                    <div class="col-sm-12 my-1">
                                                        <label class="mr-sm-2" for="estadoUsuario<?= $value['id_usuario'] ?>">Estados</label>
                                                        <select class="custom-select mr-sm-2" id="estadoUsuario<?= $value['id_usuario'] ?>" name="estadoUsuario">
                                                            <option value="1" <?php if ($value['estado'] == 1) {
                                                                                    echo 'selected="selected"';
                                                                                } ?>>Activo</option>
                                                            <option value="0" <?php if ($value['estado'] == 0) {
                                                                                    echo 'selected="selected"';
                                                                                } ?>>Inactivo</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 my-1">
                                                        <label class="mr-sm-2" for="rolUsuario<?= $value['id_usuario'] ?>">Rol</label>
                                                        <select class="custom-select mr-sm-2" id="rolUsuario<?= $value['id_usuario'] ?>" name="rolUsuario">
                                                            <?php foreach ($listaRoles as $roles) { ?>
                                                                <option value="<?= $roles['id_rol'] ?>" <?php if ($value['id_rol'] == $roles['id_rol']) {
                                                                                                            echo 'selected="selected"';
                                                                                                        } ?>>
                                                                    <?= $roles['rol'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" onclick="editarDatos(<?= $value['id_usuario'] ?>)">Guardar cambios</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="nuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="nuevoUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoUsuarioLabel">Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-sm-12 form-group">
                        <label for="nombresUsuarioN">Nombres*:</label>
                        <input type="text" class="form-control" id="nombresUsuarioN" required>
                        <div class="invalid-feedback">Este campos es requerido</div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label for="apellidosUsuarioN">Apellidos*:</label>
                        <input type="text" class="form-control" id="apellidosUsuarioN" required>
                        <div class="invalid-feedback">Este campos es requerido</div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label for="emailUsuarioN">Correo*:</label>
                        <input type="email" class="form-control" id="emailUsuarioN" required>
                        <div class="invalid-feedback">Este campos es requerido</div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label for="passwordUsuarioN">Contraseña*:</label>
                        <input type="password" class="form-control" id="passwordUsuarioN" required>
                        <div class="invalid-feedback">Este campos es requerido</div>
                    </div>
                    <div class="col-sm-12 mb-3 form-check" style="margin-left: 10px">
                        <input type="checkbox" class="form-check-input" onclick="verPassword()" id="verPwd">
                        <label class="form-check-label" for="verPwd">Ver contraseña</label>
                    </div>
                    <div class="col-sm-12 form-row align-items-center">
                        <div class="col-sm-12 my-1">
                            <label class="mr-sm-2" for="estadoUsuarioN">Estados</label>
                            <select class="custom-select mr-sm-2" id="estadoUsuarioN" required>
                                <option value="1">Activo</option>
                                <option selected value="0">Inactivo</option>
                            </select>
                        </div>
                        <div class="col-sm-12 my-1">
                            <label class="mr-sm-2" for="rolUsuarioN">Rol</label>
                            <select class="custom-select mr-sm-2" id="rolUsuarioN" required>
                                <?php foreach ($listaRoles as $roles) { ?>
                                    <option value="<?= $roles['id_rol'] ?>">
                                        <?= $roles['rol'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Guardar usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>