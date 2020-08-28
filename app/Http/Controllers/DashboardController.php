<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $sql = "SELECT MONTHNAME(trx_date) AS month, count(*) as total FROM transactions" . " GROUP BY MONTHNAME(trx_date) ORDER BY MONTH(trx_date);";
        $transactions = DB::select($sql);

        $month = [];
        $total = [];

        foreach ($transactions as $trx) {
            $month[] = $trx->month;
            $total[] = $trx->total;
        }

        $charts = [
            'months' => $month, //['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus'],
            'data' => $total, //[10, 5, 20, 15, 21, 10, 20, 15],
        ];

        $transactions = Transaction::paginate(5);

        return view('admin.page.dashboard')->with(['data' => $charts, 'transaction' => $transactions]);
    }

    public function create()
    {
        return view('admin.page.category.create');
    }
}
