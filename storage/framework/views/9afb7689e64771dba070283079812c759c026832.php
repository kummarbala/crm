<?php $__env->startSection('content'); ?>
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
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
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
                                        <a href="<?php echo e(route('addorderacknowledgement')); ?>"><button type="button"
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
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $orderacknowledgementsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderacknowledgements): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($orderacknowledgements->name); ?></td>
                                        <td><?php echo e($orderacknowledgements->orderAckNo); ?></td>
                                        <td><?php echo e($orderacknowledgements->poNo); ?></td>
                                        <td><?php echo e($orderacknowledgements->enquireyNo); ?></td>
                                        <td><?php echo e($orderacknowledgements->contactPerson); ?></td>
                                        <td><a
                                                href="<?php echo e(route('editorderacknowledgement',[$orderacknowledgements->orderAckId])); ?>"
                                                class="actionbutwrapper" title="Edit"><i
                                                    class="fas fa-edit actionbuttonsize"></i></a><a
                                                href="<?php echo e(route('deleteorderacknowledgement',[$orderacknowledgements->orderAckId])); ?>"
                                                class="actionbutwrapper " id="<?php echo e($orderacknowledgements->orderAckId); ?>"
                                                onclick="return confirm('Are you sure you want to delete this Order Acknowledgements?');"
                                                title="Delete"><i
                                                    class="fas fa-trash-alt actionbuttonsize removeIcon"></i></a>
                                            
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>