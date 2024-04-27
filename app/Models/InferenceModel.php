<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InferenceModel extends Model
{
    
    use HasFactory;
    use HasUuids;

    protected $table = 'inference';
    protected $keyType = 'string';
    
    protected $guarded = [ 'id' ];


}
