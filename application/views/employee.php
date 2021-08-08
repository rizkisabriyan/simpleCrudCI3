<?= $this->session->flashdata ('pesan')?>
<div class="card">
    <div class="card-header">
        <a href="<?= base_url('employee/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Add Employee</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>Nik</th>
                    <th>Employee Name</th>
                    <th>Employee Division</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach($employee as $emp) : ?>
                <tbody>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $emp->employee_name ?></td>
                        <td><?= $emp->div ?></td>
                        <td><?= $emp->mobile_no ?></td>
                        <td> 
                            <button data-toggle="modal" data-target="#edit<?= $emp->nik ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>            </button>
                            <a href="<?= base_url('employee/delete/' . $emp->nik) ?>" class="btn btn-danger btn-sm" onclick="return confirm ('are you sure want to delete? ')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>


<!-- Modal edit -->
<?php foreach($employee as $emp) : ?>
<div class="modal fade" id="edit<?= $emp->nik ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('employee/edit/' .$emp ->nik) ?>" method="POST">
                    <div class="form-group">
                        <label>Employee Name</label>
                        <input type="text" name="employee_name" class="form-control" value="<?=$emp->employee_name ?>">
                        <?=form_error('employee_name', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Division Name</label>
                        <input type="text" name="div" class="form-control" value="<?=$emp->div ?>">
                        <?=form_error('div', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="mobile_no" class="form-control" value="<?=$emp->mobile_no ?>">
                        <?=form_error('mobile_no', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;save</button>&nbsp;&nbsp;
                        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>&nbsp;reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>