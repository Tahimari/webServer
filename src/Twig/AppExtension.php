<?php

namespace App\Twig;

use App\Entity\Tag;
use Doctrine\ORM\PersistentCollection;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            new TwigFilter('sortByCreatedAt', array($this, 'sortByCreatedAt')),
        );
    }

    public function sortByCreatedAt($objects, $direction = 'asc')
    {
        $objects = $objects->toArray();
        usort($objects, function ($a, $b) use($direction) {
            if ($direction === 'asc') {
                return $a->getCreatedAt() >  $b->getCreatedAt();
            } elseif ($direction === 'desc') {
                return $a->getCreatedAt() <  $b->getCreatedAt();
            } else {
                throw new \Exception('unknown sort direction');
            }

        });
        return $objects;
    }
}