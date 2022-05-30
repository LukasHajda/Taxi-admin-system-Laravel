<p align="center">
<img src="https://www.demi.sk/email/logo.svg" width="300">
</p>

## Demi Box - Úvod

Pripravená "krabica" postavená na frameworku Laravel v 7.X, určená na vývoj menších a stredne veľkých webov a e-shopov.
Administračné rozhranie je postavené na šablóne Lexa v 1.3.0

Obsahuje predpripravené veci:
- základ administračného rozhrania
- autentifikáciu
- [Rollbar](https://rollbar.netlify.app) - error monitoring software
- AdminController, BaseModel
- základný setup pre public storage
- predpripravené viacjazyčné routes

## Demi Box - Multilanguage

Obsahuje pripravené multilanguage routes. Takisto obsahuje predpripravený LanguageMiddleware, ktorý prepína jazyk aplikácie
podľa prefixu v URL adrese.

Ako spojazdniť viacjazyčný web:
- je potrebné odkomentovať LanguageMiddleware v app/Http/Kernel.php
- je potrebné spraviť prepínanie jazykov v menu

Ako pridať jazykovú mutáciu:
- pridať kód jazyka do nastavení v config/settings.php
- vytvoriť migrácie pre všetky stĺpce vo všetkých tabuľkách s prekladom - použiť prefix mutácie (napr.: name_sk)

## Demi Box - Obrázky

Máme tu predpripravený skript na spracovanie obrázku do normálneho prevedenia a do thumb-u.

Čo potrebujete vedieť:
- skript pre upload sa nachádza v app/Traits/UploadTrait
- na použitie jeho metód stačí v controlleri použiť kód: use UploadTrait;
- nastavenia obrázkov je takisto potrebné nastaviť v config/images.php
- je predpripravený ImagesController v Admine na mazanie obrázkov stačí použiť route('images.delete', $image->id);

## Demi Box - Rozšírenia

Doplnené o mnohé rozšírenia:
- textový editor TinyMCE - stačí na textarea dať class .tinymce
- class .select2 zmení obyčajný selectbox na select s vyhľadávaním
- class .price-input mení hodnotu , (čiarka) na . (bodka)
- ďalšie rozšírenia, na input formuláru môžete nájsť resources/assets/templates/admin/js/advanced.js
- delete modal - potvrdzovacie modálne okno pri mazaní akéhokoľvek záznamu
- pre aktiváciu Rollbaru je potrebné pridať ID do .env premenných (pýtať od projektového managera)

## Demi Box - Autentifikácia

Pripravená kompletná autentifikácia aj s custom views pre login, register, verify, forgot a confirm.

Ako konfigurovať autentifikáciu:
- v routes/web.php stačí keď nastavíte hodnotu true/false na routes kt. bude aplikácia používať
- overte si funkčnosť všetkých zapnutých krokov autentifiácie
- pri zapnutej registrácii je potrebné spojazdniť Google Recaptcha 3 (predpripravené - treba si pýtať ID)
- pri zapnutí verify je potrebné na routoch použiť middleware "verified"

## Demi Box - Ostatné

- treba zmeniť resources/views/errors/*.blade.php podľa šablóny konkrétneho webu
