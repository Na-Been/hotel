<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingStoreRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::first();
        return view('admin.setting.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SettingStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $setting = Setting::first();
            $input = $request->all();
            if ($request->hasFile('logo')) {
                $input['logo'] = $request->logo->store('public/setting');
            }
            if ($setting) {
                Setting::update($input);
            } else {
                Setting::create($input);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Setting Added Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('failed', 'Something Went Wrong While Adding Setting');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingStoreRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
