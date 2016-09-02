<?php
namespace App\Shell\GoogleSheet;
use App\Shell\BaseController;
use App\Business\GoogleSheet\Tool;
use App\Business\GoogleSheet\Service;

/**
 *
 */
class Download extends BaseController
{

    /**
     * 下載 "web1" 所設定的 google sheet
     */
    protected function downloadWeb1()
    {
        $configKey = 'web1';
        $saveFile = 'download_web1.json';

        $sheetManager = Service::factorySheetManagerByKey($configKey);
        $googleWorkSheet = $sheetManager->getOriginWorksheet();

        $count = $sheetManager->getCount();
        $rows = [];
        for ($i=0; $i<$count; $i++) {

            $row = $sheetManager->getRow($i);
            $row = Tool::filterUnusedCode($row);
            $rows[] = $row;

        }

        $json = json_encode($rows, JSON_PRETTY_PRINT);
        $saveFile = getProjectPath('/var/' . $saveFile);
        $saveBytes = file_put_contents($saveFile, $json);
        $size = number_format($saveBytes / 1024, 2);

        echo "total count = {$count}\n";
        echo "last update = " . $googleWorkSheet->getUpdated()->getTimestamp();
        echo " (" . $googleWorkSheet->getUpdated()->format('Y-m-d H:i:s') . ")\n";
        echo "save size   = {$size} KB\n";
        echo "save to     = '{$saveFile}'\n";
    }

}
