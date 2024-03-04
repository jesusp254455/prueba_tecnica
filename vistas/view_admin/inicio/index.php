<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="d-flex flex-column align-items-center text-center ">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                class="rounded-circle" width="150">
                            <div class="mt-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $this->info["nombres"] ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $this->info["correo"] ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Rol</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php
                                if ($this->info["rol"] == "1") {
                                    echo "Administrador";
                                } else if ($this->info["rol"] == "2") {
                                    echo "Usuario";
                                } else {
                                    echo "Editor";
                                }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
        <?php if($_SESSION["rol"] == "1" || $_SESSION["rol"] == "3") { ?>
        <canvas id="myChart"></canvas>
        <?php  }?>
        </div>
    </section>
</main>
<?php
echo '<input type="hidden" id="mesesData" value="' . htmlspecialchars(json_encode($this->meses)) . '">';
?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const mesesData = JSON.parse(document.getElementById('mesesData').value);

    var data = {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
            label: 'Ventas por Mes',
            data: [mesesData["ENERO"], 
                   mesesData["FEBRERO"], 
                   mesesData["MARZO"], 
                   mesesData["ABRIL"], 
                   mesesData["MAYO"], 
                   mesesData["JUNIO"], 
                   mesesData["JULIO"], 
                   mesesData["AGOSTO"], 
                   mesesData["SEPTIEMBRE"], 
                   mesesData["OCTUBRE"], 
                   mesesData["NOVIEMBRE"], 
                   mesesData["DICIEMBRE"]],  
                //    datos para la grafica
            backgroundColor: '#4154f1', // Color de fondo
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1
        }]
    };

    // Opciones del gráfico
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };

    // Crear el gráfico
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
});
</script>