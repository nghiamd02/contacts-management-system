<?php

namespace App\Models;

use App\Models\Scopes\FilterScope;
use App\Models\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id'];

    public function company(): belongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeLatestFirst(Builder $query): void{
         $query->orderBy('id', 'desc');
    }

    protected static function booted(): void{
        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new SearchScope);
    }
    
}