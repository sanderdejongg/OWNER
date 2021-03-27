<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];
    /**
     * @var mixed
     */
    private $name;
    /**
     * @var mixed
     */
    private $description;

    public function tag()
    {
        return $this->belongsToMany(tags::class, 'product_tags');
    }
}
