# tagCanonical

Управление каноническими ссылками в MODx Revolution.

Дополнение направлено на работу с GET-параметрами, работает по принципу «запрещено всё то, что прямо не разрешено» и результатом его работы является тег `<link rel="canonical" href="ссылка" />`. Список разрешенных GET-параметров можно указать как для сниппета в шаблоне (к примеру для страниц пагинации или результатов фильтров), так и для каждой страницы в отдельности через дополнительное поле "TV" (к примеру страницы тегов блога и т.п.).

## Системные настройки

- **tagcanonical_tv** - ID дополнительного поля (TV), в котором указывается список разрешенных GET-параметров для страницы, которые будут отображаться в канонической ссылке
 
## Параметры сниппета tagCanonical

- **delimiter** - разделитель для передаваемых GET-параметров
- **get** - список разрешенных GET-параметров, которые будут отображаться в канонической ссылке
- **removeParameters** - отмечается при необходимости удалить все GET-параметры из канонической ссылки

## Примеры

#### Пример 1

Ссылка: `https://ваш_сайт.домен/catalog/?page=4`  
Сниппет: -  
TV: -  
Каноническая ссылка: `<link rel="canonical" href="https://ваш_сайт.домен/catalog/" />`

#### Пример 2

Ссылка: `https://ваш_сайт.домен/catalog/?page=4&min_price=500&max_price=5000`  
Сниппет: get => `page`;  
TV: -  
Каноническая ссылка: `<link rel="canonical" href="https://ваш_сайт.домен/catalog/?page=4" />`

#### Пример 3

Ссылка: `https://ваш_сайт.домен/catalog/?page=4&min_price=500&max_price=5000&brand=Samsung`  
Сниппет: get => `page,brand`;  
TV: -  
Каноническая ссылка: `<link rel="canonical" href="https://ваш_сайт.домен/catalog/?brand=Samsung&page=4" />`

#### Пример 4

Ссылка: `https://ваш_сайт.домен/catalog/?page=4&min_price=500&max_price=5000&brand=Samsung&color=red`  
Сниппет: get => `page,brand`;   
TV: `color,page`  
Каноническая ссылка: `<link rel="canonical" href="https://ваш_сайт.домен/catalog/?brand=Samsung&color=red&page=4" />`

#### Пример 5

Ссылка: `https://ваш_сайт.домен/catalog/?page=4&min_price=500&max_price=5000&brand=Samsung&color=red`  
Сниппет: get => `page,brand`; removeParameters => `1`;   
TV: `color,page`  
Каноническая ссылка: `<link rel="canonical" href="https://ваш_сайт.домен/catalog/" />`

#### Пример 6

Ссылка: `https://ваш_сайт.домен/catalog/?page=4&min_price=500&max_price=5000&brand=Samsung&color=red`  
Сниппет: get => `page|brand`; delimiter => `|`;   
TV: -  
Каноническая ссылка: `<link rel="canonical" href="https://ваш_сайт.домен/catalog/?brand=Samsung&page=4" />`