<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1 0 auto;
            /* Quan trọng: làm nội dung giãn ra */
            width: 80%;
            /* Tăng độ rộng cho đẹp hơn */
            max-width: 1100px;
            margin: 20px auto;
            padding: 20px;
        }

        /* Footer luôn ở dưới */
        footer {
            flex-shrink: 0;
        }

        .toast-container {
            z-index: 9999;
        }

        .toast-pastel-success {
            background-color: #d8f3dc;
            color: #2d6a4f;
            border: 1px solid #b7e4c7;
            border-radius: 12px;
        }

        .toast-pastel-error {
            background-color: #ffe5ec;
            color: #9d4edd;
            border: 1px solid #ffc2d1;
            border-radius: 12px;
        }

        .toast {
            min-width: 320px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .toast .btn-close {
            opacity: 0.7;
        }
    </style>
</head>

<body>
    <?php require_once '../app/views/layout/partial/header.php'; ?>

    <div class="content">
        <?php if (isset($_SESSION['success'])): ?>

            <div class="toast-container position-fixed top-0 end-0 p-3">

                <div class="toast toast-pastel-success" id="autoToast">

                    <div class="d-flex align-items-center">

                        <div class="toast-body">
                            <?= $_SESSION['success']; ?>
                        </div>

                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast">
                        </button>

                    </div>

                </div>

            </div>

            <?php unset($_SESSION['success']); ?>

        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>

            <div class="toast-container position-fixed top-0 end-0 p-3">

                <div class="toast toast-pastel-error" id="autoToast">

                    <div class="d-flex align-items-center">

                        <div class="toast-body">
                            <?= $_SESSION['error']; ?>
                        </div>

                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast">
                        </button>

                    </div>

                </div>

            </div>

            <?php unset($_SESSION['error']); ?>

        <?php endif; ?>
        <?php
        require_once '../app/views/' . $viewname . '.php';
        ?>
    </div>

    <?php require_once '../app/views/layout/partial/footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const toastElement = document.getElementById('autoToast');

            if (toastElement) {

                const toast = new bootstrap.Toast(toastElement, {
                    delay: 2000,
                    autohide: true
                });

                toast.show();
            }
        });
    </script>
</body>

</html>