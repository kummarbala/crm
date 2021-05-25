@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-address-card"></i>&nbsp; Order Acknowledgements</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Order Acknowledgements</li>
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
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="card-title pTop10">Order Acknowledgements Data</h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{ route('addorderacknowledgement') }}"><button type="button"
                                                class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add
                                                Order Acknowledgement</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="orderacknowledgementtable" class="table table-bordered table-striped">
                                <thead class="thead-purple">
                                    <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>Ack No</th>
                                        <th>P.O. No</th>
                                        <th>Enq No</th>
                                        <th>Contact Person</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($orderacknowledgementsData as $orderacknowledgements)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$orderacknowledgements->name}}</td>
                                        <td>{{$orderacknowledgements->orderAckNo}}</td>
                                        <td>{{$orderacknowledgements->poNo}}</td>
                                        <td>{{$orderacknowledgements->enquireyNo}}</td>
                                        <td>{{$orderacknowledgements->contactPerson}}</td>
                                        <td><a
                                                href="{{ route('editorderacknowledgement',[$orderacknowledgements->orderAckId]) }}"
                                                class="actionbutwrapper" title="Edit"><i
                                                    class="fas fa-edit actionbuttonsize"></i></a><a
                                                href="{{ route('deletequotation',[$orderacknowledgements->orderAckId]) }}"
                                                class="actionbutwrapper " id="{{$orderacknowledgements->orderAckId}}"
                                                onclick="return confirm('Are you sure you want to delete this Order Acknowledgements?');"
                                                title="Delete"><i
                                                    class="fas fa-trash-alt actionbuttonsize removeIcon"></i></a>
                                            
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach

                                </tbody>
                                <tfoot class="thead-purple">
                                    <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>Ack No</th>
                                        <th>P.O. No</th>
                                        <th>Enq No</th>
                                        <th>Contact Person</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
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