# Структура сервиса

Наши сервисы имеют несколько отличающуюся от стандартного Laravel файловую структуру.
Её цель - сделать сервисы более поддерживыемыми с течением времени и наращиванием функциональности.
На техническом уровне это во многом сводится к двум вещам:
- группировка классов по предметной области (домену), а не техническому свойству (контроллеры всего приложения в одной папке App\Http\Controllers) 
- классов больше, но они меньше и в итоге сильнее следуют [SRP](https://en.wikipedia.org/wiki/Single-responsibility_principle)

Дальше более детально описаны отличия структуры приложения относительно стандартной

## app/Domain

В этой директории находится доменный слой приложений, который разбит на несколько поддиректорий-доменов. Иногда такая поддиректория может быть одна.
Напримет, в CRM покупатели, их данные и предпочтения могут лежать в домене Customers, а всё что касается правил сегментации покупателей - в домене Segmentation
В ходе развития сервиса новые домены могут как появляться, так и исчезать. Если у вас в сервисе появилось слишком много доментов, то это сигнал что возможно он стал слишком большим и его надо разбивать на несколько более мелких.

### app/Domain/<Domain>

Внутри `app/Domain/<Domain>` уже находятся более стандартные технические поддиректории 
- `Models` -  Eloquent модели
- `Events` - эвенты
- `Observers` - [observers](https://laravel.com/docs/8.x/eloquent#observers)
- `Actions` - [обычные](https://stitcher.io/blog/laravel-beyond-crud-03-actions) или [queueable](https://github.com/spatie/laravel-queueable-action) экшены
- другие директории реализующие бизнес-логику и работу с БД.

Важная особенность этого слоя - он ничего не должен знать про источник откуда к нему приходят "команды" будь то запрос через REST API, консольная команда или какой-то другой транспорт.

## routes

Директория с роутами удалены, роуты лежат внутри директории `app/Http/Web` и `app/Http/ApiV{n`

## app/Http/Web

В этой директории лежат некоторые вспомогательные контроллеры и роуты общего назначения которые не являются частью REST API. Например хэлчеки и метрики.

## app/Http/ApiV{n}

Здесь располагается всё необходимое для реализации данной глобальной версии REST API 
- `Controllers`
- `Requests` - [Form Requests](https://laravel.com/docs/master/validation#form-request-validation)
- `Resources` - [Api Resources.](https://laravel.com/docs/master/eloquent-resources#introduction) Формат представления моделей для каждой версии API должен быть независимым
- `Queries` - Query Builders построенные на база пакета [spatie/laravel-query-builder](https://github.com/spatie/laravel-query-builder/)
- `Filters` - фильтры для Query Builders
- другие поддиректории

Если сервис планируется большой, то каждая версия API может быть разбита на модули (вместо `app/Http/ApiV1/Controllers` кладем контроллеры в `app/Http/ApiV1/Modules/Foo/Controllers` и т д), схожим с `app/Domain` принципом. Однако, это разбиение не обязано быть на 100% один к одному

Стоит отметить что все версии API должны быть полностью независимыми. Удаление `app/Http/ApiV1` не должно никак сказаться на функциональность `/api/v2` из `app/Http/ApiV2`

### app/Http/ApiV{n}/Support/

Вспомогательная директория в которой лежат разноплановые классы которые относятся сразу ко всем модулям данной версии API. Например BaseFormRequest
Подобные `Support` директории могут быть и на других уровнях структуры сервиса.





