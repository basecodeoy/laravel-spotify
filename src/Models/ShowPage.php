<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class ShowPage extends AbstractLengthAwarePage
{
    #[DataCollectionOf(Show::class)]
    public DataCollection $items;
}
