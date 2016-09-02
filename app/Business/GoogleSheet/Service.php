<?php
namespace App\Business\GoogleSheet;
use App\Business\GoogleSheet\Wrap;
use App\Business\GoogleSheet\SheetManager;

/**
 *
 */
class Service
{
    /**
     * 依照設定檔的一組 key, 來決定取得的 $sheetManager
     */
    public static function factorySheetManagerByKey($configKey)
    {

        $config = conf('google.web1');
        $keyFilePath = getProjectPath($config['key_file']);
        $clientEmail = $config['client_email'];
        $book   = $config['sheet_1']['book'];
        $sheet  = $config['sheet_1']['sheet'];

        $assertionCredentials = [
            'https://spreadsheets.google.com/feeds',
        ];

        $token = Wrap::getToken($keyFilePath, $clientEmail, $assertionCredentials);
        $googleWorkSheet = Wrap::getWorksheet($book, $sheet, $token);
        if (!$googleWorkSheet) {
            show('worksheet not found!', true);
            exit;
        }

        return new SheetManager($googleWorkSheet);
    }
}
