<?php

namespace App\Events;

use App\Models\Song;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SongCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $song;

    public function __construct(Song $song)
    {
        Log::info('SongCreated Event Fired', [
            'song_id' => $song->id,
            'title' => $song->title
        ]);
        
        $this->song = $song;
    }

    public function broadcastOn()
    {
        return new Channel('admin-song-channel');
    }

    public function broadcastAs()
    {
        return 'song.created';
    }
}
