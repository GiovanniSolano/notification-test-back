<?php

namespace App\Models;

use App\Traits\CommonRelationshipsTrait;
use App\Traits\ManageFormatDateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory, ManageFormatDateTrait, CommonRelationshipsTrait;

    protected $guarded = ['id'];

    protected $fillable = [
        "name"
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_categories', 'category_id', 'user_id');
    }


}
