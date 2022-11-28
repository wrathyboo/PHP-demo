@extends('admin.layouts.admin')


@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Product List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr class="">
                            <td scope="row">{{$rank++}}</td>
                            <td><img src="{{url('images/products') . '/' . $item['image']}}" width="90px" alt=""></td>
                            <td>{{$item['name']}}</td>
                            <td>{{$item['price']}}</td>
                            <td>
                                <td>
                                    <div class="d-flex justify-content-middle">
                                        <button class="btn btn-primary"><a class="text-light" href="{{route('product.update',$item['id'])}}">Edit</a></button>
                                    <form action="{{route('product.destroy',$item['id'])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    <button class="btn btn-danger">Del</button>
                                    </form>
                                    </div>
                                </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination pagination-rounded d-flex justify-content-center">{{ $products->links('pagination::bootstrap-4') }}</div>
                </div>
            </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
@endsection