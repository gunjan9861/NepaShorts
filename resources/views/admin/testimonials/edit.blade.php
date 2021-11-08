@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Testimonials</h3>
                                <a href="{{ route('admin.testimonials.index') }}"
                                   class='btn btn-danger float-right text-white'><i
                                        class="fas fa-arrow-left text-white"></i> Back</a>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="shortCaption">Name</label>
                                        <input type="text" class="form-control" id="name" @error('name') is-invalid
                                               @enderror name="name" placeholder="Enter Name"
                                               value="{{ $testimonial->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Profession</label>
                                        <input type="text" class="form-control" id="profession" name="profession"
                                               @error('profession') is-invalid @enderror placeholder="Enter Profession"
                                               value="{{ $testimonial->profession }}">
                                    </div>
                                    <div class="form_group {{ $errors->has('cover_image') ? 'has-error' : '' }}">
                                        <label for="image">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo" name="image"
                                                       @error('image') is-invalid
                                                       @enderror value="{{old('cover_image', $testimonial->image)}}">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            @if($errors->has('cover_image'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('cover_image') }}
                                                </em>
                                            @endif
                                            <div class="col-md-12 mx-2 my-3">
                                                <img id="preview-image" id="cover_image"
                                                     src="{{$testimonial->image ? asset('storage/testimonial_image/'.$testimonial->image) : asset('/images/no_image/no_image_available2.jpg')}}"
                                                     alt="preview image" style="max-height: 250px;">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="description">Message</label>
                                        <textarea class="form-control" name="message" id="exampleFormControlTextarea4"
                                                  rows="3" @error('message') is-invalid
                                                  @enderror placeholder="Enter Message">{{ $testimonial->message }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status: </label>
                                        <div class="form-check">
                                            <input type="checkbox" name="status" value="1" class="form-check-input"
                                                {{ $testimonial->status ? 'checked':'' }}>
                                            <label for="exampleCheck1">Active</label>
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
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#photo').change(function () {

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
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#photo').change(function () {

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
