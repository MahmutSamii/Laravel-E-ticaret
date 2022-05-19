<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetails extends Model
{
    use HasFactory,softDeletes;

    protected $primaryKey = 'invoice_detail_id';

    protected $fillable = [
        'invoice_detail_id',
        'invoice_id',
        'product_id',
        'quantity',
        'unit_price',
        'total'
    ];
}
