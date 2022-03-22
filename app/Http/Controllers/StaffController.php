<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffStoreRequest;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use TheSeer\Tokenizer\Exception;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('admin.staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StaffStoreRequest $request)
    {
        try {
//            $loginDetails = $request->only('name', 'email', 'password');
//            $loginDetails['password'] = Hash::make('password');
//            $user = User::create($loginDetails);
//            $userId = $user->id;
//            $otherDetails = $request->only('joining_date','gender', 'role','number','birth_date','address','image','education');
            $staff = $request->all();
            DB::beginTransaction();
            if ($request->image) {
                $staff['image'] = $this->createOrUpdateImage($request);
            }
            Staff::create($staff);
            DB::commit();
            return redirect()->route('staff.index')->with('success', 'Staff Added Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('staff.create')->with('error', 'Something Went Wrong Please Try Again');
        }
    }


    public function createOrUpdateImage($request)
    {
        if ($request->hasFile('image')) {
            return $request->image->store('public/Staff');
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
        $staff = Staff::find($id);
        return view('admin.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StaffStoreRequest $request, $id)
    {
        try {
//            $loginDetails = $request->only('name', 'email');
//            $otherDetails = $request->only('joining_date', 'gender', 'role', 'number', 'birth_date', 'address', 'image', 'education');
//            $staffLogin = User::find($id);
            $input = $request->all();
            $staff = Staff::find($id);
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                $input['image'] = $this->createOrUpdateImage($request);
            }
            $staff->update($input);
            DB::commit();
            return redirect()->route('staff.index')->with('success', 'Staff Updated Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('staff.edit')->with('errors', 'Something Went Wrong');
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
            $staff = Staff::find($id);
            $staff->delete();
            Storage::delete($staff->image);
            DB::commit();
            return redirect()->route('staff.index')->with('success', 'Staff Successfully Removed');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('staff.index')->with('failed', 'Staff Cannot Be removed');
        }
    }
}
