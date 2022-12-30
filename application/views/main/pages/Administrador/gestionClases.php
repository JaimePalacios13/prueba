<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevaClase">Nuevo Usuario</button>
        </div>
        <div class="col-sm-12 mt-3">
            <table id="tableClases" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tipo Clase</th>
                        <th>Cantidad</th>
                        <th>Monto a pagar</th>
                        <th>Fecha a pagar</th>
                        <th>Comentarios</th>
                        <th>Estado</th>
                        <th>Asignado a</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($listaClases as $value) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $value['tipo_clase'] ?></td>
                            <td><?= $value['cantidad'] ?>Hrs</td>
                            <td>$<?= $value['monto_pagar'] ?></td>
                            <td><?= $value['fecha_pagar'] ?></td>
                            <td><?= $value['comentarios'] ?></td>
                            <td><?= $value['estadoPago'] ?></td>
                            <td><?= $value['nombres'] ?> <?= $value['apellidos'] ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-sm">
                                        <i class="fas fa-edit" data-toggle="modal" data-target="#modalClaseEdita<?= $value['id_clase'] ?>" style="cursor:pointer;"></i>
                                    </div>
                                    <div class="col-sm">
                                        <i class="fas fa-trash-alt" style="cursor:pointer;" onclick="deleteClase(<?= $value['id_clase'] ?>)"></i>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalClaseEdita<?= $value['id_clase'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalClaseEdita<?= $value['id_clase'] ?>Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalClaseEdita<?= $value['id_clase'] ?>Label">Editar Clase</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-3 needs-validation-clases-edit" novalidate>
                                                    <div class="col-sm-12 form-group">
                                                        <label class="mr-sm-2" for="tipoClases<?= $value['id_clase'] ?>">Seleccione Tipo de clase</label>
                                                        <select class="custom-select mr-sm-2" id="tipoClases<?= $value['id_clase'] ?>" required>
                                                            <?php foreach ($tiposClase as $tipo) { ?>
                                                                <option value="<?= $tipo['id_tipo_clase'] ?>"
                                                                <?php if ($value['id_tipo_clase'] == $tipo['id_tipo_clase']) {
                                                                    echo 'selected="selected"';
                                                                } ?>
                                                                >
                                                                    <?= $tipo['tipo_clase'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="CantidadHoraClase<?= $value['id_clase'] ?>">Cantidad(Hora Clase)*:</label>
                                                        <input type="number" class="form-control" value="<?= $value['cantidad'] ?>" id="CantidadHoraClase<?= $value['id_clase'] ?>" required>
                                                        <div class="invalid-feedback">Este campos es requerido</div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="montopagar<?= $value['id_clase'] ?>">Monto a pagar*:</label>
                                                        <input type="number" class="form-control" value="<?= $value['monto_pagar'] ?>" id="montopagar<?= $value['id_clase'] ?>" required>
                                                        <div class="invalid-feedback">Este campos es requerido</div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label for="fechaPagar<?= $value['id_clase'] ?>">Fecha a pagar.*:</label>
                                                        <input type="date" class="form-control" value="<?= $value['fecha_pagar'] ?>" id="fechaPagar<?= $value['id_clase'] ?>" required>
                                                        <div class="invalid-feedback">Este campos es requerido</div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="mr-sm-2" for="estadoPago<?= $value['id_clase'] ?>">Estado de pago</label>
                                                        <select class="custom-select mr-sm-2" id="estadoPago<?= $value['id_clase'] ?>" required>
                                                            <option value="Pagado" <?php if ($value['estadoPago'] == 'Pagado') {echo 'selected="selected"';} ?>>Pagado</option>
                                                            <option value="Sin Pagar" <?php if ($value['estadoPago'] == 'Sin Pagar') {echo 'selected="selected"';} ?>>Sin Pagar</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 form-group">
                                                        <label for="comentarios<?= $value['id_clase'] ?>">Comentarios*:</label>
                                                        <input type="text" class="form-control" value="<?= $value['comentarios'] ?>" id="comentarios<?= $value['id_clase'] ?>" required>
                                                        <div class="invalid-feedback">Este campos es requerido</div>
                                                    </div>
                                                    <div class="col-sm-12 form-group">
                                                        <label class="mr-sm-2" for="asignadoa<?= $value['id_clase'] ?>">Asignar clase a:</label>
                                                        <select class="custom-select mr-sm-2" id="asignadoa<?= $value['id_clase'] ?>" required>
                                                            <?php foreach ($listaUsuarios as $usuarios) { ?>
                                                                <?php if ($usuarios['id_rol'] == 2) { ?>
                                                                    <option value="<?= $usuarios['id_usuario'] ?>"
                                                                    <?php if ($value['id_usuario'] == $usuarios['id_usuario']) {
                                                                        echo 'selected="selected"';
                                                                    } ?>1
                                                                    >
                                                                        <?= $usuarios['nombres'] ?> <?= $usuarios['apellidos'] ?>
                                                                    </option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 mt-4">
                                                        <button type="submit" class="btn btn-primary btn-block" onclick="editarClase(<?= $value['id_clase'] ?>)">Guardar cambios</button>
                                                    </div>
                                                </div>
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

<div class="modal fade" id="nuevaClase" tabindex="-1" role="dialog" aria-labelledby="nuevaClaseLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevaClaseLabel">Nueva Clase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation-clases" novalidate>
                    <div class="col-sm-12 form-group">
                        <label class="mr-sm-2" for="tipoClases">Seleccione Tipo de clase</label>
                        <select class="custom-select mr-sm-2" id="tipoClases" required>
                            <?php foreach ($tiposClase as $tipo) { ?>
                                <option value="<?= $tipo['id_tipo_clase'] ?>">
                                    <?= $tipo['tipo_clase'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="CantidadHoraClase">Cantidad(Hora Clase)*:</label>
                        <input type="number" class="form-control" id="CantidadHoraClase" required>
                        <div class="invalid-feedback">Este campos es requerido</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="montopagar">Monto a pagar*:</label>
                        <input type="number" class="form-control" id="montopagar" required>
                        <div class="invalid-feedback">Este campos es requerido</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="fechaPagar">Fecha a pagar.*:</label>
                        <input type="date" class="form-control" id="fechaPagar" required>
                        <div class="invalid-feedback">Este campos es requerido</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label class="mr-sm-2" for="estadoPago">Estado de pago</label>
                        <select class="custom-select mr-sm-2" id="estadoPago" required>
                            <option value="Pagado">Pagado</option>
                            <option value="Sin Pagar">Sin Pagar</option>
                        </select>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label for="comentarios">Comentarios*:</label>
                        <input type="text" class="form-control" id="comentarios" required>
                        <div class="invalid-feedback">Este campos es requerido</div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="mr-sm-2" for="asignadoa">Asignar clase a:</label>
                        <select class="custom-select mr-sm-2" id="asignadoa" required>
                            <?php foreach ($listaUsuarios as $usuarios) { ?>
                                <?php if ($usuarios['id_rol'] == 2) { ?>
                                    <option value="<?= $usuarios['id_usuario'] ?>">
                                        <?= $usuarios['nombres'] ?> <?= $usuarios['apellidos'] ?>
                                    </option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Guardar clase</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>