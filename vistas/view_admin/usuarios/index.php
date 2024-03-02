<main id="main" class="main">
    <div class="pagetitle">
        <h1>Admin Usuarios</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Registrar Usuarios
                </button>

                <div class="table-responsive mt-3 ">
                    <table id="dataTable" class="mt-3 cell-border" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Tipo de usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="?controlador=usuario&accion=registrar" id="frm_reg" method="post" enctype="multipart/form-data">
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
                            <div class="row">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="form-label">Escoja el tipo de usuario</label>
                                    <select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
                                        <option selected value="">Seleccione una opción</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Empleado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="form-label">Digite sus nombres</label>
                                        <input type="text" class="form-control" name="nombres" id="nombres" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Digite sus Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="form-label">Digite su Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Digite su contraseña</label>
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
    </section>
</main>
<style>
/* #dataTable_wrapper #dataTable_paginate .paginate_button {
    color: white !important;
    padding: 5px 10px;
    margin: 0 2px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #0d6efd;
} */

/* #dataTable_paginate .paginate_button:hover {
    background-color: ;
} */
</style>