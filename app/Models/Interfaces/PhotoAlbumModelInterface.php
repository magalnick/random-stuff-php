<?php

namespace App\Models\Interfaces;

interface PhotoAlbumModelInterface
{
    public static function factory(): PhotoAlbumModelInterface;
    public function scrubAlbumId($album_id): int;
    public function getAlbum(int $album_id): array;
}
