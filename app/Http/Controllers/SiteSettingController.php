<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteSettings = SiteSetting::paginate(5);
        return view('admin.site-settings.index', compact('siteSettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.site-settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \request()->validate([
            'title' => 'required'
        ]);
        $logoImage = null;
        $flagImage = null;
        $footerImage = null;
        if (\request()->hasFile('header_image')) {

            $logoImage = Str::slug(\Ramsey\Uuid\Uuid::uuid4()->toString(), '-') . '_header_image' . '_' . Uuid::fromDateTime(now()) . '.' . request()
                    ->file('header_image')->getClientOriginalExtension();
            request()->file('header_image')->storeAs('header_image/', $logoImage, 'public');
        }
        if (\request()->hasFile('flag_image')) {
            $flagImage = Str::slug(\Ramsey\Uuid\Uuid::uuid4()->toString(), '-') . '_flag_image' . '_' . Uuid::fromDateTime(now()) . '.' . request()
                    ->file('flag_image')->getClientOriginalExtension();
            request()->file('flag_image')->storeAs('flag_image/', $flagImage, 'public');
        }
        if (\request()->hasFile('footer_image')) {
            $footerImage = Str::slug(\Ramsey\Uuid\Uuid::uuid4()->toString(), '-') . '_footer_image' . '_' . Uuid::fromDateTime(now()) . '.' . request()
                    ->file('footer_image')->getClientOriginalExtension();
            request()->file('footer_image')->storeAs('footer_image/', $footerImage, 'public');
        }
        try {
            SiteSetting::create(
                [
                    'title' => \request('title'),
                    'slug' => Str::slug(\request('title'), '-'),
                    'email' => \request('email'),
                    'email_2' => \request('email_2'),
                    'tel_no' => \request('tel_no'),
                    'tel_no_2' => \request('tel_no_2'),
                    'mobile_no' => \request('mobile_no'),
                    'mobile_no_2' => \request('mobile_no_2'),
                    'address' => \request('address'),
                    'address_2' => \request('address_2'),
                    'facebook' => \request('facebook'),
                    'instagram' => \request('instagram'),
                    'twitter' => \request('twitter'),
                    'skype' => \request('skype'),
                    'linkedin' => \request('linkedin'),
                    'youtube' => \request('youtube'),
                    'footer_title' => \request('footer_title'),
                    'footer_content' => \request('footer_content'),
                    'seo_title' => \request('seo_title'),
                    'seo_keywords' => \request('seo_keywords'),
                    'seo_description' => \request('seo_description'),
                    'header_image' => $logoImage,
                    'footer_image' => $footerImage,
                ]);
            Toastr::success('Site Settings updated Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.site-settings.index');
        } catch (\Throwable $exception) {
            Toastr::error('Site Settings cannot be updated, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
        return redirect()->route('admin.site-settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SiteSetting $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SiteSetting $siteSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SiteSetting $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteSetting $siteSetting)
    {
        return view('admin.site-settings.edit', compact('siteSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SiteSetting $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteSetting $siteSetting)
    {
        \request()->validate([
            'title' => 'required'
        ]);
        $logoImage = null;
        $flagImage = null;
        $footerImage = null;
        if (\request()->hasFile('header_image')) {
            Storage::disk('public')->delete('header_image/' . $siteSetting->header_image);
            $logoImage = Str::slug(\Ramsey\Uuid\Uuid::uuid4()->toString(), '-') . '_header_image' . '_' . Uuid::fromDateTime(now()) . '.' . request()
                    ->file('header_image')->getClientOriginalExtension();
            request()->file('header_image')->storeAs('header_image/', $logoImage, 'public');
        }
        if (\request()->hasFile('flag_image')) {
            Storage::disk('public')->delete('flag_image/' . $siteSetting->flag_image);
            $flagImage = Str::slug(\Ramsey\Uuid\Uuid::uuid4()->toString(), '-') . '_flag_image' . '_' . Uuid::fromDateTime(now()) . '.' . request()
                    ->file('flag_image')->getClientOriginalExtension();
            request()->file('flag_image')->storeAs('flag_image/', $flagImage, 'public');
        }
        if (\request()->hasFile('footer_image')) {
            Storage::disk('public')->delete('footer_image/' . $siteSetting->footer_image);
            $footerImage = Str::slug(\Ramsey\Uuid\Uuid::uuid4()->toString(), '-') . '_footer_image' . '_' . Uuid::fromDateTime(now()) . '.' . request()
                    ->file('footer_image')->getClientOriginalExtension();
            request()->file('footer_image')->storeAs('footer_image/', $footerImage, 'public');
        }
        try {
            $siteSetting->update([
                'title' => \request('title'),
                'slug' => Str::slug(\request('title'), '-'),
                'email' => \request('email'),
                'email_2' => \request('email_2'),
                'tel_no' => \request('tel_no'),
                'tel_no_2' => \request('tel_no_2'),
                'mobile_no' => \request('mobile_no'),
                'mobile_no_2' => \request('mobile_no_2'),
                'address' => \request('address'),
                'address_2' => \request('address_2'),
                'facebook' => \request('facebook'),
                'instagram' => \request('instagram'),
                'twitter' => \request('twitter'),
                'skype' => \request('skype'),
                'linkedin' => \request('linkedin'),
                'youtube' => \request('youtube'),
                'footer_title' => \request('footer_title'),
                'footer_content' => \request('footer_content'),
                'header_image' => $logoImage ?? $siteSetting->header_image,
                'footer_image' => $footerImage ?? $siteSetting->footer_image,
            ]);
            Toastr::success('Site Settings updated Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.site-settings.index');
        } catch (\Throwable $exception) {
            DB::rollBack();
            Toastr::error('Site Settings cannot be updated, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
        return redirect()->route('admin.site-settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SiteSetting $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteSetting $siteSetting)
    {
        //
    }
}
