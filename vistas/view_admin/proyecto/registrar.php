
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Agregar Proyecto</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <div class="container mt-3">

                    <form action="?controlador=proyecto&accion=registrar" id="fr_regpro" method="POST">
                        <div class="form-group mt-3">
                            <label for="nombre">Nombre del Proyecto:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="fecha_inicio">Fecha de Inicio:</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                        </div>
                        <div class="form-group mt-3">
                            <label for="fecha_fin">Fecha de Fin:</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                        </div>
                        <div class="form-group mt-3">
                            <label for="id_empleado">Empleado:</label>
                            <select name="id_empleado" id="id_empleado" class="form-control">
                                <?php
                                foreach ($this->dato as $value) {
                                    echo "<option value='" . $value["id"] . "'>" . $value["nombres"] . " " . $value["apellidos"] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>