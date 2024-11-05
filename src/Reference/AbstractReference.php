<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Reference;

use Illuminate\Support\Traits\ForwardsCalls;

/**
 * @method static void withToken(string $token)
 */
abstract readonly class AbstractReference
{
    use ForwardsCalls;

    public function __construct(protected Client $client)
    {
        //
    }

    public function __call(string $name, array $arguments): mixed
    {
        return $this->forwardCallTo($this->client, $name, $arguments);
    }

    protected function concat(array $items): string
    {
        return \implode(',', $items);
    }

    protected function combine(array $keys, array $values): array
    {
        return \array_combine($keys, $values);
    }
}
