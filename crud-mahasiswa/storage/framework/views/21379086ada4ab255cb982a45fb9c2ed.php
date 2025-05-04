

<?php $__env->startSection('title', 'Tambah Mahasiswa'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card form-container">
        <div class="card-header">
            <h3 class="card-title text-center"> Tambah Data </h3>
        </div>

        <div class="card-body font-bold">
            <form action="<?php echo e(route('mahasiswa.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama" class="form-label"> Nama </label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="nim" class="form-label"> NIM </label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label"> Alamat </label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-success"> Simpan </button>
                <a href="<?php echo e(route('mahasiswa.index')); ?>" class="btn btn-secondary"> Kembali </a>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PHP\htdocs\website\laravel\crud-mahasiswa\resources\views/mahasiswa/create.blade.php ENDPATH**/ ?>