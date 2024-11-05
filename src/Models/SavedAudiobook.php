<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class SavedAudiobook extends Data
{
    public string $added_at;

    public Audiobook $audiobook;
}
