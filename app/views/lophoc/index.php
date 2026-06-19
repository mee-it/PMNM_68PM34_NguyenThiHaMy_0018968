<style>
    h1 {
        text-align: center;
        color: #4f3f7d;
        margin: 30px 0;
        font-weight: 700;
    }

    table {
        width: 85%;
        margin: auto;
        border-collapse: separate;
        border-spacing: 0;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(12px);
        box-shadow: 0 8px 24px rgba(166, 148, 255, 0.15);
        border-radius: 18px;
        overflow: hidden;
    }

    th {
        background-color: #ffd1e3;
        color: #4f3f7d;
        padding: 14px;
        font-weight: 600;
    }

    td {
        padding: 14px;
        text-align: center;
        border-bottom: 1px solid #f1e8ff;
        color: #5f5878;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:nth-child(even) {
        background-color: #fcf8ff;
    }

    tr:hover {
        background-color: #f3efff;
        transition: all 0.25s ease;
    }

    /* Pagination */

    .pagination {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .pagination a {
        display: inline-block;
        min-width: 42px;
        padding: 10px 14px;
        text-decoration: none;
        color: #6a53a8;
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid #d8c8ff;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(166, 148, 255, 0.1);
    }

    .pagination a:hover {
        background: linear-gradient(135deg, #ffb8d2, #b8d8ff);
        color: #4f3f7d;
        transform: translateY(-2px);
    }

    /* Nút sửa */

    .btn-edit {
        display: inline-block;
        background-color: #b8d8ff;
        color: #365a8c;
        padding: 8px 14px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.25s ease;
        margin-right: 6px;
    }

    .btn-edit:hover {
        background-color: #9fc9ff;
        color: #27456f;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(159, 201, 255, 0.4);
    }

    /* Nút xóa */

    .btn-delete {
        display: inline-block;
        background-color: #ffc4b8;
        color: #9a4d3f;
        padding: 8px 14px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.25s ease;
    }

    .btn-delete:hover {
        background-color: #ffae9d;
        color: #7a382b;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 174, 157, 0.4);
    }
</style>

<h1><?= $title ?></h1>

<table>
    <tr>
        <th>STT</th>
        <th>Mã lớp</th>
        <th>Tên lớp</th>
        <th>Ghi chú</th>
        <th>Thao tác</th>
    </tr>

    <?php $stt = $offset + 1; ?>

    <?php foreach ($lophocs as $lop): ?>
        <tr>
            <td><?= $stt++ ?></td>

            <td><?= htmlspecialchars($lop['malop']) ?></td>

            <td><?= htmlspecialchars($lop['tenlop']) ?></td>

            <td><?= htmlspecialchars($lop['ghichu']) ?></td>

            <td>
                <a href="/lophoc/edit/<?= $lop['id'] ?>" class="btn-edit">
                    Sửa
                </a>

                <a href="/lophoc/delete/<?= $lop['id'] ?>" class="btn-delete"
                    onclick="return confirm('Bạn có chắc muốn xóa lớp học này?')">
                    Xóa
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="pagination">
    <?php
    $pagesize = 5;

    for ($i = 1; $i <= $totalpage; $i++) {
        $offset = ($i - 1) * $pagesize;

        echo "<a href='/lophoc/index/$pagesize/$offset'>$i</a>";
    }
    ?>
</div>