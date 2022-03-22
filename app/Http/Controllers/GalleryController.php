<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::all();
        return view('admin.image.indexGallery', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.createGallery');
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
            'image_title' => 'required',
            'images' => 'required|max:4096',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
        ]);
        try {
            DB::beginTransaction();
            $input = $request->all();
            if ($request->hasFile('images')) {
                $finalImages = [];
                foreach ($request->file('images') as $image) {
                    $name = time() . rand(1, 99) . $image->getClientOriginalName();
                    $path = 'public/gallery';
                    $image->storeAs($path, $name);
                    $data = $name;
                    array_push($finalImages, $data);
                }
            }
            $findTitle = Gallery::where('image_title', $input['image_title'])->first();

            /*$a = json_decode($findTitle->images);
            $b = array_merge($a, $finalImages);
            dd($b, $finalImages);*/

            if ($findTitle) {
                $oldImage = json_decode($findTitle->images);
                $newImages = array_merge($oldImage, $finalImages);
                $finalData = json_encode($newImages);
                $findTitle->images = $finalData;
                $findTitle->save();
            } else {
                $input['images'] = json_encode($finalImages);
                Gallery::create($input);
            }
            DB::commit();
            return redirect()->route("image.index")->with('success', 'Image Added Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('image.index')->with('failed', 'Image Cannot be added');
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
        $images = Gallery::find($id);
        return view('admin.image.editGallery', compact('images'));
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
        $findImage = Gallery::find($id);
        try {
            DB::beginTransaction();
            $this->validate($request, [
                'image_title' => 'required'
            ]);
            $input = $request->all();
            $findImage->update($input);
            DB::commit();
            return redirect()->route('image.index')->with('success', 'Image updated Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('image.edit', ['image' => $id])->with('failed', 'Image Cannot be Updated');
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
            $images = Gallery::find($id);
            $galleryImages = json_decode($images->images);
            $images->delete();
            foreach ($galleryImages as $galleryImage) {
                Storage::delete('public/gallery/' . $galleryImage);
            }
            DB::commit();
            return redirect()->route('image.index')->with('success', 'Image deleted Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('image.index')->with('failed', 'Image Cannot Be deleted');
        }
    }
}
