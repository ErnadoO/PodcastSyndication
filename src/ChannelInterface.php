<?php

namespace Ernadoo\PodcastSyndication;

interface ChannelInterface
{

    /**
     * Set channel title
     * @param string $title
     * @return $this
     */
    public function title($title);

    /**
     * Set channel URL
     * @param string $url
     * @return $this
     */
    public function url($url);

    /**
     * Set atom:link with rel="self"
     * @param string $atomLinkSelf
     * @return $this
     */
    public function atomLinkSelf($atomLinkSelf);

    /**
     * Set channel description
     * @param string $description
     * @return $this
     */
    public function description($description);

    /**
     * Set ISO639 language code
     *
     * The language the channel is written in. This allows aggregators to group all
     * Italian language sites, for example, on a single page. A list of allowable
     * values for this element, as provided by Netscape, is here. You may also use
     * values defined by the W3C.
     *
     * @param string $language
     * @return $this
     */
    public function language($language);

    /**
     * Set channel copyright
     * @param string $copyright
     * @return $this
     */
    public function copyright($copyright);

    /**
     * Set channel published date
     * @param int $pubDate Unix timestamp
     * @return $this
     */
    public function pubDate($pubDate);

    /**
     * Set channel last build date
     * @param int $lastBuildDate Unix timestamp
     * @return $this
     */
    public function lastBuildDate($lastBuildDate);

    /**
     * Set channel ttl (minutes)
     * @param int $ttl
     * @return $this
     */
    public function ttl($ttl);

    /**
     * Set channel categories
     * @param int $categories
     * @return $this
     */
    public function categories($categories);

    /**
     * Set channel parental advisory information
     * @param bool $explicit
     * @return $this
     */
    public function explicit($explicit);

    /**
     * Set channel Keywords
     * @param array $keywords
     * @return $this
     */
    public function keywords($keywords);

    /**
     * Add item object
     * @param ItemInterface $item
     * @return $this
     */
    public function addItem(ItemInterface $item);

    /**
     * @param $updatePeriod
     * @return $this
     */
    public function updatePeriod($updatePeriod);

    /**
     * @param $updateFrequency
     * @return $this
     */
    public function updateFrequency($updateFrequency);

    /**
     * Append to feed
     * @param FeedInterface $feed
     * @return $this
     */
    public function appendTo(FeedInterface $feed);

    /**
     * Return XML object
     * @return SimpleXMLElement
     */
    public function asXML();
}
