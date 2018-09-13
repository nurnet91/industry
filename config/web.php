<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

require_once __DIR__ . '/functions.php';

$config = [
    'id' => 'basic',
    'name' => 'Industry',
    'language' => 'ru',
    'sourceLanguage' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'nlanguage', 'forum'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
//        'forum' => [
//            'class' => 'bizley\podium\Podium',
//            'userComponent' => 'users',
//        ],
        'forum' => [
            'class' => 'app\modules\bizley\podium\src\Podium',
            'userComponent' => 'users',
        ],
        'analytics' => [
            'class' => 'app\modules\analytics\Module',
        ],
    ],

    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ft0LTj7hNspNbBjJNqpq0NVlk4MMXuOe',
            'baseUrl' => '',
            'csrfParam' => '_frontendCSRF'
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'main/error',
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'main/index',
                'logout' => 'site/logout',
                'language/<lan:\w+>'    => 'site/language',
                'site/regions/<country_id:\d+>' => 'site/regions',
                'site/direction-author/<direction_id:\d+>' => 'site/direction-author',
                'site/cities/<country_id:\d+>' => 'site/cities',
                'site/reset/<token>' => 'site/reset',
                'site/confirm/<token>' => 'site/confirm',


                'personal/delete-message/<id:\d+>'  => 'personal/delete-message',

                'admin/login'   => 'admin/default/login',
                'admin/logout'  => 'admin/default/logout',

                // 'admin/messages/send/<id:\d+>'   => 'admin/messages/send',

                'admin/messages/text'           => 'admin/messages/text',
                'admin/messages/text/<id:\d+>'  => 'admin/messages/text',
                
                'admin/countries/regions'                   => 'admin/countries/regions',
                'admin/countries/regions/<country_id:\d+>'  => 'admin/countries/regions',

                'admin/countries/cities'                    => 'admin/countries/cities',
                'admin/countries/cities/<country_id:\d+>'   => 'admin/countries/cities',
                'admin/regions/<country_id:\d+>'        => 'admin/regions/index',
                'admin/regions/index/<country_id:\d+>'  => 'admin/regions/index',
                'admin/regions/create/<country_id:\d+>' => 'admin/regions/create',
                'admin/regions/view/<country_id:\d+>/<id:\d+>'  => 'admin/regions/view',
                'admin/regions/update/<country_id:\d+>/<id:\d+>'=> 'admin/regions/update',
                'admin/regions/delete/<country_id:\d+>/<id:\d+>'=> 'admin/regions/delete',

                'admin/cities/<country_id:\d+>'         => 'admin/cities/index',
                'admin/cities/index/<country_id:\d+>'   => 'admin/cities/index',
                'admin/cities/create/<country_id:\d+>'  => 'admin/cities/create',
                'admin/cities/view/<country_id:\d+>/<id:\d+>'   => 'admin/cities/view',
                'admin/cities/update/<country_id:\d+>/<id:\d+>' => 'admin/cities/update',
                'admin/cities/delete/<country_id:\d+>/<id:\d+>' => 'admin/cities/delete',
            ],
        ],

        'assetManager' => [
            'bundles' => ['yii\web\JqueryAsset' => ['js' => ['/js/vendor/jquery.js']]]
        ],

        'nlanguage' => ['class' => 'app\components\NLanguage'],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app'       => 'app.php',
                    ],
                ],
                'eauth' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@eauth/messages',
                ],
            ],
        ],
        'eauth' => [
            'class' => 'nodge\eauth\EAuth',
            'popup' => true, // Use the popup window instead of redirecting.
            'cache' => false, // Cache component name or false to disable cache. Defaults to 'cache' on production environments.
            'cacheExpire' => 0, // Cache lifetime. Defaults to 0 - means unlimited.
            'httpClient' => [
                // uncomment this to use streams in safe_mode
                //'useStreamsFallback' => true,
            ],
            'services' => [ // You can change the providers and their classes.
                'google' => [
                    // register your app here: https://code.google.com/apis/console/
                    'class' => 'app\components\GoogleOAuth',
                    'clientId' => '780567026481-gsh8obf9427q4vbtv6bo8irnvmlmt84m.apps.googleusercontent.com',
                    'clientSecret' => '-0TdxNb_9NRoQYCLPNt093QY',
                    'title' => 'Google',
//                    'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/user.birthday.read'
                ],
                'twitter' => [
                    // register your app here: https://dev.twitter.com/apps/new
                    'class' => 'app\components\TwitterOAuth',
                    'key' => 'cXrAEFqv1DeHKyf0BwUAj1XOK',
                    'secret' => 'nABkCX6MqMlNQ3IagzyEv92PvWJuhiAFCW1tKSJvkUFyABgneM',
                ],
                'yandex' => [
                    // register your app here: https://oauth.yandex.ru/client/my
                    'class' => 'nodge\eauth\services\YandexOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                    'title' => 'Yandex',
                ],
                'facebook' => [
                    // register your app here: https://developers.facebook.com/apps/
                    'class' => 'nodge\eauth\services\FacebookOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ],
                'yahoo' => [
                    'class' => 'nodge\eauth\services\YahooOpenIDService',
                    //'realm' => '*.example.org', // your domain, can be with wildcard to authenticate on subdomains.
                ],
                'linkedin' => [
                    // register your app here: https://www.linkedin.com/secure/developer
                    'class' => 'nodge\eauth\services\LinkedinOAuth1Service',
                    'key' => '...',
                    'secret' => '...',
                    'title' => 'LinkedIn (OAuth1)',
                ],
                'linkedin_oauth2' => [
                    // register your app here: https://www.linkedin.com/secure/developer
                    'class' => 'app\components\LinkedinOAuth',
                    'clientId' => '867eux15twqlmg',
                    'clientSecret' => '8sksY8FpDx39zfUJ',
                    'title' => 'LinkedIn (OAuth2)',
                ],
                'github' => [
                    // register your app here: https://github.com/settings/applications
                    'class' => 'nodge\eauth\services\GitHubOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ],
                'live' => [
                    // register your app here: https://account.live.com/developers/applications/index
                    'class' => 'nodge\eauth\services\LiveOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ],
                'steam' => [
                    'class' => 'nodge\eauth\services\SteamOpenIDService',
                    //'realm' => '*.example.org', // your domain, can be with wildcard to authenticate on subdomains.
                    'apiKey' => '...', // Optional. You can get it here: https://steamcommunity.com/dev/apikey
                ],
                'instagram' => [
                    // register your app here: https://instagram.com/developer/register/
                    'class' => 'nodge\eauth\services\InstagramOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ],
                'vkontakte' => [
                    // register your app here: https://vk.com/editapp?act=create&site=1
                    'class' => 'app\components\VKontakte',
                    'clientId' => '6492277',
                    'clientSecret' => 'dGv8zkCVjItISRE5jeVa',
                    'scope' => 'email',
                ],
                'mailru' => [
                    // register your app here: http://api.mail.ru/sites/my/add
                    'class' => 'app\components\MailRuOAuth',
                    'clientId' => '760403',
                    'clientSecret' => '644e3c93598cefe87fe2c64efe66c3d7',
                ],
                'odnoklassniki' => [
                    // register your app here: http://dev.odnoklassniki.ru/wiki/pages/viewpage.action?pageId=13992188
                    // ... or here: http://www.odnoklassniki.ru/dk?st.cmd=appsInfoMyDevList&st._aid=Apps_Info_MyDev
                    'class' => 'app\components\OdnoklassnikiOAuth',
                    'clientId' => '1267346944',
                    'clientSecret' => 'BCE18BBA8067FD90E1955787',
                    'clientPublic' => 'CBAPCLIMEBABABABA',
                    'title' => 'Odnoklassniki',
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
//     configuration adjustments for 'dev' environment
      $config['bootstrap'][] = 'debug';
      $config['modules']['debug'] = [
          'class' => 'yii\debug\Module',
//           uncomment the following to add your IP if you are not connecting from localhost.
          'allowedIPs' => ['127.0.0.1', '::1'],
      ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
