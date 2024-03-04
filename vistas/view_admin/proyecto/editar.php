

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Editar Proyecto</h1>
        
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <div class="container mt-3">

                    <form action="?controlador=proyecto&accion=actualizar" id="fr_actpro" method="POST">
                        <div class="form-group mt-3">
                            <label for="nombre">Nombre del Proyecto:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"  value="<?php echo $this->datos["nombre"] ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion"  > <?php echo $this->datos["descripcion"]	 ?></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="fecha_inicio">Fecha de Inicio:</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo $this->datos["fecha_inicio"] ?>" >
                        </div>
                        <div class="form-group mt-3">
                            <label for="fecha_fin">Fecha de Fin:</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?php echo $this->datos["fecha_fin"] ?>" >
                        </div>
                        <div class="form-group mt-3">
                            <label for="id_empleado">Empleado:</label>
                            <select name="id_empleado" id="id_empleado" class="form-control">
                                <?php
                                foreach ($this->empleados as $value) {
                                    
                                   if ($value["id"] == $this->datos["id_empleado"]) {
                                    echo "<option value='" . $value["id"] . "' selected>" . $value["nombres"] . " " . $value["apellidos"] . "</option>";
                                   } else {
                                    echo "<option value='" . $value["id"] . "' >" . $value["nombres"] . " " . $value["apellidos"] . "</option>";
                                   }
                                   
                                   
                                }
                                ?>

                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $this->datos["id"] ?>">
                        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>