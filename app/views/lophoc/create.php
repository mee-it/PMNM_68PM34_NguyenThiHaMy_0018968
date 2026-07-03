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
        width: 100%;
    }

    .form-control::placeholder {
        color: #b4aacd;
    }

    .form-control:hover {
        border-color: #d9c9ff;
    }

    .form-control:focus {
        border-color: #cdb8ff;
        box-shadow: 0 0 0 0.2rem rgba(205, 184, 255, 0.25);
        background-color: #fff;
        outline: none;
    }

    textarea.form-control {
        min-height: 110px;
        resize: vertical;
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
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
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
            <h3>Thêm lớp học</h3>
        </div>

        <div class="card-body">

            <form action="/lophoc/store" method="POST">

                <div class="mb-3">
                    <label for="malop" class="form-label">Mã lớp</label>
                    <input type="text" id="malop" name="malop" class="form-control" placeholder="Nhập mã lớp" required>
                </div>

                <div class="mb-3">
                    <label for="tenlop" class="form-label">Tên lớp</label>
                    <input type="text" id="tenlop" name="tenlop" class="form-control" placeholder="Nhập tên lớp"
                        required>
                </div>

                <div class="mb-4">
                    <label for="ghichu" class="form-label">Ghi chú</label>
                    <textarea id="ghichu" name="ghichu" class="form-control" placeholder="Nhập ghi chú"></textarea>
                </div>

                <div class="d-flex justify-content-center gap-3">

                    <button type="submit" class="btn btn-submit">
                        Thêm lớp học
                    </button>

                    <a href="/lophoc/index" class="btn btn-cancel">
                        Hủy
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>