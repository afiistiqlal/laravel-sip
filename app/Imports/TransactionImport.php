<?php

namespace App\Imports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $trans = [
        //     'product_id'=>$row['product_id'],
        //     'trx_date'=>$row['trx_date'],
        //     'price'=>$row['price'],
        // ];
        // dd($trans);
        return new Transaction([
            'product_id'=>$row['product_id'],
            'trx_date'=>$row['trx_date'],
            'price'=>$row['price'],
        ]);
    }
}
