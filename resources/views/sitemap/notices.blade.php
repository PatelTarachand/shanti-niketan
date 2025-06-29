<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($notices as $notice)
    <url>
        <loc>{{ $notice['loc'] }}</loc>
        <lastmod>{{ $notice['lastmod'] }}</lastmod>
        <changefreq>{{ $notice['changefreq'] }}</changefreq>
        <priority>{{ $notice['priority'] }}</priority>
    </url>
@endforeach
</urlset>
