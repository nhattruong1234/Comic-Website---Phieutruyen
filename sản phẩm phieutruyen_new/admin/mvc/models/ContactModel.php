<?php
/**
 * Class ContactModel
 */
class ContactModel extends DB
{
    const TABLE_NAME = 'feedback';
    
    /**
     * @return string
     */
    public function getTableName()
    {
        return self::TABLE_NAME;
    }

   /**
     * @return array
     */
    public function getList()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function updateStatus($id)
    {
        $sql = "UPDATE feedback SET status = 1 WHERE id = $id";
        return mysqli_query($this->con, $sql);
    }
    public function updateStatusMark($str)
    {
        //$ids = join("','",$str);   
        $sql = "UPDATE feedback SET status = 1 WHERE id IN ('.$str.')"; 
        return mysqli_query($this->con, $sql);
    }
    public function updateStatusBin($id)
    {
        $sql = "UPDATE feedback SET status = 2 WHERE id = $id";
        return mysqli_query($this->con, $sql);
    }
    function deleteById($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = {$id}";
        return mysqli_query($this->con, $sql);
    }
} 