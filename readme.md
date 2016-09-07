## Google Spreadsheets Tool
- 申請 https://console.developers.google.com/
- 建立 API 憑證 OAuth
- 取得以下資料, 編輯你的設定檔案, 擁有 key 的人就代表自己本身為 CLIENT_EMAIL
    - CLIENT_EMAIL
    - p12 key
- 建立 google sheet 並且共用給使用者 CLIENT_EMAIL

### Environment Request
- [x] PHP 5.6
- [x] composer (https://getcomposer.org/)
- [ ] npm
- [ ] gulp

### Installation
```sh
composer self-update
composer install
cp example.config.php config.php
vi config.php
```

### Install & update
```sh
php autorun.php
```

### Execute
```sh
php shell/test-google-sheet.php
```