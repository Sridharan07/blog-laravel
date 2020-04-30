<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
  <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
      <loc>{{ url('sitemap/posts') }}</loc>
      <lastmod>{{ $post->created_at->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
      <loc>{{ url('sitemap/categories') }}</loc>
      <lastmod>{{ $post->created_at->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
      <loc>{{ url('contact/us') }}</loc>
      <lastmod></lastmod>
    </sitemap>
     <sitemap>
      <loc>{{ url('about/us') }}</loc>
      <lastmod></lastmod>
    </sitemap>
  </sitemapindex>