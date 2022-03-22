<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomStoreRequest;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoomStoreRequest $request
     * @return RedirectResponse|Response
     */
    public function store(RoomStoreRequest $request)
    {
        try {
            $input = $request->all();
            DB::beginTransaction();
            $input['feature_image'] = $this->createOrUpdateImage($request);
            $input['room_images'] = $this->storeMultipleImage($request);
            Room::create($input);
            DB::commit();
            return redirect()->route('room.index')->with('success', 'Room Added Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('room.index')->with('failed', 'Room cannot be added');
        }
    }

    public function createOrUpdateImage($request)
    {
        if ($request->hasFile('feature_image')) {
            return $request->feature_image->store('public/rooms');
        }
    }

    public function storeMultipleImage($request)
    {
        $images = [];
        if ($request->hasFile('room_images')) {
            foreach ($request->file('room_images') as $image) {
                $name = time() . rand(1, 99) . $image->getClientOriginalName();
                $path = 'public/rooms/';
                $image->storeAs($path, $name);
                $data = $name;
                array_push($images, $data);
            }
        }
        return json_encode($images);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(RoomStoreRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $room = Room::find($id);
            if ($request->hasFile('feature_image')) {
                $input['feature_image'] = $this->createOrUpdateImage($request);
            }
            $room->update($input);
            DB::commit();
            return redirect()->route('room.index')->with('success', 'Room updated successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('room.index')->with('failed', 'Room Cannot be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $room = Room::find($id);
            DB::beginTransaction();
            if ($room) {
                $room->delete();
                Storage::delete($room->feature_image);
                $images = json_decode($room->room_images);
                foreach ($images as $image) {
                    Storage::delete('public/rooms/' . $image);
                }
            }
            DB::commit();
            return redirect()->route('room.index')->with('success', 'Room Deleted Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('room.index')->with('failed', 'Room cannot be Deleted');
        }
    }
}
