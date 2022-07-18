<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaDetail extends Model
{
    use HasFactory;

    protected $fillable = ['nota_id','product_id','qty'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }
}
