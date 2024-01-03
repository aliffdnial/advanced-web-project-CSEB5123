<?php

namespace App\Models;

use App\Models\BusinessUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'projects';
    protected $primaryKey = 'proid';
    protected $fillable = ['userid','bunitid','start_date','end_date','status','leaddev'];

    public function businessUnit():BelongsTo
    {
        return $this->belongsTo(BusinessUnit::class,'bunitid');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'userid');
    }
}