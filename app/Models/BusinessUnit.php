<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessUnit extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'bunits';
    protected $primaryKey = 'bunitid';

    protected $fillable = [
        'userid','name','request','description',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'userid');
    }

    public function project(): HasMany
    {
        return $this->hasMany(Project::class, 'bunitid');
    }
    public function system(): HasMany
    {
        return $this->hasMany(System::class, 'bunitid');
    }
}
