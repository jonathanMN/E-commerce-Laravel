<?php

class Product extends Eloquent
{

	protected $fillable = array('category_id', 'brand_id', 'name', 'description', 'image', 'quantity', 'unit_cost');

	public static function productsRecord()
	{
		$q = DB::select('
			SELECT
				p.id,
				c.category,
				b.brand,
				p.name,
				p.quantity,
				p.unit_cost 
			FROM
				products p,
				categories c,
				brands b 
			WHERE
				p.category_id = c.id
				AND
				p.brand_id = b.id
			ORDER BY
				p.id DESC');
		return $q;
	}

	public static function productMax()
	{
		return DB::table('products')->max('id');
	}

}