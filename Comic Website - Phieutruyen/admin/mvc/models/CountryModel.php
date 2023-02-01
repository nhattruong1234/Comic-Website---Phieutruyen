<?php
/**
 * Class DiaChiModel
 */
class CountryModel extends DB
{
    /**
     * Lấy danh sách thành phố.
     * @return array
     */
    public function getCountry()
    {
        $sql = "SELECT * FROM country";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
} 