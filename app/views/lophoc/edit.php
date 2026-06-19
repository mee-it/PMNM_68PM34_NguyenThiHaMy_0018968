<h2>Chỉnh sửa lớp học</h2>

<?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form action="/lophoc/update/<?= $lophoc['id']; ?>" method="POST">

    <div class="mb-3">
        <label for="malop" class="form-label">Mã lớp</label>

        <input type="text" class="form-control" id="malop" name="malop"
            value="<?= htmlspecialchars($lophoc['malop']); ?>" required>
    </div>

    <div class="mb-3">
        <label for="tenlop" class="form-label">Tên lớp</label>

        <input type="text" class="form-control" id="tenlop" name="tenlop"
            value="<?= htmlspecialchars($lophoc['tenlop']); ?>" required>
    </div>

    <div class="mb-3">
        <label for="ghichu" class="form-label">Ghi chú</label>

        <textarea class="form-control" id="ghichu" name="ghichu"
            rows="4"><?= htmlspecialchars($lophoc['ghichu'] ?? ''); ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        Cập nhật
    </button>

    <a href="/lophoc/index" class="btn btn-secondary">
        Quay lại
    </a>

</form>