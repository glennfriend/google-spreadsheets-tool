<?php

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    const VERSIONS = array (
  'asimlqt/php-google-spreadsheet-client' => '2.3.5@9cb74ee0670e3928d6b40dd53164c3f09c65e309',
  'container-interop/container-interop' => '1.1.0@fc08354828f8fd3245f77a66b9e23a6bca48297e',
  'doctrine/annotations' => 'v1.2.7@f25c8aab83e0c3e976fd7d19875f198ccf2f7535',
  'doctrine/cache' => 'v1.6.0@f8af318d14bdb0eff0336795b428b547bd39ccb6',
  'doctrine/collections' => 'v1.3.0@6c1e4eef75f310ea1b3e30945e9f06e652128b8a',
  'doctrine/common' => 'v2.6.1@a579557bc689580c19fee4e27487a67fe60defc0',
  'doctrine/dbal' => 'v2.5.4@abbdfd1cff43a7b99d027af3be709bc8fc7d4769',
  'doctrine/inflector' => 'v1.1.0@90b2128806bfde671b6952ab8bea493942c1fdae',
  'doctrine/lexer' => 'v1.0.1@83893c552fd2045dd78aef794c31e694c37c0b8c',
  'doctrine/migrations' => '1.4.1@0d0ff5da10c5d30846da32060bd9e357abf70a05',
  'filp/whoops' => '2.1.3@8828aaa2178e0a19325522e2a45282ff0a14649b',
  'google/apiclient' => 'v1.1.8@85309a3520bb5f53368d43e35fd24f43c9556323',
  'nette/mail' => 'v2.2.5@515cd63fdd7786d7008418d8a6c3e0c610f5b5f5',
  'nette/utils' => 'v2.4.0@c455ade9f24a1f99aa81772516764045296b8ca0',
  'nikic/fast-route' => 'v1.0.1@8ea928195fa9b907f0d6e48312d323c1a13cc2af',
  'ocramius/package-versions' => '1.1.1@4b2bfc8128db95b533303942b0d5b332bffa07c6',
  'ocramius/proxy-manager' => '2.0.3@51c7fdd99dba53808aaab21b34f7a55b302c160c',
  'pimple/pimple' => 'v3.0.2@a30f7d6e57565a2e1a316e1baf2a483f788b258a',
  'psr/http-message' => '1.0.1@f6561bf28d520154e4b0ec72be95418abe6d9363',
  'pwfisher/command-line-php' => 'dev-master@ce756a94efa3544b56d03a02d3634a8d969ee962',
  'slim/slim' => '3.5.0@184352bc1913d7ba552ab4131d62f4730ddb0893',
  'symfony/console' => 'v3.0.9@926061e74229e935d3c5b4e9ba87237316c6693f',
  'symfony/dependency-injection' => 'v3.1.3@6abd4952d07042d11bbb8122f3b57469691acdb5',
  'symfony/polyfill-mbstring' => 'v1.2.0@dff51f72b0706335131b00a7f49606168c582594',
  'symfony/yaml' => 'v3.1.3@1819adf2066880c7967df7180f4f662b6f0567ac',
  'zendframework/zend-code' => '3.0.4@c5272131d3acb0f470a2462ed088fca3b6ba61c2',
  'zendframework/zend-db' => '2.8.1@c9fa8fdab194093fff58e4f1180c7e15d80a2cb5',
  'zendframework/zend-eventmanager' => '3.0.1@5c80bdee0e952be112dcec0968bad770082c3a6e',
  'zendframework/zend-stdlib' => '3.0.1@8bafa58574204bdff03c275d1d618aaa601588ae',
  '__root__' => '9999999-dev@276c6a24bf0c3fa4c74d036ee3c7c0a22d451000',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException if a version cannot be located
     */
    public static function getVersion(string $packageName) : string
    {
        if (! isset(self::VERSIONS[$packageName])) {
            throw new \OutOfBoundsException(
                'Required package "' . $packageName . '" is not installed: cannot detect its version'
            );
        }

        return self::VERSIONS[$packageName];
    }
}
