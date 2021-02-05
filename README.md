# \ernadoo\podcastSyndication

`\ernadoo\podcastSyndication` is Podcasts feed generator library for PHP 5.5 or later.

## Installation

You can install via Composer.

Add in your `composer.json` file:

```shell
$ composer req ernadoo/podcasts-syndication main-master
```

## RSS Feed Implementation:

```php
<?php
$feed = new Feed();

$channel = new Channel();
$channel
	->title("Programming")
	->description("Programming with php")
	->explicit(true)
	->categories(['Automobile', 'Arts' => ['Books', 'Fashion & Beauty']])
	->url('https://www.edisound.com')
	->image('URL OF AN IMAGE FOR THE CHANNEL', 'TITLE', 'LINK')
	->appendTo($feed);

// RSS item
$item = new Item();
$item
	->title("CACHING DATA IN SYMFONY2")
	->description("It is not too easy to enhance the performance of your application. In Symfony2 you could get benefit from caching.")
	->url('http://bhaktaraz.com.np/?p=194')
	->season(1)
	->episode(3)
	->duration(593)
	->enclosure('URL OF THE PODCAST MEDIA FILE', 4889, 'audio/mpeg')
	->appendTo($channel);

echo $feed;
```

Output:

```xml
<?xml version="1.0"?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
    <title>Programming</title>
    <link>https://www.edisound.com</link>
    <description>Programming with php</description>
    <image>
        <url>URL OF AN IMAGE FOR THE CHANNEL</url>
        <title>TITLE</title>
        <link>LINK</link>
    </image>
    <itunes:category text="Automobile"/>
    <itunes:category text="Arts">
        <itunes:category text="Books"/>
        <itunes:category text="Fashion &amp; Beauty"/>
    </itunes:category>
    <itunes:explicit>false</itunes:explicit>
    <itunes:image href="URL OF AN IMAGE FOR THE CHANNEL" />
    <itunes:season>1</itunes:season>
    <itunes:episode>3</itunes:episode>
    <itunes:duration>593</itunes:duration>
    <item>
      <title>CACHING DATA IN SYMFONY2</title>
      <link>http://bhaktaraz.com.np/?p=194</link>
      <description>It is not too easy to enhance the performance of your application. In Symfony2 you could get benefit from caching.</description>
      <enclosure url="URL OF THE PODCAST MEDIA FILE" type="audio/mpeg" length="4889"/>
    </item>
</channel>
</rss>
```