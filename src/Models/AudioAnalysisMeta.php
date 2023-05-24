<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class AudioAnalysisMeta extends AbstractModel
{
    public function __construct(
        public string $analyzer_version,
        public string $platform,
        public string $detailed_status,
        public int $status_code,
        public int $timestamp,
        public float $analysis_time,
        public string $input_process,
    ) {}
}