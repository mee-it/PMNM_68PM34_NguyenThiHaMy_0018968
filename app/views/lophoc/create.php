<h2>Thêm lớp học</h2>

<form action="/lophoc/store" method="POST">

    <div>
        <label>Mã lớp</label>
        <input type="text" name="malop" required>
    </div>

    <div>
        <label>Tên lớp</label>
        <input type="text" name="tenlop" required>
    </div>

    <div>
        <label>Ghi chú</label>
        <textarea name="ghichu"></textarea>
    </div>

    <button type="submit">
        Thêm lớp học
    </button>

</form>