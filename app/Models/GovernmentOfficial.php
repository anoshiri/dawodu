<?php

namespace App\Models;

use App\Enums\GovernmentOfficialType;
use App\Enums\NigerianState;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[Fillable(['salutation', 'first_name', 'last_name', 'other_names', 'suffix', 'tenure_start', 'tenure_end', 'email', 'phone', 'twitter', 'facebook', 'instagram', 'tiktok', 'linkedin', 'whatsapp', 'youtube', 'position', 'bio', 'xtype', 'state_id', 'constituency_id', 'political_party', 'url', 'user_id', 'sort', 'image', 'status'])]
class GovernmentOfficial extends BaseModel
{
    protected function casts(): array
    {
        return [
            'tenure_start' => 'date',
            'tenure_end' => 'date',
            'xtype' => GovernmentOfficialType::class,
            'state_id' => NigerianState::class,
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['salutation'].' '.$attributes['first_name'].' '.$attributes['last_name'].(($attributes['suffix']) ? ', '.$attributes['suffix'] : '')
        );
    }

    public function localUrl(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => '/government-official/'.Str::slug($attributes['first_name'].' '.$attributes['last_name']).'-'.$attributes['id']
        );
    }

    public function scopeIsHeadOfGovernment($query)
    {
        return $query->where('xtype', GovernmentOfficialType::HeadOfGovernment);
    }

    public function scopeIsGovernor($query)
    {
        return $query->where('xtype', GovernmentOfficialType::StateGovernor);
    }

    public function scopeIsRepresentative($query)
    {
        return $query->where('xtype', GovernmentOfficialType::FederalRepresentative);
    }

    public function scopeIsSenator($query)
    {
        return $query->where('xtype', GovernmentOfficialType::FederalSenator);
    }
}
