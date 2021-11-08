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
                                <h3 class="card-title">View About Detail</h3>
                                <a href="{{ route('admin.about.index') }}" class='btn btn-danger float-right text-white'><i
                                        class="fas fa-arrow-left text-white"></i> Back</a>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label>id</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $about->id }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Title</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $about->title }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Short Description</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $about->short_description }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Short Description</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ Str::limit($about->short_description,100) }}</p>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-12">
                                        <p><span class="badge badge-pill mx-2 {{$about->status==1 ? 'badge-success':($about->status==0 ?'badge-danger':'') }}">
                                            {{ $about->status==1 ? 'Active':($about->status==0 ? 'Inactive': '') }}</p>
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
