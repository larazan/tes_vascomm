<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'description', 'price', 'image_url'];
    protected $fillable = [
		'parent_id',
		'user_id',
		'sku',
		'type',
		'name',
		'slug',
		'price',
		'weight',
		'length',
		'width',
		'height',
		'short_description',
		'description',
		'status',
	];

	public const DRAFT = 0;
	public const ACTIVE = 1;
	public const INACTIVE = 2;

	public const STATUSES = [
		self::DRAFT => 'draft',
		self::ACTIVE => 'active',
		self::INACTIVE => 'inactive',
	];

	public const SIMPLE = 'simple';
	public const CONFIGURABLE = 'configurable';
	public const TYPES = [
		self::SIMPLE => 'Simple',
		self::CONFIGURABLE => 'Configurable',
	];

	/**
	 * Define relationship with the User
	 *
	 * @return void
	 */
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	/**
	 * Define relationship with the ProductInventory
	 *
	 * @return void
	 */
	public function productInventory()
	{
		return $this->hasOne('App\Models\ProductInventory');
	}

	/**
	 * Define relationship with the Category
	 *
	 * @return void
	 */
	public function categories()
	{
		return $this->belongsToMany('App\Models\Category', 'product_categories');
	}

	public function brands()
	{
		return $this->belongsToMany('App\Models\Brand', 'product_brands');
	}

	/**
	 * Define relationship with the Variants
	 *
	 * @return void
	 */
	public function variants()
	{
		return $this->hasMany('App\Models\Product', 'parent_id')->orderBy('price', 'ASC');
	}

	/**
	 * Define relationship with the Parent
	 *
	 * @return void
	 */
	public function parent()
	{
		return $this->belongsTo('App\Models\Product', 'parent_id');
	}

	/**
	 * Define relationship with the ProductAttributeValue
	 *
	 * @return void
	 */
	public function productAttributeValues()
	{
		return $this->hasMany('App\Models\ProductAttributeValue', 'parent_product_id');
	}

	/**
	 * Define relationship with the ProductImage
	 *
	 * @return void
	 */
	public function productImages()
	{
		return $this->hasMany('App\Models\ProductImage')->orderBy('id', 'DESC');
	}

	/**
	 * Define relationship with the OrderItem
	 *
	 * @return void
	 */
	public function orderItems()
	{
		return $this->hasMany('App\Models\OrderItem');
	}

	/**
	 * Define relationship with the Shipment
	 *
	 * @return void
	 */
	public static function statuses()
	{
		return self::STATUSES;
	}

	/**
	 * Get status label
	 *
	 * @return string
	 */
	public function statusLabel()
	{
		$statuses = $this->statuses();

		return isset($this->status) ? $statuses[$this->status] : null;
	}

	/**
	 * Get product types
	 *
	 * @return array
	 */
	public static function types()
	{
		return self::TYPES;
	}

	/**
	 * Scope new arrival product
	 *
	 * @param Eloquent $query query builder
	 *
	 * @return Eloquent
	 */
	public function scopeNewArrival($query)
	{
		return $query->where('status', 1)
			->where('parent_id', null);
	}

	/**
	 * Scope all products
	 *
	 * @param Eloquent $query query builder
	 *
	 * @return Eloquent
	 */
	public function scopeAllProduct($query)
	{
		return $query->where('status', 1)
			->where('parent_id', null);
	}

	/**
	 * Scope active product
	 *
	 * @param Eloquent $query query builder
	 *
	 * @return Eloquent
	 */
	public function scopeActive($query)
	{
		return $query->where('status', 1)
			->where('parent_id', null);
	}


	/**
	 * Get price label
	 *
	 * @return string
	 */
	public function priceLabel()
	{
		return ($this->variants->count() > 0) ? $this->variants->first()->price : $this->price;
	}

	/**
	 * Is configurable product
	 *
	 * @return boolean
	 */
	public function configurable()
	{
		return $this->type == 'configurable';
	}

	/**
	 * Is simple product
	 *
	 * @return boolean
	 */
	public function simple()
	{
		return $this->type == 'simple';
	}
}
