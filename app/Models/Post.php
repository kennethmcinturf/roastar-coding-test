<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $appends = ['updated_at_human_readable', 'created_at_human_readable'];

    public function getUpdatedAtHumanReadableAttribute() {
        return Carbon::parse($this->updated_at)->format('F d, Y');
    }

    public function getCreatedAtHumanReadableAttribute() {
        return Carbon::parse($this->created_at)->format('F d, Y');
    }
}
