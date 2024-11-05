<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class PlaylistTracks extends Data
{
    public string $href;

    public int $total;
}
