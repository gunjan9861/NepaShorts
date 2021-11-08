@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">View Blog Detail</h3>
                                <a href="{{ route('admin.blogs.index') }}" class='btn btn-danger float-right text-white'><i
                                        class="fas fa-arrow-left text-white"></i> Back</a>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label>id</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $blog->id }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Title</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $blog->title }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Content</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $blog->content }}</p>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <label>Author</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $blog->author }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label>Message</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="col-12">
                                            <p><img src="{{asset('storage/blog_image/'.$blog->photo)}}"  style="height: 100px; width: 150px;" alt="{{ $blog->title }}"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-12">
                                        <p><span class="badge badge-pill mx-2 {{$blog->status==1 ? 'badge-success':($blog->status==0 ?'badge-danger':'') }}">
                                            {{ $blog->status==1 ? 'Active':($blog->status==0 ? 'Inactive': '') }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
