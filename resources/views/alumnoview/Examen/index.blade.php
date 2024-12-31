@extends('tablar::page')

@section('content')
    <div class="container">
        <h1>Create Exam</h1>

        <form action="{{ route('examen.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="profesor" class="form-label">Profesor</label>
                <select class="form-control" id="profesor" name="profesor_id">
                    <option value="">Seleccione un profesor</option>
                   
                </select>
            </div>

            <div class="mb-3">
                <label for="materia" class="form-label">Materia</label>
                <select class="form-control" id="materia" name="materia_id">
                    <option value="">Seleccione una materia</option>
                    
                </select>
            </div>

            <div class="mb-3">
                <label for="exam_types" class="form-label">Tipo de Examen</label><br>
                <label><input type="checkbox" name="exam_types[]" value="R2"> R2</label>
                <label><input type="checkbox" name="exam_types[]" value="REG"> REG</label>
                <label><input type="checkbox" name="exam_types[]" value="C.I."> C.I.</label>
                <label><input type="checkbox" name="exam_types[]" value="T.S."> T.S.</label>
                <label><input type="checkbox" name="exam_types[]" value="2DO C.I."> 2DO C.I.</label>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script>
        document.getElementById('profesor').addEventListener('change', function () {
            var profesorId = this.value;

            fetch(`/exams/getMateriasByProfesor?profesor_id=${profesorId}`)
                .then(response => response.json())
                .then(data => {
                    var materiaSelect = document.getElementById('materia');
                    materiaSelect.innerHTML = '<option value="">Seleccione una materia</option>';

                    data.forEach(materia => {
                        var option = document.createElement('option');
                        option.value = materia.id;
                        option.textContent = materia.Materia_Nombre;
                        materiaSelect.appendChild(option);
                    });
                });
        });

        document.getElementById('materia').addEventListener('change', function () {
            var materiaId = this.value;

            fetch(`/exams/getProfesoresByMateria?materia_id=${materiaId}`)
                .then(response => response.json())
                .then(data => {
                    var profesorSelect = document.getElementById('profesor');
                    profesorSelect.value = data.id;
                });
        });
    </script>
@endsection