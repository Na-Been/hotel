<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassword;
use App\Http\Requests\ProfileStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        return view('admin.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        $datas = 'hello World';
        return response()->json($datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */


    public function update(ProfileStoreRequest $request, $id)
    {
        $loginDetail = $request->only('name', 'email');
        $otherDetails = $request->only('address', 'gender', 'number', 'birth_date', 'education', 'image');
        try {
            $findUser = User::find($id);
            if ($request->image) {
                $otherDetails['image'] = $this->createOrUpdateImage($request);
            }
            $otherDetails['admin_id'] = $id;
            DB::beginTransaction();
            $findUser->update($loginDetail);
            $findUser->profile->update($otherDetails);
            /*UserProfile::updateOrCreate(
                ['admin_id' => $id],
                ['address' => $otherDetails['address'],
                    'gender' => $otherDetails['gender'],
                   'number' => $otherDetails['number'],
                    'birth_date' => $otherDetails['birth_date'],
                    'education' => $otherDetails['education'],
                    'image' => $otherDetails['image'],
                ]);*/
            DB::commit();
            return redirect()->route('profile.index')->with('success', 'Profile Updated Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('profile.index')->with('failed', 'Something went wrong');
        }
    }

    public function createOrUpdateImage($request)
    {
        if ($request->hasFile('image')) {
            return $request->image->store('public/UserProfile');
        }
    }

    public function changePassword(ChangePassword $request, $id)
    {
        try {
            DB::beginTransaction();
            User::find(Auth::id())->update(['password' => Hash::make($request->new_password)]);
            DB::commit();
            return redirect()->route('profile.index')->with('success', 'Password change successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('profile.index')->with('failed', 'Something went Wrong while changing password');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
