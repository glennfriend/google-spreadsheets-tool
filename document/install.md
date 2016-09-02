## virtual host (參考)
```sh
    # 請盡可能使用 SSL
    Alias /your-project /var/www/your-project/public/home
    <Directory "/var/www/your-project/public/home">
        Options FollowSymLinks
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>

    # by ubuntu
    vi /etc/apache2/sites-available/default-ssl.conf
```

## 首次建立帳號
```sh
    vi  bin/user-create-account.php
    php bin/user-create-account.php
```
