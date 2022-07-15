<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use App\Models\NotaDetail;

class HomeController extends Controller
{
    public function index()
    {
        $transactions = Nota::sum('subtotal');
        $sales = NotaDetail::sum('qty');
        return view('dashboard', [
            'transactions' => $transactions,
            'sales' => $sales
        ]);
    }
}
