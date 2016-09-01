<?php
namespace App\Business\GoogleSheet;
use Google\Spreadsheet\DefaultServiceRequest;
use Google\Spreadsheet\ServiceRequestFactory;

/**
 *
 */
class Wrap
{

    /**
     *  @return token or false
     */
    public static function getToken($keyFilePath, $clientEmail)
    {
        $key = file_get_contents($keyFilePath);
        $cred = new \Google_Auth_AssertionCredentials(
            $clientEmail,
            array('https://spreadsheets.google.com/feeds'),
            $key
        );

        $client = new \Google_Client();
        $client->setAssertionCredentials($cred);

        if (!$client->getAuth()->isAccessTokenExpired()) {
            return false;
        }
        else {
            $client->getAuth()->refreshTokenWithAssertion($cred);
        }

        $service_token = json_decode($client->getAccessToken());
        return $service_token->access_token;
    }

    /**
     *  @return worksheet or false
     */
    public static function getWorksheet($book, $page, $token)
    {
        $serviceRequest = new DefaultServiceRequest($token);
        ServiceRequestFactory::setInstance($serviceRequest);

        $spreadsheetService = new \Google\Spreadsheet\SpreadsheetService();
        $spreadsheetFeed = $spreadsheetService->getSpreadsheets();

        $spreadsheet = $spreadsheetFeed->getByTitle($book);
        if (!$spreadsheet) {
            return false;
        }

        $worksheets = $spreadsheet->getWorksheets();
        if (!$worksheets) {
            return false;
        }

        return $worksheets->getByTitle($page);
    }

}
