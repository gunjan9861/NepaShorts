<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
//        return view('backend.slider.index', compact('sliders'));
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $button_1 = explode('":"', $request['button_text_1']);
        $button_link_1 = str_replace(array('{', '}', '"'), '', $button_1[0]);
        $button_text_1 = str_replace(array('{', '}', '"'), '', $button_1[1]);

        $button_2 = explode('":"', $request['button_text_2']);
        $button_link_2 = str_replace(array('{', '}', '"'), '', $button_2[0]);
        $button_text_2 = str_replace(array('{', '}', '"'), '', $button_2[1]);

        $request->validate([
            'name' => 'required',
            'photo' => 'required',
            'caption_title' => 'required',
            'caption_sub_title' => 'required',
            'button_text_1' => 'required',
            'button_text_2' => 'required',
        ]);


        if ($request->file('photo')) {
            $imagePath = $request->file('photo');
            $imageName = strtolower('slider_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('photo')->storeAs('slider_image', $imageName, 'public');
        }
        try {
            Slider::create(
                [

                    'name' => $request['name'],
                    'photo' => $imageName,
                    'caption_title' => $request['caption_title'],
                    'caption_sub_title' => $request['caption_sub_title'],
                    'button_text_1' => $button_text_1,
                    'button_link_1' => $button_link_1,
                    'button_text_2' => $button_text_2,
                    'button_link_2' => $button_link_2,
                    'order' => $request['order'],
                ]);

            Toastr::success('Slider created Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.sliders.index');
        } catch (\Throwable $exception) {
            Toastr::error('Slider cannot be created, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
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
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)

    {
        $button_1 = explode('":"', $request['button_text_1']);
        $button_link_1 = str_replace(array('{', '}', '"'), '', $button_1[0]);
        $button_text_1 = str_replace(array('{', '}', '"'), '', $button_1[1]);

        $button_2 = explode('":"', $request['button_text_2']);
        $button_link_2 = str_replace(array('{', '}', '"'), '', $button_2[0]);
        $button_text_2 = str_replace(array('{', '}', '"'), '', $button_2[1]);


        $request->validate([
            'name' => 'required',
            'caption_title' => 'required',
            'caption_sub_title' => 'required',
            'button_text_1' => 'required',
            'button_text_2' => 'required',
        ]);

        if ($request->file('photo')) {
            $imagePath = $request->file('photo');
            $imageName = strtolower('slider_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('photo')->storeAs('slider_image', $imageName, 'public');

        } else {
            $imageName = $slider->photo;
        }
        try {
            $slider->update(
                [
                    'name' => $request['name'],
                    'photo' => $imageName,
                    'caption_title' => $request['caption_title'],
                    'caption_sub_title' => $request['caption_sub_title'],
                    'button_text_1' => $button_text_1,
                    'button_link_1' => $button_link_1,
                    'button_text_2' => $button_text_2,
                    'button_link_2' => $button_link_2,
                    'order' => $request['order'],
                ]);

            Toastr::success('Slider edited Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.sliders.index');
        } catch (\Throwable $exception) {
            Toastr::error('Slider cannot be edited, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {

            $slider->delete();

        try {
            Toastr::success('Slider deleted Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('sliders.index');
        } catch (\Throwable $exception) {
            Toastr::error('Slider cannot be deleted, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }
}
