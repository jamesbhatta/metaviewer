<?php

namespace App\Services;

use Embed\Embed;

class MetaServiceProvider
{
    protected $meta;

    public function getMetas($url)
    {
        $embed = new Embed();
        //Load url
        $this->meta = $embed->get($url);

        // Title
        $data['title'] = $this->getTitle();

        // Description (max 88 chars)
        $data['description'] = $this->getDescription();

        // provider url
        $data['provider_url'] = $this->getProviderUrl();

        // Canonical url
        $data['canonical_url'] = $this->getCanonicalUrl();

        // Image
        $data['image'] = $this->getImage();

        // Keywords
        $data['keywords'] = $this->getKeywords();

        return $data;
    }

    public function getTitle()
    {
        return $this->meta->title;
    }

    public function getDescription()
    {
        return $this->meta->description;
    }

    public function getProviderUrl()
    {
        return (string)$this->meta->providerUrl;
    }

    public function getCanonicalUrl()
    {
        return (string)$this->meta->url;
    }

    public function getImage()
    {
        // if ($this->meta->image) {
        //     return (string)$this->meta->image;
        // }
        // if ($this->meta->icon) {
        //     $data['image'] = (string)$this->meta->icon;
        // }
        // if ($this->meta->favicon) {
        //     $data['image'] = (string)$this->meta->favicon;
        // }

        return (string)$this->meta->image
            ?: (string)$this->meta->icon
            ?: (string)$this->meta->favicon;
    }

    public function getKeywords()
    {
        if ($this->meta->keywords) {
            return $data['keywords'] = json_encode($this->meta->keywords);
        }
        return null;
    }
}
