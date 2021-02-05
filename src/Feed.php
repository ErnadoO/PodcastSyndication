<?php

namespace Ernadoo\PodcastSyndication;

class Feed implements FeedInterface
{
    /** @var ChannelInterface[] */
    protected $channels = [];

    /**
     * Add channel
     * @param ChannelInterface $channel
     * @return $this
     */
    public function addChannel(ChannelInterface $channel)
    {
        $this->channels[] = $channel;

        return $this;
    }

    /**
     * Render XML
     * @return string
     */
    public function render()
    {
        $dom = new \DOMDocument('1.0', 'UTF-8');

        $rss = $dom->createElement("rss");
        $rss->setAttribute("version","2.0");
        $rss->setAttribute("xmlns:content","https://purl.org/rss/1.0/modules/content/");
        $rss->setAttribute("xmlns:itunes","https://www.itunes.com/dtds/podcast-1.0.dtd");
        $rss->setAttribute("xmlns:googleplay","https://www.google.com/schemas/play-podcasts/1.0");
        $rss->setAttribute("xmlns:spotify", "https://www.spotify.com/ns/rss");
        $rss->setAttribute("xmlns:dc","http://purl.org/dc/elements/1.1/");
        $rss->setAttribute("xmlns:sy","http://purl.org/rss/1.0/modules/syndication/");
        $rss->setAttribute("xmlns:atom","https://www.w3.org/2005/Atom");

        foreach ($this->channels as $channel) {
            $fromDom = dom_import_simplexml($channel->asXML());
            $rss->appendChild($dom->importNode($fromDom, true));
        }

        $dom->appendChild($rss);

        $dom->formatOutput = true;

        return $dom->saveXML();
    }

    /**
     * Render XML
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }
}
