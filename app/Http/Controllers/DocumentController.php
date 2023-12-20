<?php

// app/Http/Controllers/DocumentController.php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\Document;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DocumentController extends Controller
{
    public function generateDocument(Request $request)
    {
        // Lógica para generar el documento...

        // Asigna un código único al documento (se puede usar un UUID)
        $uniqueCode = uniqid();

        // Guarda el documento en la base de datos
        $document = new Document([
            'title' => 'Nombre del documento',
            'content' => 'Contenido del documento',
            'unique_code' => $uniqueCode,
            // ... otras columnas del documento
        ]);

        $document->save();

        // Genera el código QR
        $qrCodePath = 'qrcodes/' . $uniqueCode . '.png';
        QrCode::format('png')->size(200)->generate(route('document.show', $document->id), public_path($qrCodePath));

        // Asocia el archivo del código QR al documento en la base de datos
        $document->qr_code_path = $qrCodePath;
        $document->save();

        // Genera la vista Blade como una cadena HTML
        $html = view('document', compact('document'))->render();

        // Convierte el HTML en un documento PDF
        $pdf = PDF::loadHtml($html);

        // Guarda el PDF en la carpeta deseada
        $pdfPath = 'pdfs/' . $uniqueCode . '.pdf';
        $pdf->save(public_path($pdfPath));

        // Asocia el archivo PDF al documento en la base de datos
        $document->pdf_path = $pdfPath;
        $document->save();

        // Resto de la lógica para la generación del documento...

        return view('document.show', compact('document'));
    }

    public function show(Document $document)
    {
        // Lógica para mostrar el documento...
        return view('document.show', compact('document'));
    }
}


