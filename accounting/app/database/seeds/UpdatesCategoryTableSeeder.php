<?php

class UpdatesCategoryTableSeeder extends Seeder {
	public function run()
	{
    UpdatesCategory::create([
       'category_name' => 'Generic',
       'category_setter' =>1,
       'category_color' => '#00AEFF',
       'is_archived' => 0
   	]);
    UpdatesCategory::create([
       'category_name' => 'Home',
       'category_setter' =>1,
       'category_color' => '#FF2968',
       'is_archived' => 0
   	]);
   	 UpdatesCategory::create([
       'category_name' => 'Overtime',
       'category_setter' =>1,
       'category_color' => '#711A76',
       'is_archived' => 0
   	]);
   	  UpdatesCategory::create([
       'category_name' => 'Job',
       'category_setter' =>1,
       'category_color' => '#882F00',
       'is_archived' => 0
   	]);
   	   UpdatesCategory::create([
       'category_name' => ' Off-site work',
       'category_setter' =>1,
       'category_color' => '#44A703',
       'is_archived' => 0
   	]);
   	    UpdatesCategory::create([
       'category_name' => 'To Do',
       'category_setter' =>1,
       'category_color' => '#FF3B30',
       'is_archived' => 0
   	]);
   	     UpdatesCategory::create([
       'category_name' => 'Cancelled',
       'category_setter' =>1,
       'category_color' => '#E6C800',
       'is_archived' => 0
   	]);
	}
}