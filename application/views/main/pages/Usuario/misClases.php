<style>
    .alert{
        height: 90%;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm">
                    <div class="alert alert-primary" role="alert">
                        <div class="row">
                            <div class="col-10">
                                <b>Clases sin pagar:</b>
                            </div>
                            <div class="col-2">
                                <b><?= $totalSinPagar[0]['totalSinpagar'] ?></b>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <b>Monto total sin pagar:</b>
                            </div>
                            <div class="col-12">
                                <b>$<?= $montoSinPagar[0]['montoSinpagar'] ?></b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="alert alert-success" role="alert">
                        <div class="row">
                            <div class="col-10">
                                <b>Clases pagadas:</b>
                            </div>
                            <div class="col-2">
                                <b><?= $totalPagado[0]['totalPagado'] ?></b>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <b>Monto total pagado:</b>
                            </div>
                            <div class="col-12">
                                <b>$<?= $montoPagado[0]['montoPagado'] ? $montoPagado[0]['montoPagado'] : 0 ?></b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="alert alert-warning" role="alert">
                        <div class="row">
                            <div class="col-11">
                                <b>Total clases Online:</b>
                            </div>
                            <div class="col-1">
                            <b><?= $totalOnline[0]['totalOnline']?></b>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <b>Total de clases presenciales:</b>
                            </div>
                            <div class="col-12">
                                <b><?= $totalPresencial[0]['totalPresencial']?></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 mt-3">
            <table id="misClasesdt" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tipo Clase</th>
                        <th>Cantidad (Horas Clase)</th>
                        <th>Monto a pagar</th>
                        <th>Fecha a pagar</th>
                        <th>Estado de pago</th>
                        <th>Comentarios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($misClases as $value) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $value['tipo_clase'] ?></td>
                            <td><?= $value['cantidad'] ?>Hrs</td>
                            <td>$<?= $value['monto_pagar'] ?></td>
                            <td><?= $value['fecha_pagar'] ?></td>
                            <td><?= $value['estadoPago'] ?></td>
                            <td><?= $value['comentarios'] ?></td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>