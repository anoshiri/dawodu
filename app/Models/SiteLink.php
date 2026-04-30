<?php

namespace App\Models;

use App\Enums\SiteLinkType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['title', 'short', 'url', 'blog', 'xtype', 'twitter', 'facebook', 'instagram', 'tiktok', 'linkedin', 'whatsapp', 'youtube', 'user_id', 'sort', 'tags', 'image', 'status'])]
class SiteLink extends BaseModel
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'xtype' => SiteLinkType::class,
            'status' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsPoliticalParty($query)
    {
        return $query->where('xtype', SiteLinkType::PoliticalParty);
    }

    public function scopeIsGovernmentSite($query)
    {
        return $query->where('xtype', SiteLinkType::GovernmentSite);
    }

    public function scopeIsPoliticianSite($query)
    {
        return $query->where('xtype', SiteLinkType::PoliticiansSite);
    }

    public function scopeIsGeneralLink($query)
    {
        return $query->where('xtype', SiteLinkType::GeneralLink);
    }
}
