<?php

namespace App\Http\Controllers;

use App\Models\AboutType;
use App\Models\AboutUs;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus = AboutUs::paginate(5);
        return view('admin.about.index', compact('aboutus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abouttype = AboutType::where('status',1)->get();
        return view('admin.about.create', compact('abouttype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',

        ]);
        $imageName = null;
        if ($request->file('photo')) {
            $imagePath = $request->file('photo');
            $imageName = strtolower('about_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('photo')->storeAs('about_image', $imageName, 'public');

        }
        try{
            AboutUs::create(
                [
                    'title' => $request['title'],
                    'short_description' => $request['short_description'],
                    'long_description' => $request['long_description'],
                    'about_type_id' => $request['type_id'],
                    'image' => $imageName,
                    'status' => $request['status']? 1 : 0
                ]);
            Toastr::success('About Created Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.about.index');
        } catch (\Throwable $exception) {
            Toastr::error('About Cannot Be Created, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $about)
    {
        return view('admin.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $about)
    {
        $aboutType = AboutType::where('status',1)->get();
        return view('admin.about.edit', compact('about', 'aboutType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $about)
    {
        $request->validate([

        ]);

        if ($request->file('photo')) {
            $imagePath = $request->file('photo');
            $imageName = strtolower('about_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('photo')->storeAs('about_image', $imageName, 'public');

        }else{
            $imageName= $about->image;
        }
        try{
            $about->update(
                [
                    'title' => $request['title'],
                    'short_description' => $request['short_description'],
                    'long_description' => $request['long_description'],
                    'image' => $imageName,
                    'about_type_id' => $request['type_id'],
                    'status' => $request['status']? 1 : 0
                ]);
            Toastr::success('About Edited Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.about.index');
        } catch (\Throwable $exception) {
            Toastr::error('About Cannot Be Edited, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $about)
    {
        $about->delete();
        return redirect()->route('admin.about.index');
    }
}
