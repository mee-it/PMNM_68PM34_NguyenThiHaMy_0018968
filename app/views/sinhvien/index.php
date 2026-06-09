<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>


    <style>
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #4f46e5;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eef2ff;
            transition: 0.2s;
        }

        /* Pagination */
        .pagination {
            margin-top: 25px;
            text-align: center;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 14px;
            margin: 0 4px;
            text-decoration: none;
            color: #4f46e5;
            background-color: white;
            border: 1px solid #4f46e5;
            border-radius: 6px;
            font-weight: 500;
        }

        .pagination a:hover {
            background-color: #4f46e5;
            color: white;
            transition: 0.2s;
        }

        /* Button Bootstrap */
        .btn-edit {
            background-color: #b010b9;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-edit:hover {
            background-color: #e05de2;
            color: white;
        }

        .btn-delete {
            background-color: #ef4444;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-delete:hover {
            background-color: #dc2626;
            color: white;
        }
    </style>
</head>

<body>
    <h1><?php echo $title; ?></h1>

    <table>
        <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>MSSV</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach ($sinhviens as $sv): ?>
            <tr>
                <td><?php echo $sv['id']; ?></td>
                <td><?php echo $sv['hoten']; ?></td>
                <td><?php echo $sv['gioitinh']; ?></td>
                <td><?php echo $sv['mssv']; ?></td>
                <td>
                    <a href="/sinhvien/edit/<?php echo $sv['id']; ?>" class="btn-edit">
                        Sửa
                    </a>

                    <a href="/sinhvien/delete/<?php echo $sv['id']; ?>" class="btn-delete"
                        onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Phân trang -->
    <div class="pagination">
        <?php
        $pagesize = 5;
        for ($i = 1; $i <= $totalpage; $i++) {
            $offset = ($i - 1) * $pagesize;
            echo "<a href='/sinhvien/index/$pagesize/$offset'>$i</a> ";
        }
        ?>
    </div>
</body>

</html>