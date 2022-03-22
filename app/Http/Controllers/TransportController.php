<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransportStoreRequest;
use App\Models\Transport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Transport::all();
        return view('admin.transportation.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transportation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TransportStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $input['vehicle_image'] = $this->createOrUpdateImage($request);
            Transport::create($input);
            DB::commit();
            return redirect()->route('transport.index')->with('success', 'Vehicle Addded Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('transport.index')->with('failed', 'Vehicle Cannot Be added');
        }

    }

    public function createOrUpdateImage($request)
    {
        if ($request->hasFile('vehicle_image')) {
            return $request->vehicle_image->store('public/Vehicles');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Transport::find($id);
        return view('admin.transportation.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TransportStoreRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $vehicle = Transport::find($id);
            if ($request->hasFile('vehicle_image')) {
                Storage::delete($vehicle->vehicle_image);
                $input['vehicle_image'] = $this->createOrUpdateImage($request);
            }
            $vehicle->update($input);
            DB::commit();
            return redirect()->route('transport.index')->with('success', 'Vehicle Updated Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('transport.index')->with('failed', 'Vehicle Cannot be added');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
        $findVehicle = Transport::find($id);
        $findVehicle->delete();
        Storage::delete($findVehicle->vehicle_image);
        DB::commit();
        return redirect()->route('transport.index')->with('success','Vehicle Deleted Successffully');
        }catch (Exception $exception){
            DB::rollBack();
            return redirect()->route('transport.index')->with('failed','Vehicle Cannot tobedeleted');
        }

    }
}
