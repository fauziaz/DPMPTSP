<?php

namespace App\Livewire\DokumenInformasi;

use Livewire\Component;
use App\Models\VideoModel;
class ShowVideo extends Component
{

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
        $videos = VideoModel::latest()->get();
        return view('livewire.dokumen-informasi.show-video', compact('videos'));
    }
}
