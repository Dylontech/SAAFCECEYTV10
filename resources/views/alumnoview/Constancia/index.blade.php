@extends('tablar::page')



@section('content')
    <div class="container">
        <h1>Servicios</h1>

        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="services" class="form-label">Seleccione los servicios que necesita:</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="constancia_de_inscripcion" id="constancia_de_inscripcion">
                    <label class="form-check-label" for="constancia_de_inscripcion">Constancia de inscripción</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="duplicado_de_credencial" id="duplicado_de_credencial">
                    <label class="form-check-label" for="duplicado_de_credencial">Duplicado de credencial</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="certificado_incompleto_parcial" id="certificado_incompleto_parcial">
                    <label class="form-check-label" for="certificado_incompleto_parcial">Certificado incompleto parcial</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="duplicado_de_certificado_de_estudios" id="duplicado_de_certificado_de_estudios">
                    <label class="form-check-label" for="duplicado_de_certificado_de_estudios">Duplicado de certificado de estudios</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="examen_de_titulacion" id="examen_de_titulacion">
                    <label class="form-check-label" for="examen_de_titulacion">Examen de titulación</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="titulacion" id="titulacion">
                    <label class="form-check-label" for="titulacion">Titulación (Tit y Exp de Ced. Prof)</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Solicitar Servicios</button>
        </form>
    </div>
@endsection