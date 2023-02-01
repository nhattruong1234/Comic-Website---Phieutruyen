<?php
/**
 * Class Comic_chapterModel
 */
class Comic_chapterModel extends DB
{
    const TABLE_NAME = 'comic_chapters';
    
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
        $sql = "SELECT c.*,p.title product_title,p.image_path FROM {$this->getTableName()} c, products p WHERE c.product_id = p.id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }
    public function getByCateId($id)
    {
        $data = [];
        $sql = "SELECT c.*,p.title product_title,p.image_path FROM {$this->getTableName()} c, products p WHERE c.product_id = p.id AND c.product_id = {$id}";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;      
        }
        return $data;
    }
    public function getByChapterId($id)
    {
        $data = [];
        $sql = "SELECT * FROM {$this->getTableName()} c, products p WHERE c.product_id = p.id AND c.id = {$id}";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;      
        }
        return $data;
    }
}