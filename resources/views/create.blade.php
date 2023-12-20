<!-- resources/views/employee/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Empleado</h2>
        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ci">CI</label>
                <input type="number" class="form-control" id="ci" name="ci" required>
            </div>
            <div class="form-group">
                <label for="photo">Foto</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="number" class="form-control" id="dni" name="dni" required>
            </div>
            <div class="form-group">
                <label for="dni_type">Tipo de DNI</label>
                <select class="form-control" id="dni_type" name="dni_type" required>
                    <!-- Opciones del tipo de DNI -->
                </select>
            </div>
            <div class="form-group">
                <label for="first_name">Nombre</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Apellido</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="gender">Género</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_born">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="date_born" name="date_born" required>
            </div>
            <div class="form-group">
                <label for="telephone">Teléfono</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" required>
            </div>
            <div class="form-group">
                <label for="blood_type">Tipo de Sangre</label>
                <input type="text" class="form-control" id="blood_type" name="blood_type" required>
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="contact">Contacto</label>
                <input type="number" class="form-control" id="contact" name="contact" required>
            </div>
            <div class="form-group">
                <label for="pdf_document">Documento PDF</label>
                <input type="file" class="form-control" id="pdf_document" name="pdf_document" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
