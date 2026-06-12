<div class="container mt-4">

    <div class="card shadow mx-auto" style="max-width: 600px;">
        <div class="card-header bg-warning">
            <h3 class="mb-0">Sửa sinh viên</h3>
        </div>

        <div class="card-body">
            <form action="/sinhvien/update/<?php echo $sinhvien['id']; ?>" method="POST">

                <div class="mb-3">
                    <label class="form-label">Họ tên</label>
                    <input type="text" name="hoten" class="form-control" value="<?php echo $sinhvien['hoten']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Giới tính</label>
                    <input type="text" name="gioitinh" class="form-control" value="<?php echo $sinhvien['gioitinh']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">MSSV</label>
                    <input type="text" name="mssv" class="form-control" value="<?php echo $sinhvien['mssv']; ?>"
                        required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning">
                        Cập nhật
                    </button>

                    <a href="/sinhvien/index" class="btn btn-secondary">
                        Hủy
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>