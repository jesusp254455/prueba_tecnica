<main id="main" class="main">
    <div class="pagetitle">
        <h1>Admin Usuarios</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                    data-bs-target="#modalusuario">
                    Registrar Usuarios
                </button>
                    </div>
                    <div class="col-6">
                        <input type="search" class="form-control mt-3" name="buscarxapellidos" id="buscarxapellidos" placeholder="Buscar usuario">
                    </div>
                </div>
                <div class="table-responsive mt-3">
                        <table class="table">
                                <thead>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                </thead>
                                <tbody id="impusers">

                                </tbody>
                        </table>
                </div>  
            </div>

            <!-- registro de usuario -->
            <div class="modal fade" id="modalusuario" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="?controlador=usuario&accion=registrar" id="frm_regusuario" method="post"
                            enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="form-label">Digite sus nombres</label>
                                            <input type="text" class="form-control" name="nombres" id="nombres"
                                                required>
                                        </div>
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
                                        <div class="form-group">
                                            <label for="" class="form-label">Digite Contraseña</label>
                                            <input type="password" class="form-control" name="contraseña" id="contraseña"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label for="" class="form-label">Elija rol</label>
                                            <select name="rol" id="rol" class="form-select">
                                                <option value="1">Administrador</option>
                                                <option value="2">Usuario</option>
                                                <option value="3">Editor</option>
                                            </select>
                                        </div>
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
            <!-- ------------------ -->

                        <!-- editar de usuario -->
                        <div class="modal fade" id="editarusuario" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar datos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="?controlador=usuario&accion=actualizar" id="frm_edtusuario" method="post"
                            enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="form-label">Digite sus nombres</label>
                                            <input type="text" class="form-control" name="nombres" id="nombres_editar"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="form-label">Digite su Email</label>
                                            <input type="email" class="form-control" name="email" id="email_editar" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label for="" class="form-label">Elija rol</label>
                                            <select name="rol" id="rol_editar" class="form-select">
                                                <option value="1">Administrador</option>
                                                <option value="2">Usuario</option>
                                                <option value="3">Editor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="uid_usuario" id="uid_usuario">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- ------------------ -->
        </div>
    </section>
</main>