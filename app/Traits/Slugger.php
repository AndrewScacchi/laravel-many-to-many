<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait Slugger
{
    // non si può sovrascrivere perchè nei trait si possono sovrascrivere solo i metodi
    // static protected $slugColumnName = 'slug';

    static public function getSlug($strOrigin) {
        $slugOrigin = Str::slug($strOrigin) . '';
        $slug = $slugOrigin;

        $i = 1;
        while (self::where(self::slugColumnName(), $slug)->first()) {
            $slug = $slugOrigin . '-' . $i;
            $i++;
        }

        return $slug;
    }

    private static function slugColumnName() {
        return 'slug';
    }
}
