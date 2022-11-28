@extends('admin.layouts.admin')


@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create new product</h4>

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

            <div class="row">
                <form action="" method="POST" id="" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                  <label for="" class="form-label">Name</label>
                  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Help text</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="text" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Help text</small>
                  </div>
                 <div class="mb-3">
                   <label for="" class="form-label">Choose file</label>
                   <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId">
                   <div id="fileHelpId" class="form-text">Help text</div>
                 </div>
                 <button type="submit" id="" class="btn btn-primary">Submit</button>
                </form>
            </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
@endsection