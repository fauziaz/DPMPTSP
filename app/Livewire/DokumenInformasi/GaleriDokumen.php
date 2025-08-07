<?php

namespace App\Livewire\DokumenInformasi;

use Livewire\Component;
use App\Models\VideoModel;
use App\Models\GaleriModel;

class GaleriDokumen extends Component
{
    public $take = 8;

    public function loadMore()
    {
        $this->take += 8;
    }

    public function getThumbnail($video)
    {
        if ($video->thumbnail) {
            return asset('storage/' . $video->thumbnail);
        }

        if ($video->videoUrl && str_contains($video->videoUrl, 'youtube')) {
            preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([^\&\?\/]+)/', $video->videoUrl, $matches);
            $youtubeId = $matches[1] ?? null;

            if ($youtubeId) {
                return "https://img.youtube.com/vi/$youtubeId/hqdefault.jpg";
            }
        }

        return asset('img/thumbnail-video.jpg');
    }

    public function render()
    {
        $galeris = GaleriModel::latest()->take($this->take)->get();
        $videos = VideoModel::latest()->take($this->take)->get();

        return view('livewire.dokumen-informasi.galeri', [
            'galeris' => $galeris,
            'videos' => $videos,
            'take' => $this->take,
        ]);
    }

    // }
    // public $limit = 8;

    // public function render()
    // {
    //     $galeris = GaleriModel::latest()->take($this->take)->get();
    //     $videos = VideoModel::latest()->take($this->take)->get();

    //     return view('livewire.dokumen-informasi.galeri', compact('galeris', 'videos'));
    // }
}