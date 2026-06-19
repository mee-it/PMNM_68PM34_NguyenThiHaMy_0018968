<?php
require_once '../app/core/Controller.php';

class lophoc extends Controller
{
  public function index($limit = 5, $offset = 0)
  {
    $lophocModel = $this->model('lophocModel');

    $result = $lophocModel->paging($limit, $offset);

    $lophocs = $result['lophocs'];
    $totalpage = $result['totalpage'];

    $this->view(
      "layout/masterlayout",
      [
        'viewname' => 'lophoc/index',
        'lophocs' => $lophocs,
        'title' => 'Danh sách lớp học',
        'totalpage' => $totalpage,
        'offset' => $offset
      ]
    );
  }

  public function create()
  {
    $this->view(
      "layout/masterlayout",
      [
        'viewname' => 'lophoc/create',
        'title' => 'Thêm lớp học'
      ]
    );
  }

  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $data = [
        'malop' => trim($_POST['malop']),
        'tenlop' => trim($_POST['tenlop']),
        'ghichu' => trim($_POST['ghichu'])
      ];

      $lophocModel = $this->model('lophocModel');

      if ($lophocModel->findByMaLop($data['malop'])) {

        $_SESSION['error'] = "Mã lớp đã tồn tại!";

        header("Location: /lophoc/create");
        exit();
      }

      $result = $lophocModel->create($data);

      if ($result) {

        $_SESSION['success'] = "Thêm lớp học thành công!";

        header("Location: /lophoc/index");
        exit();
      }

      $_SESSION['error'] = "Thêm lớp học thất bại!";
    }
  }

  public function edit($id)
  {
    $lophocModel = $this->model('lophocModel');

    $lophoc = $lophocModel->findById($id);

    $this->view(
      "layout/masterlayout",
      [
        'viewname' => 'lophoc/edit',
        'lophoc' => $lophoc,
        'title' => 'Chỉnh sửa lớp học'
      ]
    );
  }

  public function update($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $data = [
        'malop' => trim($_POST['malop']),
        'tenlop' => trim($_POST['tenlop']),
        'ghichu' => trim($_POST['ghichu'])
      ];

      $lophocModel = $this->model('lophocModel');

      $result = $lophocModel->update($id, $data);

      if ($result) {

        $_SESSION['success'] = "Cập nhật lớp học thành công!";

        header("Location: /lophoc/index");
        exit();
      }

      $_SESSION['error'] = "Cập nhật lớp học thất bại!";
    }
  }

  public function delete($id)
  {
    $lophocModel = $this->model('lophocModel');

    $lophoc = $lophocModel->findById($id);

    if ($lophocModel->countSinhVien($lophoc['malop']) > 0) {

      $_SESSION['error'] = "Lớp học vẫn còn sinh viên!";

      header("Location: /lophoc/index");
      exit();
    }

    $result = $lophocModel->delete($id);

    if ($result) {

      $_SESSION['success'] = "Xóa lớp học thành công!";
    } else {

      $_SESSION['error'] = "Xóa lớp học thất bại!";
    }

    header("Location: /lophoc/index");
    exit();
  }
}
