<?php
class UpdatesCategory extends Eloquent{
 public $timestamps=false;
 protected $fillable=['is_archived', 'category_name','category_color','category_setter'];
 protected $table="pna_updates_category";

 public function scopeBelongsToUser($query)
 {
            $roles=User::whereRole(1)->get();
								    $category_setter=array(Auth::id());
								    foreach ($roles as $role) {
								      array_push($category_setter,$role->id);
								    }
								   return $query->whereIn('category_setter',$category_setter);
 }


}