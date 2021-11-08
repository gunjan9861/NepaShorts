<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonials::paginate(5);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'profession' => 'required',
            'message' => 'required',
        ]);
        $imageName = null;
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = strtolower('testimonial_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('image')->storeAs('testimonial_image', $imageName, 'public');

        }
        try {
            Testimonials::create(
                [
                    'name' => $request['name'],
                    'image' => $imageName,
                    'profession' => $request['profession'],
                    'message' => $request['message'],
                    'status' => $request['status']? 1 : 0
                ]);
            Toastr::success('Testimonials Created Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.testimonials.index');
        } catch (\Throwable $exception) {
            Toastr::error('Testimonials Cannot Be Created, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonials $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonials $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonials $testimonial)
    {
        $imageName = null;
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = strtolower('testimonial_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('image')->storeAs('testimonial_image', $imageName, 'public');

        } else {
            $imageName = $testimonial->image;
        }
        try {
            $testimonial->update(
                [
                    'name' => $request['name'],
                    'image' => $imageName,
                    'profession' => $request['profession'],
                    'message' => $request['message'],
                    'status' => $request['status'] ? 1 : 0
                ]);
            Toastr::success('Testimonials Edited Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.testimonials.index');
        } catch (\Throwable $exception) {
            Toastr::error('Testimonials Cannot Be Edited, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonials $testimonial)
    {
        $testimonial->delete();
        try {
            Toastr::success('Testimonials Deleted Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.testimonials.index');
        } catch (\Throwable $exception) {
            Toastr::error('Testimonials Cannot Be Deleted, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }
}
