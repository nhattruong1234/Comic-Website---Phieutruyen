<?php

/**
 * Class KhachHangModel
 */
class KhachHangModel extends DB
{
    const TABLE_NAME = 'user';
    
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

    
    
    public function getList()
    {
        $sql = "SELECT * FROM user ";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM user WHERE id = {$id}";
        return mysqli_query($this->con, $sql);
    }

    

    

    
}