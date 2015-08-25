<?php


  class Balance extends Eloquent
  {
       protected $fillable=['pn_staff','type','amount','auditor_id','cashier_id'];
       protected $table = 'pna_balance';

  public function scopeBelongsToUser($query)
  {
      return $query->whereAuditor_id(Auth::id());
  }

 }