<style>
    .student-card {
        max-width: 650px;
        margin: 0 auto;
        border: none;
        border-radius: 24px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(12px);
        box-shadow: 0 10px 30px rgba(166, 148, 255, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .student-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 35px rgba(166, 148, 255, 0.2);
    }

    .student-card .card-header {
        background-color: #ffb8d2;
        border: none;
        padding: 20px;
    }

    .student-card .card-header h3 {
        margin: 0;
        text-align: center;
        color: #4f3f7d;
        font-weight: 700;
        font-size: 1.5rem;
    }

    .student-card .card-body {
        padding: 32px;
    }

    .form-label {
        color: #5f5878;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border: 1.5px solid #eadfff;
        border-radius: 14px;
        padding: 12px 16px;
        background-color: #fcfbff;
        color: #4f3f7d;
        transition: all 0.3s ease;
    }

    .form-control::placeholder {
        color: #b4aacd;
    }

    .form-control:hover,
    .form-select:hover {
        border-color: #d9c9ff;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #cdb8ff;
        box-shadow: 0 0 0 0.2rem rgba(205, 184, 255, 0.25);
        background-color: #fff;
    }

    /* Tùy chỉnh select */

    .form-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        padding-right: 45px;

        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='none' viewBox='0 0 16 16'%3E%3Cpath d='M3 6l5 5 5-5' stroke='%236a53a8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");

        background-repeat: no-repeat;
        background-position: right 14px center;
        background-size: 16px;
    }

    .btn-submit,
    .btn-cancel {
        min-height: 48px;
        padding: 10px 28px;
        border: none;
        border-radius: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-submit {
        background-color: #b8d8ff;
        color: #365a8c;
    }

    .btn-submit:hover {
        background-color: #9fc9ff;
        color: #27456f;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(159, 201, 255, 0.4);
    }

    .btn-cancel {
        background-color: #ffe0ec;
        color: #8a4b6d;
    }

    .btn-cancel:hover {
        background-color: #ffc8de;
        color: #7a3857;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 184, 210, 0.4);
    }
</style>

<div class="container py-4">

    <div class="card student-card">

        <div class="card-header">
            <h3>Thêm sinh viên</h3>
        </div>

        <div class="card-body">

            <form action="/sinhvien/store" method="POST">

                <div class="mb-3">
                    <label for="hoten" class="form-label">Họ tên</label>

                    <input type="text" id="hoten" name="hoten" class="form-control" placeholder="Nhập họ và tên"
                        required>
                </div>

                <div class="mb-3">
                    <label for="gioitinh" class="form-label">Giới tính</label>

                    <select id="gioitinh" name="gioitinh" class="form-select" required>
                        <option value="">-- Chọn giới tính --</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="mssv" class="form-label">MSSV</label>

                    <input type="text" id="mssv" name="mssv" class="form-control" placeholder="Nhập mã số sinh viên"
                        required>
                </div>

                <div class="mb-4">
                    <label for="malop" class="form-label">Lớp học</label>

                    <select id="malop" name="malop" class="form-select" required>
                        <option value="">-- Chọn lớp học --</option>

                        <?php foreach ($lophocs as $lop): ?>
                            <option value="<?= $lop['malop'] ?>">
                                <?= $lop['tenlop'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex justify-content-center gap-3">

                    <button type="submit" class="btn btn-submit">
                        Thêm sinh viên
                    </button>

                    <a href="/sinhvien/index" class="btn btn-cancel">
                        Hủy
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>