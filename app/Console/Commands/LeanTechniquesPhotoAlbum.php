<?php

namespace App\Console\Commands;

use App\Models\LeanTechniquesPhotoAlbumModel as PhotoAlbumModel;
use Exception;
use Illuminate\Console\Command;

class LeanTechniquesPhotoAlbum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cli:lean-techniques-photo-album {album_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lean TECHniques Photo Album: Display the list of photos for the specified album ID';

    protected string $album_id;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {
            $this->album_id = $this->argument('album_id') ?? '';
            $this->album_id = trim($this->album_id);
            $album = PhotoAlbumModel::factory()->getAlbum($this->album_id);

            if (empty($album)) {
                throw new Exception("No album found for album ID: $this->album_id", 404);
            }

            echo join(
                    "\n",
                    array_map(
                        function ($photo) {
                            return "[{$photo['id']}] {$photo['title']}";
                        },
                        $album
                    )
                ) . PHP_EOL;

            return 0;
        } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
            return $e->getCode();
        }
    }
}
