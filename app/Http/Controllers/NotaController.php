<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\NotaDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class NotaController extends Controller
{

    public function index(Request $req)
    {
        $notas = Nota::with(['details', 'details.product'])->get();
        // $byId = Nota::with(['details', 'details.product'])->where('id',$req->id)->first();
        // dd($nota);
        return view('nota.index', compact('notas'));
    }

    public function create()
    {
        return view('nota.create');
    }

    public function store(Request $request)
    {
        $nota = Nota::create([
            'invoice'   => $request->invoice,
            'subtotal'  => $request->subTotal
        ]);

        // dd($nota);

        // dd($request->data);

        foreach ($request->data as $dt) {
            NotaDetail::create([
                'nota_id'       => $nota->id,
                'product_id'    => $dt['product_id'],
                'qty'           => $dt['qty'],
            ]);
        }

        $notaDetails = NotaDetail::where('nota_id', $nota->id)->get();
        foreach ($notaDetails as $dt) {
            $product = Product::find($dt->product_id);
            $product->stock = $product->stock - $dt->qty;
            $product->save();
        }

        // dd($notaDetails);

        return to_route('nota-detail');
    }

    public function show($id)
    {
        $nota = Nota::with(['details', 'details.product'])->find($id);
        return response($nota);
    }

    public function print($id)
    {
        $notas = Nota::with(['details', 'details.product'])->find($id);
        return view('nota.print', compact('notas'));
        // return response($notas);
    }
}
