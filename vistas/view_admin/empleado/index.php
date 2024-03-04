<main id="main" class="main">
    <div class="pagetitle">
        <h1>Admin Empleados</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Registrar Empleados
                </button>

                <div class="table-responsive mt-3 ">
                    <table id="dataTable" class="mt-3 cell-border" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Fecha contratacion</th>
                                <th>Salario</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>


        <!-- Modal registroo -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="?controlador=empleado&accion=registrar" id="frm_reg" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mt-2"><strong>Subir foto</strong></h5>
                                    <div class="container d-flex justify-content-center">
                                        <label for="subirfoto" class="btn btn-primary">
                                            <input type="file" id="subirfoto" name="foto" style="display: none;" accept="image/jpeg, image/png, image/gif" required>
                                            Cargar archivo
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Digite sus nombres</label>
                                        <input type="text" class="form-control" name="nombres" id="nombres" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">Digite sus Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Digite el Salario</label>
                                        <input type="number" class="form-control" name="salario" id="salario" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">Fecha de contratacion</label>
                                    <input type="date" class="form-control" name="fecha_contratacion" id="fecha_contratacion" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Digite su Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">Digite su contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
   <!-- ----------------- -->



    <!-- Modal editar -->
    <div class="modal fade" id="modal_act" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="?controlador=empleado&accion=actualizar" id="frm_actualizar" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mt-2"><strong>Subir foto</strong></h5>
                                    <div class="container d-flex justify-content-center">
                                        <label for="subirfoto" class="btn btn-primary">
                                            <input type="file" id="subirfoto_act" name="foto" style="display: none;" accept="image/jpeg, image/png, image/gif" >
                                            Cargar archivo
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Digite sus nombres</label>
                                        <input type="text" class="form-control" name="nombres" id="nombres_act" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">Digite sus Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos_act" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Digite el Salario</label>
                                        <input type="number" class="form-control" name="salario" id="salario_act" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">Fecha de contratacion</label>
                                    <input type="date" class="form-control" name="fecha_contratacion" id="fecha_contratacion_act" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Digite su Email</label>
                                        <input type="email" class="form-control" name="email" id="email_act" required>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="uid" id="uid_act">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
   <!-- ----------------- -->


    </section>
</main>
