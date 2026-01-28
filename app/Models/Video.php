<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'video';
    protected $fillable = [
        'produk_id',
        'judul_video',
        'deskripsi_video',
        'link_youtube',
        'thumbnail_url',
        'durasi_menit',
    ];

    /**
     * Get the produk that owns the Video
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    /**
     * Extract YouTube Video ID from URL
     */
    public function getYoutubeIdAttribute()
    {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.*/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?\s]{11})%i', $this->link_youtube, $match)) {
            return $match[1];
        }
        return null;
    }

    /**
     * Get embedded YouTube URL
     */
    public function getEmbedUrlAttribute()
    {
        $youtubeId = $this->youtube_id;
        if ($youtubeId) {
            return "https://www.youtube.com/embed/{$youtubeId}";
        }
        return null;
    }
}
