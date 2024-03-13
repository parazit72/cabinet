{!! '<' . '?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>{{ config('app.url') }}</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/about-us</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/services/quality-assurance</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>
    <url>
        <loc>{{ config('app.url') }}/services/application-security</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/services/product-development</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/services/cloud-engineering</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/services/software-development</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/services/automation</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/services/blockchain</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/services/data-science</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/insights/case-studies/specready</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/insights/case-studies/playvox-test-automation</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/insights/case-studies/playvox-integration</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/insights/case-studies/do-epic</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/insights/case-studies/docusign</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/services/ecommerce</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/es</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/es/about-us</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/es/services/quality-assurance</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/es/services/application-security</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/es/services/product-development</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/es/services/cloud-engineering</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/es/services/software-development</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/es/services/automation</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/es/services/blockchain</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    <url>
        <loc>{{ config('app.url') }}/es/services/data-science</loc>
        <lastmod>2023-07-15T09:42:46+00:00</lastmod>
        <priority>0.2</priority>
    </url>

    @foreach ($tags as $tag)
        <url>
            <loc>{{ config('app.url') }}/blog/tag/{{ $tag->slug }}</loc>
            @if ($tag->updated_at)
                <lastmod>{{ date('c', strtotime($tag->updated_at)) }}</lastmod>
            @elseif($tag->created_at)
                <lastmod>{{ date('c', strtotime($tag->created_at)) }}</lastmod>
            @endif
            <priority>0.2</priority>
        </url>
    @endforeach
    @foreach ($collections as $collection)
        <url>
            <loc>{{ config('app.url') }}/blog/{{ $collection->slug }}</loc>
            @if ($collection->updated_at)
                <lastmod>{{ date('c', strtotime($collection->updated_at)) }}</lastmod>
            @elseif($collection->created_at)
                <lastmod>{{ date('c', strtotime($collection->created_at)) }}</lastmod>
            @endif
            <priority>0.2</priority>
        </url>
    @endforeach
    @foreach ($posts as $post)
        <url>
            <loc>{{ config('app.url') }}/blog/{{ $post->collection->slug }}/{{ $post->slug }}</loc>
            @if ($post->updated_at)
                <lastmod>{{ date('c', strtotime($post->updated_at)) }}</lastmod>
            @elseif($post->created_at)
                <lastmod>{{ date('c', strtotime($post->created_at)) }}</lastmod>
            @endif
            <priority>0.2</priority>
        </url>
    @endforeach
</urlset>
