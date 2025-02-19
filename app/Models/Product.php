<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
use HasFactory;
/**
* fillable
*
* @var array
*/
protected $fillable = [
'image',
'title',
'description',
'price',
'stock',
];
// Di dalam model PurchaseHistory
public function product()
{
    return $this->belongsTo(Product::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

public function purchaseHistories()
{
    return $this->hasMany(PurchaseHistory::class, 'product_id');
}

}