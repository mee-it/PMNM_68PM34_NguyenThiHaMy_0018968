<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <style>
        footer {
            background: linear-gradient(135deg, #ffb8d2, #b8d8ff, #cdb8ff);
            color: #4f3f7d;
            padding: 30px 0;
            margin-top: 0px;
            box-shadow: 0 -4px 18px rgba(166, 148, 255, 0.25);
        }

        footer p {
            margin-bottom: 0.5rem;
        }

        footer strong {
            color: #6a53a8;
        }

        footer a {
            color: #6a53a8;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        footer a:hover {
            color: #4f3f7d;
            text-decoration: underline;
        }

        footer {
            background: rgba(255, 245, 250, 0.9);
            background-image: linear-gradient(135deg,
                    #ffb8d2,
                    #b8d8ff,
                    #cdb8ff);
            backdrop-filter: blur(12px);
            border-top: 1px solid rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body>
    <footer>
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <p class="mb-1">&copy; <?php echo date("Y"); ?> QLSinhVien. All Rights Reserved.</p>
                    <p class="mb-0 small">
                        Developed by <strong>Nguyễn Thị Hà My</strong> |
                        <a href="#">Chính sách bảo mật</a> |
                        <a href="#">Liên hệ</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>


</body>

</html>