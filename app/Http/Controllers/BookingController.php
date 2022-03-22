<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\BannerImage;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Response as ResponseAlias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|ResponseAlias
     */
    public function index()
    {
        $bookingBannerImages = BannerImage::where('route_name', 'Book Now')->first();
        return view('home.booking', compact('bookingBannerImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        if (request()->wantsJson()) {
            try {
                Booking::where('status', 0)
                    ->update(['status' => 1]);
                return response()->json('success', '200');
            } catch (\Exception $exception) {
                return response()->json('failed', '500');
            }
        } else return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookingRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            Booking::create($input);
        
            $this->sendMail($request);
            DB::commit();
            return redirect()->route('booking.index')->with('success', 'Reservation is done. Thank you for booking');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('booking.index')->with('failed', 'Reservation could not be done');
        }

    }

    public function sendMail($request)
    {
        $to_email = $request->email;
        $name = config('mail.from.name');
        Mail::send('mail.mail', compact('name'), function ($mail) use ($to_email) {
            $mail->to($to_email)->subject('Booking Details');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|ResponseAlias
     */
    public function show($id)
    {
        $roomDetails = Room::where('room_slug', $id)->first();
        $roomImages = json_decode($roomDetails->room_images);
        $availableRooms = Room::all();
        return view('home.details', compact('roomDetails', 'roomImages', 'availableRooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return ResponseAlias
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BookingRequest $request, $id)
    {

        $roomType = Room::where('room_slug', $id)->first();
        try {
            DB::beginTransaction();
            $input = $request->all();
            $input['room_type'] = $roomType->room_type;
            $input['ac_or_non'] = $roomType->ac;
            Booking::create($input);
            DB::commit();
            $this->sendMail($request);
            return redirect()->route('booking.show', ['booking' => $id])->with('success', 'Reservation is done. Thank you for booking');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('booking.show', ['booking' => $id])->with('failed', 'Reservation could not be done');
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
            $findData = Booking::find($id);
            $findData->delete();
            return redirect()->route('admin.create')->with('success', 'Booking deleted Successfully');
        } catch (Exception $exception) {
            return redirect()->route('admin.create')->with('failed', "Booking can't be delete.");
        }
    }
}
