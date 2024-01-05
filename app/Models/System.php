<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class System extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['methodology','platform','deployment'];

    public function project():BelongsTo
    {
        return $this->belongsTo(Project::class,'sysid');
    }
    public function businessUnit():BelongsTo
    {
        return $this->belongsTo(BusinessUnit::class,'bunitid');
    }

}
