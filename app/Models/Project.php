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

    protected $fillable = ['userid','busid','start_date','end_date','status','leaddev'];

    public function businessunit():BelongsTo
    {
        return $this->belongsTo(BusinessUnit::class,'id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'id');
    }
}
