<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(5);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
            $imageName = strtolower('service_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('photo')->storeAs('service_image', $imageName, 'public');

        }
        try{
            Service::create(
                [
                    'name' => $request['title'],
                    'short_description' => $request['short_description'],
                    'long_description' => $request['long_description'],
                    'icon' => $request['icon'],
                    'image' => $imageName,
                    'status' => $request['status']? 1 : 0
                ]);
            Toastr::success('About Created Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.services.index');
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
    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([

        ]);

        if ($request->file('photo')) {
            $imagePath = $request->file('photo');
            $imageName = strtolower('service_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('photo')->storeAs('service_image', $imageName, 'public');

        }else{
            $imageName= $service->image;
        }
        try{
            $service->update(
                [
                    'name' => $request['title'],
                    'short_description' => $request['short_description'],
                    'long_description' => $request['long_description'],
                    'icon' => $request['icon'],
                    'image' => $imageName,
                    'status' => $request['status']? 1 : 0
                ]);
            Toastr::success('Service Edited Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.services.index');
        } catch (\Throwable $exception) {
            Toastr::error('Service Cannot Be Edited, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back();
    }
}
