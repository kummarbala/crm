@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-address-card"></i>&nbsp; Customers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customers') }}">Customers</a></li>
                        <li class="breadcrumb-item active">Add Customer</li>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <h3 class="card-title pTop10">Add Customer</h3>
                                </div>
                                <div class="col-sm-6 float-right"> <a href="{{ route('customers') }}"><button
                                            type="button" class="btn btn-warning float-right"><i
                                                class="fas fa-hand-point-left"></i> Back to
                                            Customers</button></a></div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id="addcustomer" method="POST" action="{{ route('addcustomersubmit') }}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="Name" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="Address" class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" rows="3"
                                                            placeholder="Address ..." name="address"
                                                            id="address"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="phoneno" class="col-sm-2 col-form-label">Phone
                                                        No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="phone" name="phone"
                                                            placeholder="Phone No" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="email" name="email"
                                                            placeholder="Email Address" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="vendorcode" class="col-sm-2 col-form-label">Vendor
                                                        Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="customerCode"
                                                            name="customerCode" placeholder="Vendor Code" >
                                                    </div>
                                                </div>`
                                                <div class="form-group row">
                                                    <label for="tinno" class="col-sm-2 col-form-label">Tin No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="tinNo"
                                                            name="tinNo" placeholder="TIN No" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="GSTno" class="col-sm-2 col-form-label">GST No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="cstNo"
                                                            name="cstNo" placeholder="GST No" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="shortname" class="col-sm-2 col-form-label">Short
                                                        Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="shortName"
                                                            name="shortName" placeholder="Short Name" >
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.row -->
</div>

<!-- /.content-wrapper -->
@endsection