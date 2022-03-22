<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $datas = AboutUs::all();
        return view('admin.aboutus.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $input = $request->all();
            AboutUs::create($input);
            DB::commit();
            return redirect()->route('aboutus.index')->with('success', 'About us created Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('aboutus.index')->with('failed', 'Cannot Create the About Us');
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
        $findData = AboutUs::find($id);
        return view('admin.aboutus.edit', compact('findData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $findData = AboutUs::find($id);
        try {
            DB::beginTransaction();
            $input = $request->all();
            $findData->update($input);
            DB::commit();
            return redirect()->route('aboutus.index')->with('success', 'About Us Updated Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('aboutus.edit', ['aboutus' => $id])->with('failed', 'About Us Cannot Be Updated');
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
            $findData = AboutUs::find($id);
            $findData->delete();
            DB::commit();
            return redirect()->route('aboutus.index')->with('success', 'About Us Data Deleted Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('aboutus.index')->with('failed', 'About Us Cannot Be Deleted');
        }
    }
}
