<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> </title>

    <style>
    .navbar {
        background-color: #4A22D4 !important;
        /* Màu tím chính */
        box-shadow: 0 2px 10px rgba(74, 34, 212, 0.3);
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.45rem;
    }

    .nav-link {
        font-weight: 500;
        color: white !important;
    }

    .nav-link:hover,
    .nav-link.active {
        color: #e0d4ff !important;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 6px;
    }

    .dropdown-menu {
        background-color: #5b37e0;
        border: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .dropdown-item {
        color: white;
    }

    .dropdown-item:hover {
        background-color: #4A22D4;
    }
    </style>
</head>

<body>
    <!-- Navbar chính -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">QLSinhVien</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <!-- Quản lý sinh viên - Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="sinhvienDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Quản lý sinh viên
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="sinhvienDropdown">
                            <li>
                                <a class="dropdown-item" href="/sinhvien/create">Thêm sinh viên</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/sinhvien/index/5/0">Xem danh sách</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Quản lý lớp học -->
                    <li class="nav-item">
                        <a class="nav-link" href="/lop/index">Quản lý lớp học</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>