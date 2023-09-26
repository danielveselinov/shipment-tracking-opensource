<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $shipments = Shipment::count();
        $statuses = Status::count();
        $carriers = User::carriers()->count();

        return view('backend.dashboard', compact('shipments', 'statuses', 'carriers'));
    }
}
