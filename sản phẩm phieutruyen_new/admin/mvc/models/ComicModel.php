<?php
/**
 * Class DanhMucModel
 */
class ComicModel extends DB
{
    const TABLE_NAME = 'comic';
    
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
        $sql = "SELECT * FROM {$this->getTableName()} c where c.status = 'Chờ duyệt'";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function getListComic()
    {
        $sql = "SELECT c.*,us.account_name FROM {$this->getTableName()} c join user us on c.id_user=us.id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    } 
    public function getChapter()
    {
        $sql = "SELECT * FROM comic co join chapter ch on co.id=ch.id_comic WHERE ch.status = 'Chờ duyệt'";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    } 
    public function updateStatusComic($id)
    {
        $sql = "UPDATE chapter SET status = 'Đã duyệt' WHERE id_comic = $id";
        $sql1 = "UPDATE comic SET status = 'Đang tiến hành' WHERE id = $id";
        $result= mysqli_query($this->con, $sql);
        $result1= mysqli_query($this->con, $sql1);
        return $result and $result1;
    }
    public function updateStatusChapter($id)
    {
        $sql = "UPDATE chapter SET status = 'Đã duyệt' WHERE id = $id ";
        return mysqli_query($this->con, $sql);
    }
    public function updateStatusChuong($id)
    {
        $sql = "UPDATE chapter SET status = 'Đã duyệt' WHERE id = $id ";
        return mysqli_query($this->con, $sql);
    }
    public function getChuong($id)
    {
        $sql = "SELECT id_comic FROM chapter ch WHERE ch.id=$id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;}
        return $data;
    } 
    /* public function getChuong($id)
    {
        $sql = "SELECT id_comic FROM chapter ch WHERE ch.id=$id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
     */
    public function deleteByIdComic($id)
    {
        //$sql = "DELETE ch.* FROM comic co, chapter ch WHERE co.id=ch.id_comic AND co.id = $id";
        $sql1 =  "DELETE FROM comic WHERE id = $id";
        //$result= mysqli_query($this->con, $sql);
        $result1= mysqli_query($this->con, $sql1);
        return  $result1;
    }
    public function deleteById_chapter($id)
    {
        $sql = "DELETE FROM chapter WHERE id = $id";
        return mysqli_query($this->con, $sql);
    }
    public function deleteById_comic($id)
    {
        $sql = "DELETE o.* FROM comic co, other_name_comic o WHERE co.id=o.id_comic AND co.id = $id";
        $sql1 = "DELETE ch.* FROM comic co, chapter ch WHERE co.id=ch.id_comic AND co.id = $id";
        $sql2 =  "DELETE FROM comic WHERE id = $id";
        $result= mysqli_query($this->con, $sql);
        $result1= mysqli_query($this->con, $sql1);
        $result2= mysqli_query($this->con, $sql2);
        return $result and $result1 and  $result2;
    }

    public function nhatkyhd()
    {
        $sql = "SELECT c.*, u.account_name, ch.updated_at updated_at_chapter, ch.index index_chapter, c.status, ch.status status_chapter FROM comic c, user u, chapter ch WHERE c.id=ch.id_comic and c.id_user= u.id ORDER BY updated_at_chapter desc";
        
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    } 
    public function getByChapterId($id)
    {
        $data = [];
        $sql = "SELECT c.*, co.name name_comic, co.coverphoto coverphoto FROM chapter c, comic co  WHERE co.id=c.id_comic AND co.id = {$id}";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;      
        }
        return $data;
    }
    public function getByChapterId_choduyet($id)
    {
        $data = [];
        $sql = "SELECT c.*, co.name name_comic, co.coverphoto coverphoto FROM chapter c, comic co  WHERE co.id=c.id_comic AND co.id = {$id}";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;      
        }
        return $data;
    }

    /* public function getList()
    {
        $sql = "SELECT p.*,c.title cate_title FROM {$this->getTableName()} p, categories c WHERE p.category_id = c.id";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    } */

    /**
     * @param $id
     * @return string[]|null
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }
    
    public function search($q,$q1)
    {
        //$id = join("','",$q);   
        //$id1 = join("','",$q1);  
        $data = [];
        $sql = "SELECT DISTINCT cm.*, us.account_name  FROM comic cm, tag_comic tg_cm, user us WHERE us.id=cm.id_user AND cm.status != 'Chờ duyệt' AND cm.id=tg_cm.id_comic AND (id_tag IN ('$q') OR (id_country IN ('$q1') ))";
        $result = mysqli_query($this->con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    } 
    //id_tag IN ('.$q.')  OR (id_country IN ('$q1') (cm.status IN ('.$q2.')
    
} 