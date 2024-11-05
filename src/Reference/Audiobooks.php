<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Reference;

use BaseCodeOy\Spotify\Models\Audiobook;
use BaseCodeOy\Spotify\Models\ChapterPage;
use BaseCodeOy\Spotify\Models\SavedAudiobookPage;
use Spatie\LaravelData\DataCollection;

final readonly class Audiobooks extends AbstractReference
{
    public function findById(string $id, array $context = []): Audiobook
    {
        return Audiobook::from($this->get("audiobooks/{$id}", $context)->json());
    }

    /**
     * @return DataCollection<Audiobook>
     */
    public function findByIds(array $ids, array $context = []): DataCollection
    {
        return Audiobook::collection(
            $this->get('audiobooks', [
                ...$context,
                'ids' => $this->concat($ids),
            ])->json('audiobooks'),
        );
    }

    public function chapters(string $id, array $context = []): ChapterPage
    {
        return ChapterPage::from($this->get("audiobooks/{$id}/chapters", $context)->json());
    }

    public function savedByCurrentUser(array $context = []): SavedAudiobookPage
    {
        return SavedAudiobookPage::from($this->get('me/audiobooks', $context)->json());
    }

    public function saveToCurrentUser(array $ids): bool
    {
        return $this->put('me/audiobooks', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function deleteFromCurrentUser(array $ids): bool
    {
        return $this->delete('me/audiobooks', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->combine(
            $ids,
            $this->get('me/audiobooks/contains', [
                'ids' => $this->concat($ids),
            ])->json(),
        );
    }
}
