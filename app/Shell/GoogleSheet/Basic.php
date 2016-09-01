<?php
namespace App\Shell\GoogleSheet;

use App\Shell\BaseController;
use App\Business\GoogleSheet\Wrap;
use App\Business\GoogleSheet\SheetManager;
use App\Business\GoogleSheet\Tool;

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

        $config = conf('google.web1');
        $keyFilePath = getProjectPath($config['key_file']);
        $clientEmail = $config['client_email'];
        $book   = $config['sheet_1']['book'];
        $sheet  = $config['sheet_1']['sheet'];
        //$urlKey = $config['sheet_1']['urlKey'];

        $token = Wrap::getToken($keyFilePath, $clientEmail);
        $googleWorkSheet = Wrap::getWorksheet($book, $sheet, $token);
        if (!$googleWorkSheet) {
            show('worksheet not found!', true);
            exit;
        }

        $sheet = new SheetManager($googleWorkSheet);

        $header = $sheet->getHeader();
        $count = $sheet->getCount();
        for ($i=0; $i<$count; $i++) {

            if (($i+1) > $showTotalCount) {
                break;
            }

            $row = $sheet->getRow($i);
            $row = Tool::filterUnusedCode($row);
            print_r($row);

        }

        echo "total rows count = {$count}\n";
    }

}
