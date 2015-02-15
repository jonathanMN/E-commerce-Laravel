<?php

class Product extends Eloquent
{

	protected $fillable = array('category_id', 'brand_id', 'name', 'description', 'image', 'quantity', 'unit_cost');

}