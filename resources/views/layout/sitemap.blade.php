<?php print('<?xml version="1.0" encoding="utf-8"?>');?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach(config('settings.languages') as $lang => $name)
        <url>
            <loc>{{ route('web.home.' . $lang) }}</loc>
        </url>
    @endforeach
</urlset>
