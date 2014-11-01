Yii2 Translation Manager
=================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist krok/yii2-translation "*"
```

or add

```
"krok/yii2-translation": "*"
```

to the require section of your `composer.json` file.

Configure
-----------------

Add to config file (config/web.php or common\config\main.php)

```
'bootstrap' => [
    'translation',
],
```

```
'modules' => [
    'class' => 'krok\translation\Translation',
],
```

register for Cp modules ( @vendor\krok\cp\Cp.php )

```
public function registerModules()
{
    $this->modules = [
        'translation' => [
            'class' => 'krok\translation\Manage',
        ],
    ];
}
```

```
'components' => [
    'i18n' => [
        'translations' => [
            'db' => [
                'sourceLanguage' => 'ru-RU',
                'class' => 'yii\i18n\DbMessageSource',
                'messageTable' => '{{%i18n_message}}',
                'sourceMessageTable' => '{{%i18n_source}}',
                'enableCaching' => YII_DEBUG ? false : true,
                'on missingTranslation' => [
                    'krok\translation\components\TranslationEventHandler', 'handleMissingTranslation'
                ],
            ],
            'yii' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en-US',
                'basePath' => '@app/messages',
            ],
        ],
    ],
]
```