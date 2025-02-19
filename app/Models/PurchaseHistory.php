<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang sesuai dengan nama tabel di database
    protected $table = 'purchase_history';  // Pastikan nama tabel sesuai dengan yang ada di database
    
    // Setiap kolom yang bisa diisi
    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'total_price', 'purchase_date', 'status', 'alamat', 'payment_method',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function product()
{
    return $this->belongsTo(Product::class);
}

    protected $dates = ['purchase_date'];
}

