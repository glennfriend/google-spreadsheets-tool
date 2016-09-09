test code
    project         - 跟專案有關的程式
    environment     - 跟系統環境有關的 test
    php-document    - php kernel code

test command line auto
    phpunit
    --> auto include "phpunit.xml" config

    phpunit --configuration phpunit.report.xml
    --> auto include "phpunit.report.xml" config
    --> 如果沒有產生 report, 請仔細看錯誤訊息

test command line my-self
    phpunit --bootstrap ./autoload.php ./project/user/*
