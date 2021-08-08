<form action="<?= base_url('employee/tambah_aksi')?>" method="POST">
    <div class="form-group">
        <label>Employee Name</label>
        <input type="text" name="employee_name" class="form-control">
        <?=form_error('employee_name', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Division Name</label>
        <input type="text" name="div" class="form-control">
        <?=form_error('div', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Phone Number</label>
        <input type="text" name="mobile_no" class="form-control">
        <?=form_error('mobile_no', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;save</button>&nbsp;&nbsp;
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>&nbsp;reset</button>
</form>