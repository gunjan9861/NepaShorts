<?php

namespace App\Http\Controllers;

use App\Models\AboutType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AboutTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutTypes = AboutType::paginate();
        return view('admin.about-type.index', compact('aboutTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about-type.create');
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
            'name' => 'required',
        ]);
        try {
            AboutType::create(
                [
                    'name' => $request['name'],
                    'status' => $request['status'] ? 1 : 0
                ]);
            Toastr::success('AboutType Created Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.about-type.index');
        } catch (\Throwable $exception) {
            Toastr::error('AboutType Cannot Be Created, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutType $aboutType)
    {
        return view('admin.about-type.edit', compact('aboutType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutType $aboutType)
    {
        $request->validate([
            'name' => 'required',
        ]);
        try {
            $aboutType->update(
                [
                    'name' => $request['name'],
                    'status' => $request['status'] ? 1 : 0
                ]);
            Toastr::success('AboutType Edited Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.about-type.index');
        } catch (\Throwable $exception) {
            Toastr::error('AboutType Cannot Be Edited, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutType $aboutType)
    {
        try {
            $aboutType->delete();
            Toastr::success('AboutType Deleted Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.about-type.index');
        } catch (\Throwable $exception) {
            Toastr::error('AboutType Cannot Be Deleted, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

}
