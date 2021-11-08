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
                                <h3 class="card-title">Slider</h3>
                                <a href="{{ route('admin.sliders.create') }}" class='btn btn-success float-right text-white'><i
                                        class="fas fa-plus-circle text-white"></i> Add Slider</a>
                            </div>

                            <!-- /.card-header -->

                                <div class="card-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Button 1 Text</th>
                                            <th>Button 2 Text</th>
                                            <th>Order</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td class="align-middle">{{ $sliders->firstItem() + $loop->index }}</td>
                                                <td  class="align-middle"><img src="{{asset('storage/slider_image/'.$slider->photo)}}"  style="height: 100px; width: 150px;" alt="{{ $slider->caption_title }}"></td>
                                                <td  class="align-middle">{{ $slider->caption_title }}</td>
                                                <td  class="align-middle">{{ $slider->caption_sub_title }}</td>
                                                <td  class="align-middle">{{ $slider->button_text_1 }}</td>
                                                <td  class="align-middle">{{ $slider->button_text_2 }}</td>
                                                <td  class="align-middle"> {{ $slider->order }} </td>
                                                <td  class="align-middle">
                                                    <form action="{{ route('admin.sliders.destroy',$slider->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.sliders.show',$slider->id) }}" ><button type="button" class="btn btn-primary mt-1"><i class="fa fa-eye text-white"></i></button></a>
                                                    <a href="{{ route('admin.sliders.edit',$slider->id) }}" ><button type="button" class="btn btn-success mt-1"><i class="fa fa-pen text-white"></i></button></a>
                                                    <button type="submit"   onclick="return confirm('Are you sure?')" class="btn btn-danger mt-1"><i class="fa fa-trash text-white"></i></button>

                                                </td>
                                                </form>
                                                </td>
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

