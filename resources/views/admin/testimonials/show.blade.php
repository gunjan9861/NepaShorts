@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">View Slider Detail</h3>
                                <a href="{{ route('admin.testimonials.index') }}" class='btn btn-danger float-right text-white'><i
                                        class="fas fa-arrow-left text-white"></i> Back</a>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label>id</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $testimonial->id }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $testimonial->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $testimonial->profession }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Photo</label>
                                    </div>
                                    <div class="col-12">
                                        <p><img src="{{asset('storage/testimonial_image/'.$testimonial->image)}}"  style="height: 100px; width: 150px;" alt="{{ $testimonial->name }}"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label>Message</label>
                                    </div>
                                    <div class="col-12">
                                        <p>{{ $testimonial->message }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-12">
                                        <p><span class="badge badge-pill mx-2 {{$testimonial->status==1 ? 'badge-success':($testimonial->status==0 ?'badge-danger':'') }}">
                                            {{ $testimonial->status==1 ? 'Active':($testimonial->status==0 ? 'Inactive': '') }}</p>
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
