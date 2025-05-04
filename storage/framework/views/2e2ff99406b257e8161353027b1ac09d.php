

<?php $__env->startSection('title', 'Data Mahasiswa'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title text-center"> Data Mahasiswa 
            <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn btn-success float-end"> Tambah </a>
        </h3>
        
    </div>

    <div class="card-body">
        <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>

            <?php $__currentLoopData = $mhs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($mahasiswa->id); ?></td>
                <td><?php echo e($mahasiswa->nama); ?></td>
                <td><?php echo e($mahasiswa->nim); ?></td>
                <td><?php echo e($mahasiswa->alamat); ?></td>
                <td>
                    <a href="<?php echo e(route('mahasiswa.edit', $mahasiswa->id)); ?>"
                    class="btn btn-warning"> Edit </a>

                    <form action="<?php echo e(route('mahasiswa.destroy', $mahasiswa->id)); ?>"
                    method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?> 
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin dihapus?')"> Delete </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PHP\htdocs\website\laravel\crud-mahasiswa\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>