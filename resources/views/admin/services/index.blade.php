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
                                <h3 class="card-title">Services</h3>
                                <a href="{{ route('admin.services.create') }}" class='btn btn-success float-right text-white'><i
                                        class="fas fa-plus-circle text-white"></i> Add Service</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Long Description</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td> {{ $services->firstItem() + $loop->index }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ Str::limit($service->short_description,100) }}</td>
                                            <td>{{ strip_tags(Str::limit($service->long_description,100)) }}</td>
                                            <td><img src="{{asset('storage/service_image/'.$service->image)}}"  style="height: 100px; width: 150px;" alt="{{ $service->name }}"></td>
                                            <td><span class="badge badge-pill mx-2 {{$service->status==1 ? 'badge-success':($service->status==0 ?'badge-danger':'') }}">
                                {{ $service->status==1 ? 'Active':($service->status==0 ? 'Inactive': '') }}
                                </span>
                                            </td>
                                            <form action="{{ route('admin.services.destroy',$service->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td><a href="{{ route('admin.services.show',$service->id) }}" ><button type="button" class="btn btn-primary mt-1"><i class="fa fa-eye text-white"></i></button></a>
                                                    <a href="{{ route('admin.services.edit',$service->id) }}" ><button type="button" class="btn btn-success mt-1"><i class="fa fa-pen text-white"></i></button></a>
                                                    <button type="submit"   onclick="return confirm('Are you sure?')" class="btn btn-danger mt-1"><i class="fa fa-trash text-white"></i></button>

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
@endsection
