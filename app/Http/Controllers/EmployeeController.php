<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Document;

class EmployeeController extends Controller
{
    /**
     * Muestra el formulario para crear un nuevo empleado.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Almacena un nuevo empleado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar la entrada del formulario
        $request->validate([
            'ci' => 'required|integer',
            'photo' => 'required|image',
            'dni' => 'required|integer',
            'dni_type' => 'required|integer',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string|in:M,F',
            'date_born' => 'required|date',
            'telephone' => 'required|string',
            'blood_type' => 'required|string',
            'address' => 'required|string',
            'contact' => 'required|integer',
            'pdf_document' => 'required|mimes:pdf|max:2048',
        ]);

        // Almacenar la foto en la carpeta de almacenamiento (public/images)
        $photoPath = $request->file('photo')->store('images', 'public');

        // Crear el empleado
        $employee = new Employee([
            'ci' => $request->input('ci'),
            'photo' => $photoPath,
            'dni' => $request->input('dni'),
            'dni_type' => $request->input('dni_type'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'date_born' => $request->input('date_born'),
            'telephone' => $request->input('telephone'),
            'blood_type' => $request->input('blood_type'),
            'address' => $request->input('address'),
            'contact' => $request->input('contact'),
        ]);

        $employee->save();

        // Almacenar el documento PDF en la carpeta de almacenamiento (public/pdfs)
        $pdfPath = $request->file('pdf_document')->store('pdfs', 'public');

        // Crear el documento asociado al empleado
        $document = new Document([
            'title' => 'Documento de ' . $employee->first_name . ' ' . $employee->last_name,
            'content' => 'Contenido del documento',
            'unique_code' => uniqid(),
            'qr_code_path' => 'qrcodes/' . uniqid() . '.png', // Ajusta según tu lógica
            'pdf_path' => $pdfPath,
        ]);

        $employee->documents()->save($document);

        // Redirigir a la vista del empleado o a donde desees
        return redirect()->route('employees.show', $employee->id);
    }

    /**
     * Muestra los detalles de un empleado.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\View\View
     */
    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }
}

