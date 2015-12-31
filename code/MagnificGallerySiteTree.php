<?php

/**
 * @see SiteTree
 */
class MagnificGallerySiteTree extends SiteTreeExtension
{

    public function getGalleryFor($urlSegment = null)
    {
        $galleries = MagnificGalleryPage::get();
        if (!empty($urlSegment)) {
            $galleries = $galleries->filter(array('URLSegment' => $urlSegment));
        }
        return $galleries->first();
    }

    public function RecentImages($count = 5, $urlSegment = null)
    {
        $gallery = $this->getGalleryFor($urlSegment);
        if ($gallery) {
            return $gallery->GalleryItems()->sort('"Created" DESC')->limit($count);
        }
        return false;
    }
}
