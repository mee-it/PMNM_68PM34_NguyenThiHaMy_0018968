<?php
require_once '../app/core/Controller.php';
class sinhvien extends Controller
{
  public function index($limit = 5, $offset = 0, $search = '')
  {
    $sinhvienModel = $this->model('sinhvienModel');

    $result = $sinhvienModel->paging($limit, $offset, $search);
    $sinhviens = $result['sinhviens'];
    $totalpage = $result['totalpage'];
    //trả về view
    //require_once '../app/views/sinhvien/index.php';
    $this->view("layout/masterlayout", ['viewname' => 'sinhvien/index', 'sinhviens' => $sinhviens, 'title' => 'Danh sách sinh viên', 'totalpage' => $totalpage, 'offset' => $offset]);
  }

  public function create()
  {
    //require_once '../app/views/sinhvien/create.php';
    $lophocModel = $this->model('lophocModel');

    $lophocs = $lophocModel->getAllLopHoc();

    $this->view(
      "layout/masterlayout",
      [
        'viewname' => 'sinhvien/create',
        'title' => 'Thêm sinh viên',
        'lophocs' => $lophocs
      ]
    );
  }

  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'hoten' => $_POST['hoten'],
        'gioitinh' => $_POST['gioitinh'],
        'mssv' => $_POST['mssv'],
        'malop' => $_POST['malop']
      ];
      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->create($data);
      if ($result) {
        $_SESSION['success'] = "Thêm sinh viên thành công!";
        header("Location: /sinhvien/index");
        exit();
      } else {
        $_SESSION['error'] = "Thêm sinh viên thất bại!";
      }
    }
  }
  public function edit($id)
  {
    $sinhvienModel = $this->model('sinhvienModel');
    $lophocModel = $this->model('lophocModel');

    $sinhvien = $sinhvienModel->findById($id);
    $lophocs = $lophocModel->getAllLopHoc();

    $this->view(
      "layout/masterlayout",
      [
        'viewname' => 'sinhvien/edit',
        'sinhvien' => $sinhvien,
        'lophocs' => $lophocs,
        'title' => 'Chỉnh sửa sinh viên'
      ]
    );
  }
  public function update($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'hoten' => $_POST['hoten'],
        'gioitinh' => $_POST['gioitinh'],
        'mssv' => $_POST['mssv'],
        'malop' => $_POST['malop']
      ];
      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->update($id, $data);
      if ($result) {
        $_SESSION['success'] = "Cập nhật sinh viên thành công!";
        header("Location: /sinhvien/index");
        exit();
      } else {
        $_SESSION['error'] = "Cập nhật sinh viên thất bại!";
      }
    }
  }
  public function delete($id)
  {
    $sinhvienModel = $this->model('sinhvienModel');
    $result = $sinhvienModel->delete($id);
    if ($result) {
      $_SESSION['success'] = "Xóa sinh viên thành công!";
    } else {
      $_SESSION['error'] = "Xóa sinh viên thất bại!";
    }
    header("Location: /sinhvien/index");
    exit();
  }
}
