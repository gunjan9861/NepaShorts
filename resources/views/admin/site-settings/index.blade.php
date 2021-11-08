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
                                <h3 class="card-title">Site Settings</h3>
                                <a href="{{ route('admin.site-settings.create') }}" class='btn btn-success float-right text-white'><i
                                        class="fas fa-plus-circle text-white"></i> Add Site Setting</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Title</th>
                                        <th>Email</th>
                                        <th>Tel_No</th>
                                        <th>Mobile_No</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($siteSettings as $siteSetting)
                                        <tr>
                                            <td class="align-middle"> {{ $siteSettings->firstItem() + $loop->index }}</td>
                                            <td class="align-middle">{{ $siteSetting->title }}</td>
                                            <td class="align-middle">{{ $siteSetting->email }}</td>
                                            <td class="align-middle">{{ $siteSetting->tel_no }}</td>
                                            <td class="align-middle">{{ $siteSetting->mobile_no }}</td>
                                            <td class="align-middle">{{ $siteSetting->address }}</td>
                                            </td>
                                            <form action="{{ route('admin.site-settings.destroy',$siteSetting->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td class="align-middle"><a href="{{ route('admin.site-settings.show',$siteSetting->id) }}" ><button type="button" class="btn btn-primary mt-1"><i class="fa fa-eye text-white"></i></button></a>
                                                    <a href="{{ route('admin.site-settings.edit',$siteSetting->id) }}" ><button type="button" class="btn btn-success mt-1"><i class="fa fa-pen text-white"></i></button></a>
                                                    <button type="submit"   onclick="return confirm('Are you sure?')" class="btn btn-danger mt-1"><i class="fa fa-trash text-white"></i></button>

                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                                {!! $siteSettings->links() !!}
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
