<?php

namespace App\Http\Controllers;

use App\Http\Requests\Carrier\CarrierStoreRequest;
use App\Http\Requests\Carrier\CarrierUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CarrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.carriers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('backend.carriers.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarrierStoreRequest $request)
    {
        User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('carriers.index')->with('status', 'carrier-created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $carrier
     * @return \Illuminate\Http\Response
     */
    public function edit(User $carrier)
    {
        $roles = Role::all();

        return view('backend.carriers.edit', compact('carrier', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $carrier
     * @return \Illuminate\Http\Response
     */
    public function update(CarrierUpdateRequest $request, User $carrier)
    {
        if ($request->password) {
            $carrier->update(['password' => bcrypt($request->password)]);
        }

        $carrier->update([
            'role_id' => $request->role,
            'name' => $request->name,
//            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('carriers.index')->with('status', 'carrier-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $carrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $carrier)
    {
        $carrier->delete();

        return redirect()->route('carriers.index')->with('status', 'carrier-deleted');
    }
}
