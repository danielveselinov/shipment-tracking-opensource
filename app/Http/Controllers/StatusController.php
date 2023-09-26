<?php

namespace App\Http\Controllers;

use App\Http\Requests\Status\StatusStoreRequest;
use App\Http\Requests\Status\UpdateStatusRequest;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.statuses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusStoreRequest $request)
    {
        Status::create(['status' => $request->status]);

        return redirect()->route('statuses.index')->with('status', 'status-created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('backend.statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $status->update(['status' => $request->status]);

        return redirect()->route('statuses.index')->with('status', 'status-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('statuses.index')->with('status', 'status-deleted');
    }
}
