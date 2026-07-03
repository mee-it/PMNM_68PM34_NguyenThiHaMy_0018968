<?php
require_once '../app/core/Controller.php';
class sinhvien extends Controller
{
  public function index($limit = 5, $offset = 0)
  {

    $sinhvienModel = $this->model('sinhvienModel');
    $lophocModel = $this->model('lophocModel');
    $keyword = $_GET['keyword'] ?? '';


    $malop = $_GET['malop'] ?? '';

    $sort = $_GET['sort'] ?? '';

    $limit = $_GET['limit'] ?? $limit;

    $result = $sinhvienModel->paging(
      $limit,
      $offset,
      $keyword,
      $malop,
      $sort
    );

    $sinhviens = $result['sinhviens'];

    $totalpage = $result['totalpage'];

    $totalrecord = $result['totalrecord'];

    $lophocs = $lophocModel->getAllLopHoc();

    $this->view(
      "layout/masterlayout",
      [
        'viewname' => 'sinhvien/index',

        'title' => 'Danh sách sinh viên',

        'sinhviens' => $sinhviens,

        'totalpage' => $totalpage,

        'totalrecord' => $totalrecord,

        'offset' => $offset,

        'limit' => $limit,

        'keyword' => $keyword,

        'malop' => $malop,

        'sort' => $sort,

        'lophocs' => $lophocs
      ]
    );
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
      if ($sinhvienModel->findByMSSV($data['mssv'])) {
        $_SESSION['error'] = "MSSV đã tồn tại!";
        header("Location: /sinhvien/create");
        exit();
      }
      $result = $sinhvienModel->create($data);
      if ($result === true) {
        $_SESSION['success'] = "Thêm sinh viên thành công!";
        header("Location: /sinhvien/index");
        exit();
      }
      if ($result === 'duplicate') {
        $_SESSION['error'] = "MSSV đã tồn tại!";
        header("Location: /sinhvien/create");
        exit();
      }


      $_SESSION['error'] = "Thêm sinh viên thất bại!";
      header("Location: /sinhvien/create");
      exit();
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
      if ($sinhvienModel->findByMssvExceptId($data['mssv'], $id)) {
        $_SESSION['error'] = "MSSV đã tồn tại!";
        header("Location: /sinhvien/edit/$id");
        exit();
      }
      $result = $sinhvienModel->update($id, $data);
      if ($result) {
        $_SESSION['success'] = "Cập nhật sinh viên thành công!";
        header("Location: /sinhvien/index");
        exit();
      }
      $_SESSION['error'] = "Cập nhật sinh viên thất bại!";
      header("Location: /sinhvien/edit/$id");
      exit();
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
