<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Project;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recentProjects = Project::paginate(5);
        return view('admin.projects.index', compact('recentProjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
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
            $imageName = strtolower('project_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('photo')->storeAs('project_image', $imageName, 'public');

        }
        try{
            Project::create(
                [
                    'name' => $request['title'],
                    'company_name' => $request['company_name'],
                    'short_description' => $request['short_description'],
                    'long_description' => $request['long_description'],
                    'url' => $request['url'],
                    'image' => $imageName,
                    'status' => $request['status']? 1 : 0
                ]);
            Toastr::success('Project Created Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.projects.index');
        } catch (\Throwable $exception) {
            Toastr::error('Project Cannot Be Created, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([

        ]);

        if ($request->file('photo')) {
            $imagePath = $request->file('photo');
            $imageName = strtolower('project_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('photo')->storeAs('project_image', $imageName, 'public');

        }else{
            $imageName= $project->image;
        }
        try{
            $project->update(
                [
                    'name' => $request['title'],
                    'company_name' => $request['company_name'],
                    'short_description' => $request['short_description'],
                    'long_description' => $request['long_description'],
                    'image' => $imageName,
                    'url' => $request['url'],
                    'status' => $request['status']? 1 : 0
                ]);
            Toastr::success('Projects Edited Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.projects.index');
        } catch (\Throwable $exception) {
            Toastr::error('Project Cannot Be Edited, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        try {
            $project->delete();
            Toastr::success('Project Deleted Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.projects.index');
        } catch (\Throwable $exception) {
            Toastr::error('Project Cannot Be Deleted, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }

    }
}
