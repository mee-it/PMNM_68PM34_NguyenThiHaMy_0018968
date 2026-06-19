<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> </title>

    <style>
        .navbar {
            background: linear-gradient(135deg, #ffb8d2, #b8d8ff, #cdb8ff) !important;
            box-shadow: 0 4px 18px rgba(166, 148, 255, 0.35);
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.45rem;
            color: #4f3f7d !important;
            letter-spacing: 0.5px;
        }

        .nav-link {
            font-weight: 500;
            color: #4f3f7d !important;
            transition: all 0.3s ease;
            padding: 8px 14px !important;
            border-radius: 12px;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.4);
            color: #6a53a8 !important;
            transform: translateY(-1px);
        }

        .dropdown-menu {
            background: rgba(255, 245, 250, 0.95);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(205, 184, 255, 0.4);
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(166, 148, 255, 0.25);
            padding: 8px;
        }

        .dropdown-item {
            color: #4f3f7d;
            border-radius: 10px;
            padding: 10px 14px;
            transition: all 0.25s ease;
        }

        .dropdown-item:hover {
            background: linear-gradient(90deg, #ffc8df, #c8e0ff);
            color: #6a53a8;
            transform: translateX(3px);
        }

        .navbar-toggler {
            border-color: rgba(79, 63, 125, 0.3);
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.15rem rgba(184, 216, 255, 0.8);
        }

        body {
            background: linear-gradient(180deg, #fff0f6, #eef5ff);
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <!-- Navbar chính -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">QLSinhVien</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <!-- Quản lý sinh viên - Dropdown -->
                    <li class="nav-item dropdown me-4">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="lophocDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Quản lý lớp học
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="lophocDropdown">
                            <li>
                                <a class="dropdown-item" href="/lophoc/create">Thêm lớp học</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/lophoc/index/5/0">Xem danh sách</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>