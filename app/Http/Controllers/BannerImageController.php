<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $imageDetails = BannerImage::all();
        return view('admin.image.indexBanner', compact('imageDetails'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.createBanner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ImageRequest $request)
    {
        try {
            $requestSection = $request->section;
            $findSection = BannerImage::where('section', $requestSection)->first();
            if ($findSection) {
                return redirect()->route("banner.index")->with('failed', 'Banner Image Section Already Exists');
            } else {
                DB::beginTransaction();
                $input = $request->all();
                if ($request->hasFile('images')) {
                    $bannerImages = BannerImage::where('section', 1)->first();
                    if ($bannerImages != null) {
                        $values = json_decode($bannerImages->images);
                        if (count($values) > 3) {
                            $input['images'] = $this->createImage($request);
                        } else {
                            return redirect()->route('banner.index')->with('failed', 'Home Banner Image Is full. Remove to add new');
                        }
                    } else {
                        $input['images'] = $this->createImage($request);
                    }

                } else {
                    $request->hasFile('image');
                    $input['image'] = $request->image->store('public/bannerImage');
                }
                BannerImage::create($input);
                DB::commit();
                return redirect()->route("banner.index")->with('success', 'Banner Image Uploaded Successfully');
            }
        } catch
        (Exception $exception) {
            DB::rollBack();
            return redirect()->route("banner.index")->with('failed', 'Banner Image could not be Uploaded');
        }

    }

    public function createImage($request)
    {
        $finalImages = [];
        $images = $request->images;
        foreach ($images as $image) {
            $name = time() . rand(1, 99) . $image->getClientOriginalName();
            $path = 'public/bannerImage/';
            $image->storeAs($path, $name);
            $data = $name;
            array_push($finalImages, $data);
        }
        return json_encode($finalImages);
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
        $images = BannerImage::find($id);
        return view('admin.image.editBanner', compact('images'));
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
        $findImage = BannerImage::find($id);
        try {
            DB::beginTransaction();
            $this->validate($request, [
                'image_title' => 'required',
                'image_description' => 'required',
                'route_name' => 'required',
            ]);
            if ($request->has('section')) {
                $this->validate($request, [
                    'section' => 'required'
                ]);
            }
            $input = $request->all();
            $findImage->update($input);
            DB::commit();
            return redirect()->route('banner.index')->with('success', 'Image Updated Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('banner.edit', ['banner' => $id])->with('failed', 'Image Cannot be updated');
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
            $images = BannerImage::find($id);
            $images->delete();
            foreach ($images as $image) {
                Storage::delete('public/bannerImage/' . $image);
            }
            DB::commit();
            return redirect()->route('banner.index')->with('success', 'Image deleted Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->route('banner.index')->with('failed', 'Image cannot be deleted');
        }
    }

}
