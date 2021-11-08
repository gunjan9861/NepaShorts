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
                                <h3 class="card-title">Add Service</h3>
                                <a href="{{ route('admin.services.index') }}"
                                   class='btn btn-danger float-right text-white'><i
                                        class="fas fa-arrow-left text-white"></i> Back</a>
                            </div>

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.services.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="name" @error('title') is-invalid
                                               @enderror name="title" placeholder="Enter Title">
                                        @error('title')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Short Description</label>
                                        <input type="text" class="form-control" id="name" @error('short_description') is-invalid
                                               @enderror name="short_description" placeholder="Enter Short Description">
                                        @error('title')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Icon</label>
                                        <input type="text" class="form-control" id="name" @error('icon') is-invalid
                                               @enderror name="icon" placeholder="Enter Icon">
                                        @error('icon')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Long Description</label>
                                        <textarea name="long_description" rows="30" class="form-control my-editor" placeholder="Enter  Description for service page"></textarea>
                                    </div>
                                    <div>
                                        @error('long_description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo" name="photo"
                                                       @error('photo') is-invalid @enderror>
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @if($errors->has('image'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('image') }}
                                            </em>
                                        @endif
                                        <div class="col-md-12 mx-2 my-3">
                                            <img id="preview-image" id="cover_image"
                                                 src="{{asset('/images/no_image/no_image_available2.jpg')}}"
                                                 alt="preview image" style="max-height: 250px;">
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Status: </label>
                                            <div class="form-check">
                                                <input type="checkbox" name="status" value="1" class="form-check-input"
                                                       id="exampleCheck1">
                                                <label for="exampleCheck1">Active</label>
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
@push('scripts')
    <script src="https://cdn.tiny.cloud/1/556smo9zd2rd00ck8rox6u59kqtlp2ususnvma5bcqtj9k6m/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: 'textarea.my-editor',
            relative_urls: false,
            branding: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            toolbar2: " fontselect fontsizeselect formatselect | forecolor backcolor permanentpen formatpainter removeformat | print preview print code  | outdent indent",
            file_picker_callback : function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endpush
