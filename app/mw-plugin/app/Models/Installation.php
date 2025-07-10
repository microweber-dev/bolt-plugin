<?php

namespace App\Models;

use App\Models\Domain;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    use HasFactory;

//    public function domain()
//    {
//        return $this->hasOne(Domain::class, 'id', 'domain_id');
//    }

    public function getTemplateAttribute()
    {
        if (empty($this->template)) {
            return 'Default';
        }
        return $this->template;
    }

}
