<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[Fillable(['subject', 'venue', 'start_date', 'start_time', 'end_date', 'end_time', 'contact_person', 'email', 'phone', 'address', 'locality', 'city', 'code', 'state', 'country', 'twitter', 'facebook', 'instagram', 'tiktok', 'linkedin', 'whatsapp', 'blog', 'user_id', 'sort', 'tags', 'image', 'documents', 'status'])]
class Event extends BaseModel
{
    protected $appends = ['start_date_time', 'end_date_time', 'start_and_end', 'url', 'doc_url'];

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'start_date' => 'date',
            'end_date' => 'date',
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function startDateTime(): Attribute
    {
        return Attribute::make(
            get: fn () => makeDateTime($this->start_date.' '.$this->start_time),
        );
    }

    public function endDateTime(): Attribute
    {
        return Attribute::make(
            get: fn () => makeDateTime($this->end_date.' '.$this->end_time),
        );
    }

    protected function startAndEnd(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->formatStartAndEnd(),
        );
    }

    public function formatStartAndEnd()
    {
        if ($this->start_date == $this->end_date) {
            return makeDateTime($this->start_date.' '.$this->start_time).' - '.makeTime($this->end_time);
        }

        return makeDateTime($this->start_date.' '.$this->start_time).' - '.makeDateTime($this->end_date.' '.$this->end_time);
    }

    /**
     * Assessor for url
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => '/events/'.Str::slug($attributes['subject'].' '.$attributes['id']),
        );
    }

    /**
     * Assessor for doc_url
     */
    protected function docUrl(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Str::replace('public/', '/storage/', $attributes['documents']),
        );
    }
}
