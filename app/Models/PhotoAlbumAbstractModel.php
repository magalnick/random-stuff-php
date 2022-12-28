<?php

namespace App\Models;

use App\Models\Interfaces\PhotoAlbumModelInterface;
use Exception;

abstract class PhotoAlbumAbstractModel implements PhotoAlbumModelInterface
{
    /**
     * @return PhotoAlbumModelInterface
     */
    public static function factory(): PhotoAlbumModelInterface
    {
        $class = get_called_class();
        return new $class();
    }

    /**
     * @param mixed $album_id
     * @return int
     */
    public function scrubAlbumId($album_id): int
    {
        if (!is_numeric($album_id)) {
            throw new Exception('Album ID must be an integer', 400);
        }

        $album_id = (int) $album_id;
        if ($album_id < 1) {
            throw new Exception('Album ID must be a positive integer', 400);
        }

        return $album_id;
    }
}
