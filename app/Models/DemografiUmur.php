<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DemografiUmur extends Model
{
    protected $guarded = ['id'];

    public function demografi()
    {
        return $this->belongsTo(Demografi::class);
    }
}