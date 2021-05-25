<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-address-card"></i>&nbsp; Quotations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Quotations</li>
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
                            <!-- <div class="col-sm-6"><h3 class="card-title">Quotations Data</h3></div> -->
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="card-title pTop10">Quotations Data</h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="<?php echo e(route('addquotation')); ?>"><button type="button"
                                                class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add
                                                Quotation</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="quotations" class="table table-bordered table-striped">
                                <thead class="thead-purple">
                                    <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>CTS Year</th>
                                        <th>CTS Ref</th>
                                        <th>Date</th>
                                        <th>Enquiry Reference</th>
                                        <th>OA NO</th>
                                        <th>Mail Sent</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $quotationsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quotations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($quotations->name); ?></td>
                                        <td><?php echo e($quotations->ctsYear); ?></td>
                                        <td><?php echo e($quotations->ctsRef); ?></td>
                                        <td><?php echo e($quotations->ctsDate); ?></td>
                                        <td><?php echo e($quotations->enquiryRef); ?></td>
                                        <td><?php echo e($quotations->qaNumber); ?></td>
                                        <td><?php if($quotations->mailSent === 1): ?> <i
                                                class="fas fa-envelope-open actionbuttonsize text-success"></i> <?php endif; ?>
                                        </td>
                                        <td><a href="<?php echo e(route('generatequotepdf',[$quotations->quotationId])); ?>"
                                                class="actionbutwrapper" title="PDF"><i
                                                    class="fas fa-file-pdf actionbuttonsize"></i></a><a
                                                href="<?php echo e(route('editquotation',[$quotations->quotationId])); ?>"
                                                class="actionbutwrapper" title="Edit"><i
                                                    class="fas fa-edit actionbuttonsize"></i></a><a
                                                href="<?php echo e(route('deletequotation',[$quotations->quotationId])); ?>"
                                                class="actionbutwrapper " id="<?php echo e($quotations->quotationId); ?>"
                                                onclick="return confirm('Are you sure you want to delete this Quotation?');"
                                                title="Delete"><i
                                                    class="fas fa-trash-alt actionbuttonsize removeIcon"></i></a>
                                            <a href="<?php echo e(route('dulicatequotation',[$quotations->quotationId])); ?>"
                                                class="actionbutwrapper" title="Duplicate"><i
                                                    class="fas fa-clone actionbuttonsize"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                                <tfoot class="thead-purple">
                                    <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>CTS Year</th>
                                        <th>CTS Ref</th>
                                        <th>Date</th>
                                        <th>Enquiry Reference</th>
                                        <th>OA NO</th>
                                        <th>Mail Sent</th>
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