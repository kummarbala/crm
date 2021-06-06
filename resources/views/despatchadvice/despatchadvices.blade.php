@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-address-card"></i>&nbsp; Delivery Challans</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Delivery Challan</li>
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
                                        <h3 class="card-title pTop10">Despatch Advice Data</h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{ route('adddeliverychallan') }}"><button type="button"
                                                class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add
                                                Despatch Advice</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="despatchadvicetable" class="table table-bordered table-striped">
                                <thead class="thead-purple">
                                    <tr>
                                        <th>No</th>
                                        <th>Ack No </th>
                                        <th>Customer Name</th>
                                        <th>Contact Person</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($despatchadvicesData as $despatchadvices)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$despatchadvices->orderAckNo}}</td>
                                        <td>{{$despatchadvices->name}}</td>                                        
                                        <td>{{$despatchadvices->contactPerson}}</td>
                                        <td><a href="{{ route('editdeliverychallan',[$despatchadvices->despatchdviceId]) }}"
                                                class="actionbutwrapper" title="Edit"><i
                                                    class="fas fa-edit actionbuttonsize"></i></a><a
                                                href="{{ route('deletedeliverychallan',[$despatchadvices->despatchdviceId]) }}"
                                                class="actionbutwrapper " id="{{$despatchadvices->despatchdviceId}}"
                                                onclick="return confirm('Are you sure you want to delete this Delivery Challan?');"
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
                                        <th>Ack No</th>
                                        <th>Customer Name</th>                                        
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