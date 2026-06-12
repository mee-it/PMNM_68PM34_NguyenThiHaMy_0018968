<?php
require_once '../app/core/DB.php';
class sinhvienModel
{
    private $conn;
    public function __construct()
    {
        $this->conn = connectDB::Connect();
    }
    public function getAllSinhVien()
    {
        $query = "SELECT * FROM tbl_sinhviens";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data)
    {
        $query = "INSERT INTO tbl_sinhviens (hoten, gioitinh, mssv) VALUES (:hoten, :gioitinh, :mssv)";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    public function paging($limit = 5, $offset = 0, $search = '')
    {
        $query = "
SELECT sv.*, lh.tenlop
FROM tbl_sinhviens sv
LEFT JOIN tbl_lophocs lh
ON sv.malop = lh.malop
LIMIT :limit OFFSET :offset
";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //tính tổng số bản ghi
        $selectAllQuery = $this->conn->query("SELECT COUNT(*) FROM tbl_sinhviens");
        //$selectAllQuery->execute();
        $totalRecords   = $selectAllQuery->fetchColumn();
        $totalPages     = ceil($totalRecords / $limit);
        return ['sinhviens' => $result, 'totalpage' => $totalPages];
    }
    public function findById($id)
    {
        $query = "SELECT * FROM tbl_sinhviens WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $data)
    {
        $query = "UPDATE tbl_sinhviens SET hoten = :hoten, gioitinh = :gioitinh, mssv = :mssv WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $data['id'] = $id;
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    public function delete($id)
    {
        $query = "DELETE FROM tbl_sinhviens WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
