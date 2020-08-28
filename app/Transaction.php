<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['product_id', 'trx_date', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function date_transaction()
    {
        // $date = date_create($this->trx_date);
        // dd($date);
        return date_format(date_create($this->trx_date), "d M yy");
    }
}
