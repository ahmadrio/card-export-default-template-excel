# card-export-default-template-excel

Instal:
```php
composer require opanegro/card-export-default-template-excel
```

Usage:
1. Add Variable in your resource nova. example: `app/Nova/Users.php`
```php
public static $exportLabelHeaders = ['ID', 'Name', 'Email'];
```

2. Add Card in resource function
```php
public function cards()
{
    return [
        new CardExportDefaultTemplateExcel(Users::class),
    ];
}
```
