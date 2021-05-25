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
                        <li class="breadcrumb-item active">Customers</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <!-- <div class="col-sm-6"><h3 class="card-title">Customers Data</h3></div> -->
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="card-title pTop10">Customers Data</h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{ route('addcustomer') }}"><button type="button"
                                                class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add
                                                Customer</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="thead-purple">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Vendor code</th>
                                        <th>GST No</th>
                                        <th>Short Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($customersData as $customers)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$customers->name}}</td>
                                        <td>{{$customers->address}}</td>
                                        <td>{{$customers->phone}}</td>
                                        <td>{{$customers->email}}</td>
                                        <td>{{$customers->customerCode}}</td>
                                        <td>{{$customers->cstNo}}</td>
                                        <td>{{$customers->shortName}}</td>
                                        <td><a href="{{ route('editcustomer',[$customers->customerId]) }}"
                                                class="actionbutwrapper"><i
                                                    class="fas fa-edit actionbuttonsize"></i></a><a
                                                    href="{{ route('deletecustomer',[$customers->customerId]) }}"
                                                class="actionbutwrapper "  id="{{$customers->customerId}}" onclick="return confirm('Are you sure you want to delete this Customer?');"><i
                                                    class="fas fa-trash-alt actionbuttonsize"></i></a></td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                    <!-- {{ route('deletecustomer',[$customers->id]) }} -->
                                </tbody>
                                <tfoot class="thead-purple">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Vendor code</th>
                                        <th>GST No</th>
                                        <th>Short Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="modal fade" id="modal-danger">
                            <div class="modal-dialog">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Customer</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you want delete  this customer?&hellip;</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light"
                                            data-dismiss="modal">No</button>
                                        <a href="" id="delteTrue"><button type="button" class="btn btn-outline-light">Yes</button></a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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