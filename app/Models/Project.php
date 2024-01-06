<?php

namespace App\Models;

use App\Models\BusinessUnit;
use PHPUnit\Event\Telemetry\System;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'projects';
    protected $primaryKey = 'proid';
    protected $fillable = ['bunitid','start_date','end_date','projectstatus', 'duration'];

    public function businessUnit():BelongsTo
    {
        return $this->belongsTo(BusinessUnit::class,'bunitid');
    }

    // public function user():BelongsTo
    // {
    //     return $this->belongsTo(User::class,'userid');
    // }

    // public function system():BelongsTo
    // {
    //     return $this->belongsTo(System::class,'sysid');
    // }

    public function leadDeveloper():BelongsTo
    {
        return $this->belongsTo(User::class, 'lead_developer_id');
    }

    public function developers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_user', 'pro_id', 'user_id')->withPivot('is_lead')->withTimestamps();
    }
}