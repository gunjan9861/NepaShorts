@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Site Settings</h3>
                                <a href="{{ route('admin.site-settings.index') }}"
                                   class='btn btn-danger float-right text-white'><i
                                        class="fas fa-arrow-left text-white"></i> Back</a>
                            </div>

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.site-settings.update', $siteSetting->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="title">Title</label>
                                            <input type="text" value="{{ $siteSetting->title }}" class="form-control" id="name" @error('title') is-invalid
                                                   @enderror name="title" placeholder="Enter Title">
                                            @error('title')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="title">Slug</label>
                                            <input type="text" class="form-control" value="{{ $siteSetting->slug }}" id="slug" @error('slug') is-invalid
                                                   @enderror name="slug" placeholder="Enter Slug">
                                            @error('slug')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="title">Email</label>
                                            <input type="email" class="form-control" value="{{ $siteSetting->email }}" id="email" @error('email') is-invalid
                                                   @enderror name="email" placeholder="Enter Email">
                                            @error('email')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="title">Email 2</label>
                                            <input type="text" class="form-control" id="email_2" value="{{ $siteSetting->email_2 }}" @error('email_2') is-invalid
                                                   @enderror name="email_2" placeholder="Enter Email 2">
                                            @error('email_2')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="title">Tel No</label>
                                            <input type="phone" class="form-control" value="{{ $siteSetting->tel_no }}" id="tel_no" @error('tel_no') is-invalid
                                                   @enderror name="tel_no" placeholder="Enter Tel No">
                                            @error('tenol_')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="title">Tel No 2</label>
                                            <input type="phone" class="form-control" value="{{ $siteSetting->tel_no_2 }}" id="tel_no_2" @error('tel_no_2') is-invalid
                                                   @enderror name="tel_no_2" placeholder="Enter Tel 2">
                                            @error('tel_no_2')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="title">Mobile No</label>
                                            <input type="phone" class="form-control" value="{{ $siteSetting->mobile_no }}" id="tel_no" @error('mobile_no') is-invalid
                                                   @enderror name="mobile_no" placeholder="Enter Tel No">
                                            @error('mobile_no')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="title">Mobile No 2</label>
                                            <input type="phone" class="form-control" id="mobile_no_2" value="{{ $siteSetting->mobile_no_2 }}" @error('mobile_no_2') is-invalid
                                                   @enderror name="mobile_no_2" placeholder="Enter Tel 2">
                                            @error('mobile_no_2')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="title">Address</label>
                                            <input type="text" class="form-control" value="{{ $siteSetting->address }}" id="address" @error('address') is-invalid
                                                   @enderror name="address" placeholder="Enter Address">
                                            @error('address')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="title">Address 2</label>
                                            <input type="text" class="form-control" value="{{ $siteSetting->address_2 }}" id="address_2" @error('address_2') is-invalid
                                                   @enderror name="address_2" placeholder="Enter Address 2">
                                            @error('address_2')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="title">Fax</label>
                                            <input type="text" class="form-control" id="fax" @error('fax') is-invalid
                                                   @enderror name="fax" placeholder="Enter FAX" value="{{ $siteSetting->fax }}" >
                                            @error('fax')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="title">Facebook</label>
                                            <input type="text" class="form-control" id="facebook"  @error('facebook') is-invalid
                                                   @enderror name="facebook"  placeholder="Enter Facebook" value="{{ $siteSetting->facebook }}">
                                            @error('facebook')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="title">Instagram</label>
                                            <input type="text" class="form-control"  id="instagram" @error('instagram') is-invalid
                                                   @enderror name="instagram" placeholder="Enter Insta" value="{{ $siteSetting->instagram }}" >
                                            @error('instagram')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="title">Twitter</label>
                                            <input type="text" class="form-control"  id="facebook" @error('twitter') is-invalid
                                                   @enderror name="twitter" placeholder="Enter Facebook" value="{{ $siteSetting->twitter }}">
                                            @error('twitter')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="title">Skype</label>
                                            <input type="text" class="form-control" id="skype" @error('skype') is-invalid
                                                   @enderror name="skype" placeholder="Enter Skype" value="{{ $siteSetting->skype }}">
                                            @error('skype')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="title">LinkedIn</label>
                                            <input type="text" class="form-control" id="linkedin" @error('linkedin') is-invalid
                                                   @enderror name="linkedin" placeholder="Enter Facebook" value="{{ $siteSetting->linkedin }}">
                                            @error('linkedin')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="title">Footer Title</label>
                                            <input type="text" class="form-control" id="skype"  value="{{ $siteSetting->footer_title }}" @error('footer_title') is-invalid
                                                   @enderror name="footer_title" placeholder="Enter Footer Title">
                                            @error('footer_title')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="title">Footer Content</label>
                                            <input type="text" class="form-control" id="linkedin" value="{{ $siteSetting->footer_content }}" @error('footer_content') is-invalid
                                                   @enderror name="footer_content" placeholder="Enter Footer Content">
                                            @error('footer_content')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>

                                        <div class="row">
                                            <div class="form_group col-6 {{ $errors->has('flag_cover_image') ? 'has-error' : '' }}">
                                                <strong></strong>
                                                <label for="images">Header Image <span class="text-danger">*</span></label>
                                                <input type="file" name="header_image" id="header_image" value="{{old('cover_image',$siteSetting->header_image)}}">
                                                @if($errors->has('cover_image'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('cover_image') }}
                                                    </em>
                                                @endif
                                                <div class="col-md-12 mx-2 my-3">
                                                    <img id="preview-image" id ="cover_image" src="{{$siteSetting->header_image ? asset('storage/header_image/'.$siteSetting->header_image) : asset('/images/no_image/no_image_available2.jpg')}}"
                                                         alt="preview image" style="max-height: 250px;">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form_group col-6 {{ $errors->has('footer_cover_image') ? 'has-error' : '' }}">
                                                <strong></strong>
                                                <label for="images">Footer Image <span class="text-danger">*</span></label>
                                                <input type="file" name="footer_image" id="footer_image" value="{{old('footer_cover_image',$siteSetting->footer_image)}}">
                                                @if($errors->has('footer_cover_image'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('footer_cover_image') }}
                                                    </em>
                                                @endif
                                                <div class="col-md-12 mx-2 my-3">
                                                    <img id="footer-preview-image" id ="cover_image" src="{{$siteSetting->footer_image ? asset('storage/footer_image/'.$siteSetting->footer_image) : asset('/images/no_image/no_image_available2.jpg')}}"
                                                         alt="preview image" style="max-height: 250px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="title">Seo Title</label>
                                                <input type="text" class="form-control" value="{{ $siteSetting->seo_title }}" id="seo_title" @error('seo_title') is-invalid
                                                       @enderror name="seo_title" placeholder="Enter SEO Title">
                                                @error('seo_title')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="title">Seo Keywords</label>
                                                <input type="text" class="form-control" id="seo_keywords" @error('seo_keywords') is-invalid
                                                       @enderror name="seo_keywords" placeholder="Enter SEO keywords"  value="{{ $siteSetting->seo_keywords }}" >
                                                @error('seo_keywords')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="title">Seo Description</label>
                                                <input type="text" class="form-control" value="{{ $siteSetting->seo_description }}" id="seo_description" @error('seo_description') is-invalid
                                                       @enderror name="seo_description" placeholder="Enter SEO Description">
                                                @error('seo_description')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#header_image').change(function () {

                let reader = new FileReader();
                reader.onload = (e) => {

                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });
            $(".imgAdd").click(function () {
                $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
            });
            $(document).on("click", "i.del", function () {
                $(this).parent().remove();

            });

            $('#flag_image').change(function () {

                let reader = new FileReader();
                reader.onload = (e) => {

                    $('#flag_preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });
            $(".imgAdd").click(function () {
                $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
            });
            $(document).on("click", "i.del", function () {
                $(this).parent().remove();

            });

            $('#footer_image').change(function () {

                let reader = new FileReader();
                reader.onload = (e) => {

                    $('#footer-preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });
            $(".imgAdd").click(function () {
                $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
            });
            $(document).on("click", "i.del", function () {
                $(this).parent().remove();

            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#cover_photo').change(function () {

                let reader = new FileReader();
                reader.onload = (e) => {

                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });
            $(".imgAdd").click(function () {
                $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
            });
            $(document).on("click", "i.del", function () {
                $(this).parent().remove();

            });

        });
    </script>
@endpush
