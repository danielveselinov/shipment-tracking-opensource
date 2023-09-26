<?php

namespace App\Http\Controllers;

use App\Http\Requests\Shipment\ShipmentStoreRequest;
use App\Http\Requests\Shipment\ShipmentUpdateRequest;
use App\Models\Shipment;
use App\Models\Status;
use App\Models\User;
use App\Notifications\ShipmentCreated;
use App\Notifications\ShipmentStatusUpdated;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.shipments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carriers = User::carriers()->get();
        $statuses = Status::all();

        return view('backend.shipments.create', compact('carriers', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShipmentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShipmentStoreRequest $request)
    {
        $tacking_code = strtoupper(Str::random(13));

        $shipment = Shipment::create([
            'user_id' => $request->carrier,
            'tracking_code' => $tacking_code,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'expected_delivery_date' => $request->expected_delivery_date,
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
        ]);

        $shipment->statuses()->attach($request->status);

        Notification::route('mail', [
            $shipment->customer_email
        ])->notify(new ShipmentCreated($shipment));

        return redirect()->route('shipments.index')->with('status', 'shipment-created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Shipment $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        $carriers = User::carriers()->get();
        $statuses = Status::all();

        return view('backend.shipments.edit', compact('shipment', 'carriers', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Shipment $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(ShipmentUpdateRequest $request, Shipment $shipment)
    {
        $shipment->update([
            'user_id' => $request->carrier,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'expected_delivery_date' => $request->expected_delivery_date,
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
        ]);

        if ($request->status) {
            $shipment->updated_at = now();
            $shipment->save();

            $shipment->statuses()->attach($request->status);

            Notification::route('mail', [
                $shipment->customer_email
            ])->notify(new ShipmentStatusUpdated($shipment));
        }

        return redirect()->route('shipments.index')->with('status', 'shipment-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Shipment $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment)
    {
        $shipment->statuses()->detach();
        $shipment->delete();

        return redirect()->route('shipments.index')->with('status', 'shipment-deleted');
    }
}
