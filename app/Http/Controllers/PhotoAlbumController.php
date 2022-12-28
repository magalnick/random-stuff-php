<?php

namespace App\Http\Controllers;

use App\Http\Response;
use App\Models\LeanTechniquesPhotoAlbumModel as PhotoAlbumModel;
use Illuminate\Http\Response as BaseResponse;
use Exception;

class PhotoAlbumController extends Controller
{

    /**
     * @param $album_id
     * @return BaseResponse
     */
    public function getAlbum($album_id): BaseResponse
    {
        try {
            $album = PhotoAlbumModel::factory()->getAlbum(
                trim($album_id)
            );

            if (empty($album)) {
                throw new Exception("No album found for album ID: $album_id", 404);
            }

            return Response::success($album);
        } catch (Exception $e) {
            return Response::error($e->getMessage(), $e->getCode());
        }
    }
}
