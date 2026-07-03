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
        try {
            $query = "INSERT INTO tbl_sinhviens (hoten, gioitinh, mssv, malop)
          VALUES (:hoten, :gioitinh, :mssv, :malop)";
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute($data)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                return 'duplicate';
            }

            return false;
        }
    }
    public function paging(
        $limit = 5,
        $offset = 0,
        $keyword = '',
        $malop = '',
        $sort = ''
    ) {
        $query = "
SELECT sv.*, lh.tenlop
FROM tbl_sinhviens sv
LEFT JOIN tbl_lophocs lh
ON sv.malop = lh.malop
WHERE 1=1
";

        $params = [];
        if ($keyword != '') {

            $query .= "
        AND (
            sv.hoten LIKE :keyword
            OR sv.mssv LIKE :keyword
        )
    ";

            $params['keyword'] = "%$keyword%";
        }

        if ($malop != '') {
            $query .= " AND sv.malop = :malop";
            $params['malop'] = $malop;
        }

        switch ($sort) {

            case 'mssv_asc':
                $query .= " ORDER BY sv.mssv ASC";
                break;

            case 'mssv_desc':
                $query .= " ORDER BY sv.mssv DESC";
                break;

            case 'hoten_asc':
                $query .= " ORDER BY sv.hoten ASC";
                break;

            case 'hoten_desc':
                $query .= " ORDER BY sv.hoten DESC";
                break;

            default:
                $query .= " ORDER BY sv.id DESC";
        }
        $countQuery = "
SELECT COUNT(*)
FROM tbl_sinhviens sv
WHERE 1=1
";
        if ($keyword != '') {

            $countQuery .= "
        AND (
            sv.hoten LIKE :keyword
            OR sv.mssv LIKE :keyword
        )
    ";
        }

        if ($malop != '') {
            $countQuery .= " AND sv.malop = :malop";
        }
        $countStmt = $this->conn->prepare($countQuery);

        foreach ($params as $key => $value) {
            $countStmt->bindValue(":$key", $value);
        }

        $countStmt->execute();

        $totalRecords = $countStmt->fetchColumn();

        $query .= " LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($query);

        foreach ($params as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $totalPages = ceil($totalRecords / $limit);

        return [
            'sinhviens' => $result,
            'totalpage' => $totalPages,
            'totalrecord' => $totalRecords
        ];
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
        try {
            $query = "UPDATE tbl_sinhviens
          SET hoten = :hoten,
              gioitinh = :gioitinh,
              mssv = :mssv,
              malop = :malop
          WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $data['id'] = $id;
            if ($stmt->execute($data)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                return 'duplicate';
            }
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
    public function findByMssv($mssv)
    {
        $query = "SELECT id FROM tbl_sinhviens WHERE mssv = :mssv";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':mssv', $mssv);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function findByMssvExceptId($mssv, $id)
    {
        $query = "SELECT id
              FROM tbl_sinhviens
              WHERE mssv = :mssv
              AND id != :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':mssv', $mssv);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
