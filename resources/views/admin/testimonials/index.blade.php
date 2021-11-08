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
                            <div class="card-header">
                                <h3 class="card-title"> Customer Testimonial</h3>
                                <a href="{{ route('admin.testimonials.create') }}" class='btn btn-success float-right text-white'><i
                                        class="fas fa-plus-circle text-white"></i> Add Testimonials</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Profession</th>
                                        <th>Image</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($testimonials as $testimonial)
                                        <tr>
                                            <td> {{ $testimonials->firstItem() + $loop->index }}</td>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->profession }}</td>
                                            <td><img src="{{asset('storage/testimonial_image/'.$testimonial->image)}}"  style="height: 100px; width: 150px;" alt="{{ $testimonial->name }}"></td>
                                            <td>{{ Str::limit($testimonial->message,100) }}</td>
                                            <td><span class="badge badge-pill mx-2 {{$testimonial->status==1 ? 'badge-success':($testimonial->status==0 ?'badge-danger':'') }}">
                                {{ $testimonial->status==1 ? 'Active':($testimonial->status==0 ? 'Inactive': '') }}
                                </span>
                                            </td>
                                            <form action="{{ route('admin.testimonials.destroy',$testimonial->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td><a href="{{ route('admin.testimonials.show',$testimonial->id) }}" ><button type="button" class="btn btn-primary mt-1"><i class="fa fa-eye text-white"></i></button></a>
                                                    <a href="{{ route('admin.testimonials.edit',$testimonial->id) }}" ><button type="button" class="btn btn-success mt-1"><i class="fa fa-pen text-white"></i></button></a>
                                                    <button type="submit" class="btn btn-danger mt-1"><i class="fa fa-trash text-white"></i></button>

                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
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


    <!-- Control Sidebar -->
@endsection
