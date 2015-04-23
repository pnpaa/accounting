<?php

	class Mailler extends Eloquent
	{
	     public $timestamps=false;
       protected $fillable=['thread','status','is_archived','type','recepient','subject','message','sender'];
       protected $table = 'pna_mail';
//stutuses
/*
0=unread
1=draft
2=delete
3=spam
4=read

*/

  public function scopeAllMail($query)
  {
    return $query->whereRecepient(Auth::id())
                 ->orWhere('sender',Auth::id());

  }
  public function scopeSentMail($query)
  {
  	  return $query->whereSender(Auth::id())->whereStatus(0);
  }
  public function scopeInboxMail($query)
  {
  	  return $query->whereRecepient(Auth::id())->whereStatus(0);
  }
  public function scopeUnreadMail($query)
  {
  	  return $query->whereStatus(0);
  }
  public function scopeDraftMail($query)
  {
      return $query->whereStatus(1);
   }
     public function scopeTrashMail($query)
  {
      return $query->whereStatus(2);
   }
       public function scopeSpamMail($query)
  {
      return $query->whereStatus(3);
   }
  public function scopeReplies($query,$id)
  {
      $mail=$query->whereId($id)->get();
      return Mailler::whereThread($mail[0]->thread);
  }

 }