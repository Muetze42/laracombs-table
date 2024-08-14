<?php

namespace LaraCombs\Table;

use Illuminate\Http\Request;
use Illuminate\Support\Traits\Macroable;
use JsonSerializable;
use LaraCombs\Table\Traits\HasComponentTrait;

abstract class AbstractElement implements JsonSerializable
{
    use HasComponentTrait;
    use Macroable;

    /**
     * The LaraCombs Table Element Type.
     */
    protected string $type = 'Element';

    /**
     * The shared data for this Element.
     */
    protected array $sharedData = [];

    /**
     * Specify data that should be serialized to JSON for the colum.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $request = app(Request::class);

        return [
            'component' => $this->component($request),
            'sharedData' => $this->sharedData,
        ];
    }
}
