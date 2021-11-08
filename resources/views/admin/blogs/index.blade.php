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
                                <h3 class="card-title">Blogs</h3>
                                <a href="{{ route('admin.blogs.create') }}" class='btn btn-success float-right text-white'><i
                                        class="fas fa-plus-circle text-white"></i> Add Blogs</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Author</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td> {{ $blogs->firstItem() + $loop->index }}</td>
                                            <td>{{ Str::limit($blog->title,50) }}</td>
                                            <td>{{ Str::limit($blog->content,100) }}</td>
                                            <td>{{ $blog->author }}</td>
                                            <td><img src="{{asset('storage/blog_image/'.$blog->photo)}}"  style="height: 100px; width: 150px;" alt="{{ $blog->title }}"></td>
                                            <td><span class="badge badge-pill mx-2 {{$blog->status==1 ? 'badge-success':($blog->status==0 ?'badge-danger':'') }}">
                                {{ $blog->status==1 ? 'Active':($blog->status==0 ? 'Inactive': '') }}
                                </span>
                                            </td>
                                            <form action="{{ route('admin.blogs.destroy',$blog->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td><a href="{{ route('admin.blogs.show',$blog->id) }}" ><button type="button" class="btn btn-primary mt-1"><i class="fa fa-eye text-white"></i></button></a>
                                                    <a href="{{ route('admin.blogs.edit',$blog->id) }}" ><button type="button" class="btn btn-success mt-1"><i class="fa fa-pen text-white"></i></button></a>
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
