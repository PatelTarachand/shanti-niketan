<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($faculty as $member)
    <url>
        <loc>{{ $member['loc'] }}</loc>
        <lastmod>{{ $member['lastmod'] }}</lastmod>
        <changefreq>{{ $member['changefreq'] }}</changefreq>
        <priority>{{ $member['priority'] }}</priority>
    </url>
@endforeach
</urlset>
