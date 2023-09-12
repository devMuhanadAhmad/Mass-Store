<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contactus;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Redirect,Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $record = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();

        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);


        $store_id = Auth::user()->store_id;
        return view('dashboard', [
            'lastOrder' => Order::with('user')->latest()->limit(5)->get(),
            'message' => Contactus::latest()->limit(5)->get(),
            'orders' => Order::with('user')->where('store_id', $store_id)->latest()->limit(5)->get(),
            'chart_data'=>$data['chart_data']
        ]);
    }

}
