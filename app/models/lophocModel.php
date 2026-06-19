<?php
require_once '../app/core/DB.php';

class lophocModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB::Connect();
    }

    public function getAllLopHoc()
    {
        $query = "SELECT * FROM tbl_lophocs ORDER BY malop";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function paging($limit = 5, $offset = 0)
    {
        $query = "SELECT *
                  FROM tbl_lophocs
                  ORDER BY malop
                  LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $countQuery = $this->conn->query(
            "SELECT COUNT(*) FROM tbl_lophocs"
        );

        $totalRecords = $countQuery->fetchColumn();

        $totalPages = ceil($totalRecords / $limit);

        return [
            'lophocs' => $result,
            'totalpage' => $totalPages
        ];
    }

    public function create($data)
    {
        $query = "INSERT INTO tbl_lophocs (malop, tenlop, ghichu)
                  VALUES (:malop, :tenlop, :ghichu)";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute($data);
    }

    public function findById($id)
    {
        $query = "SELECT *
                  FROM tbl_lophocs
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByMaLop($malop)
    {
        $query = "SELECT *
                  FROM tbl_lophocs
                  WHERE malop = :malop";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':malop', $malop);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $query = "UPDATE tbl_lophocs
                  SET malop = :malop,
                      tenlop = :tenlop,
                      ghichu = :ghichu
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $data['id'] = $id;

        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $query = "DELETE FROM tbl_lophocs
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function countSinhVien($malop)
    {
        $query = "SELECT COUNT(*)
                  FROM tbl_sinhviens
                  WHERE malop = :malop";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':malop', $malop);

        $stmt->execute();

        return $stmt->fetchColumn();
    }
}
