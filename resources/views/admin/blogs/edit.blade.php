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
                                <h3 class="card-title">Edit Blogs</h3>
                                <a href="{{ route('admin.blogs.index') }}" class='btn btn-danger float-right text-white'><i
                                        class="fas fa-arrow-left text-white"></i> Back</a>
                            </div>

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.blogs.update',$blog->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="name" @error('title') is-invalid
                                               @enderror name="title" placeholder="Enter Title" value="{{ $blog->title }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea name="content" class="my-editor form-control" id="desc" cols="30" rows="10">{{ $blog->content }}</textarea>
                                        </div>
                                    <div class="form-group">
                                        <label for="author">Author</label>
                                        <input type="text" class="form-control" id="author" name="author"
                                               @error('author') is-invalid @enderror placeholder="Enter Author" value="{{ $blog->author }}">
                                    </div>
                                    <div class="form_group {{ $errors->has('cover_image') ? 'has-error' : '' }}">
                                        <label for="photo">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo" name="photo" @error('photo') is-invalid @enderror value="{{old('cover_image', $blog->photo)}}">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            @if($errors->has('cover_image'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('cover_image') }}
                                                </em>
                                            @endif
                                            <div class="col-md-12 mx-2 my-3">
                                                <img id="preview-image" id ="cover_image" src="{{$blog->photo ? asset('storage/blog_image/'.$blog->photo) : asset('/images/no_image/no_image_available2.jpg')}}"
                                                     alt="preview image" style="max-height: 250px;">
                                            </div>
                                        </div>

                                    </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="title">Meta Title</label>
                                                <input type="text" class="form-control" id="seo_title" @error('seo_title') is-invalid
                                                       @enderror name="seo_title" placeholder="Enter SEO Title" value="{{ $blog->meta_title }}">
                                                @error('seo_title')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="title">Meta Keywords</label>
                                                <input type="text" class="form-control" id="seo_keywords" @error('seo_keywords') is-invalid
                                                       @enderror name="seo_keywords" placeholder="Enter SEO keywords" value="{{ $blog->meta_keywords }}">
                                                @error('seo_keywords')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="title">Meta Description</label>
                                                <input type="text" class="form-control" id="seo_description" @error('seo_description') is-invalid
                                                       @enderror name="seo_description" placeholder="Enter SEO Description" value="{{ $blog->meta_description }}">
                                                @error('seo_description')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    <div class="form-group">
                                        <label for="">Status: </label>
                                        <div class="form-check">
                                            <input type="checkbox" name="status" value="1" class="form-check-input"
                                            {{ $blog->status ? 'checked':'' }}
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
