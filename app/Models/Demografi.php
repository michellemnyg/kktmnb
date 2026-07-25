<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Demografi extends Model
{
    protected $guarded = ['id']; // Membuka semua kolom untuk mass-assignment

    // Relasi One-to-Many ke tabel umur
    public function umurs()
    {
        return $this->hasMany(DemografiUmur::class);
    }
}