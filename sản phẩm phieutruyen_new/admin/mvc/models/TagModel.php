<?php
/**
 * Class DiaChiModel
 */
class TagModel extends DB
{
    /**
     * Lấy danh sách thành phố.
     * @return array
     */
    public function getTag()
    {
        $sql = "SELECT * FROM tag";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getList()
    {
        $sql = "SELECT * FROM comic";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

} 