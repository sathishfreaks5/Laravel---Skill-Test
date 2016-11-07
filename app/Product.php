<?php 
namespace App;

use Illuminate\Database\Eloquent\Model; 

class Product extends Model
{

    /**
     * Implements Eloquent api for json file storage.
     * Once migrating to database storage you can
     * just remove the trait.
     */
    use FileModel;

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'created'
    ];
}
