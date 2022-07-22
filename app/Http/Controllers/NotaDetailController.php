<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Barryvdh\DomPDF\Facade\Pdf;

class NotaDetailController extends Controller {

    public function cetakPdf()
    {
        $notas = Nota::with(['details', 'details.product'])->get();
        $pdf = PDF::loadView('cetak', [
            'notas' => $notas
        ]);
        return $pdf->stream('Nota Detail.pdf');
    }

}
?>
