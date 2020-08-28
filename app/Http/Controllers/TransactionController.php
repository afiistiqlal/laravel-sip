<?php

namespace App\Http\Controllers;

use App\Imports\TransactionImport;
use App\Transaction;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::all();
        $data = [
            'transaction' => $transaction,
        ];
        return view('admin.page.transaction.index', $data);
    }
    public function create()
    {
        return view('admin.page.transaction.create');
    }

    public function import(Request $request)
    {
        $rules = [
            'excel' => 'required'
        ];

        $messages = [
            'excel.required' => 'File excel tidak boleh kosong'
        ];

        // validasi data
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            // jika data tidak valid
            return Redirect::to('admin/transaction/create')
                ->withErrors($validator);
        }

        $file = $request->file('excel');
        Excel::import(new TransactionImport, $file);
        Session::flash('message', 'File successfully Imported');

        return redirect('admin/transaction');
    }
}
