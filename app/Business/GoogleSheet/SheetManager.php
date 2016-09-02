<?php
namespace App\Business\GoogleSheet;

/**
 * 管理 google worksheet
 *
 * Example:
 *
 *      name,age,like
 *      kevin,15,eat
 *      vivian,18,eat/sport
 *      old man,85,mountain
 *      Chris,45,game
 *
 *      $sheet = new SheetManager($googleWorksheet);
 *      $count = $sheet->getCount();
 *      for ($i=0; $i<$count; $i++) {
 *          $row = $sheet->getRow($i);
 *          $row['age']++;
 *          $sheet->setRow($i, $row);
 *      }
 *
 */
class SheetManager
{
    /**
     * Google\Spreadsheet\Worksheet
     */
    protected $worksheet;

    /**
     *
     */
    protected $entries;

    /**
     *
     */
    public function __construct(\Google\Spreadsheet\Worksheet $worksheet)
    {
        $this->worksheet = $worksheet;
        $this->entries = $worksheet->getListFeed()->getEntries();
    }

    // --------------------------------------------------------------------------------
    //
    // --------------------------------------------------------------------------------
    public function getOriginWorksheet()
    {
        return $this->worksheet;
    }

    // --------------------------------------------------------------------------------
    //
    // --------------------------------------------------------------------------------

    /**
     * google sheet 在取 header 後, 會過濾名稱
     * 只留下 "a-z" "0-9" "-" 這些文字符號
     *
     * @return array
     */
    public function getHeader()
    {
        $row = $this->getRow(0);
        if (!$row) {
            return array();
        }

        $result = array();
        foreach ($row as $title => $value) {
            $result[] = $title;
        }

        return $result;
    }

    /**
     * 取得的 header 部份會被過濾
     *
     * @return array or false
     */
    public function getRow($index)
    {
        if ( isset($this->entries[$index]) && is_object($this->entries[$index]) ) {
            return $this->entries[$index]->getValues();
        }
        return false;
    }

    /**
     *  @return boolean
     */
    public function setRow($index, $row)
    {
        $oldRow = $this->getRow($index);
        if (!$oldRow) {
            return false;
        }

        $entry = $this->entries[$index];
        return $entry->update($row);
    }

    /**
     *  不包含標題的資料數量
     *
     *  @return int
     */
    public function getCount()
    {
        return (int) count($this->entries);
    }

}
