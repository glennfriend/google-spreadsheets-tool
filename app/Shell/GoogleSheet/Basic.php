<?php
namespace App\Shell\GoogleSheet;
use App\Shell\BaseController;
use App\Business\GoogleSheet\Tool;
use App\Business\GoogleSheet\Service;

/**
 *
 */
class Basic extends BaseController
{

    /**
     *
     */
    protected function TestOnly()
    {
        $showTotalCount = 3;
        $configKey = 'web1';

        $sheetManager = Service::factorySheetManagerByKey($configKey);
        $googleWorkSheet = $sheetManager->getOriginWorksheet();

        $header = $sheetManager->getHeader();
        $count = $sheetManager->getCount();
        $rows = [];
        for ($i=0; $i<$count; $i++) {

            if (($i+1) > $showTotalCount) {
                break;
            }

            $row = $sheetManager->getRow($i);
            $row = Tool::filterUnusedCode($row);
            dd($row);

        }

        echo "total rows count = {$count}\n";
        echo "last update = " . $googleWorkSheet->getUpdated()->getTimestamp();
        echo " (" . $googleWorkSheet->getUpdated()->format('Y-m-d H:i:s') . ")";
        echo "\n";
    }

}
