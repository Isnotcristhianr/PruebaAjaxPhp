<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <h1>Prueba</h1>
            </div>
            <br>
            <!-- Seleccionar y mostrar Estudiantes -->
            <div class="row">
                <form action="">
                    <select name="estudiante" id="estudiante" class="form-select">
                        <option value="">Seleccionar Estudiante</option>
                        <?php foreach ($estudiantes as $estudiante) : ?>
                            <option value="<?= $estudiante->est_id ?>"><?= $estudiante->est_nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
                <br>
                <a href="<?php echo base_url().'notasEstudiantes' ?>" class="btn btn-primary m-2">
                    Notas Estudiantes
                </a>
                <br>
            </div>
            <br>
            <!-- Mostrar materia y notas del estudiante selecionado -->
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Materia</th>
                            <th scope="col">Nota</th>
                        </tr>
                    </thead>
                    <tbody id="materiaNotas">
                        <!-- Mostrar materia y notas del estudiante selecionado -->
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        /* leer select y mostrar por consolar */
        $(document).ready(function() {
            $('#estudiante').change(function() {
                var estudiante = $(this).val();
                //mostrar estudiante
                console.log(estudiante);

                /* AJAX */
                $.ajax({
                    url: "<?php echo base_url() ?>" +"obtenerMateriaNotas/"+ estudiante,
                    method: "GET",
                    data: {
                        estudiante: estudiante
                    },
                    success: function(data) {
                        //mostrar materia y notas
                        console.log(data);
                        var materiaNotas = JSON.parse(data);
                        var html = '';
                        for (var i = 0; i < materiaNotas.notas.length; i++) {
                            html += '<tr>';
                            html += '<td>' + materiaNotas.materias[i].mat_nombre + '</td>';
                            html += '<td>' + materiaNotas.notas[i].not_not + '</td>';
                            html += '</tr>';
                        }
                        
                    }
                });

            });
        });

    </script>
    <!-- Script -->
    <script src="<?php echo base_url('/public/funciones.js') ?>">
    </script>


</body>

</html>