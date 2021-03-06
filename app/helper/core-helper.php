<?php

  function dateForHumans($date)
  {
    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$date)->diffForHumans();
  }
  function dateTime($date,$full=false)
  {
    return $full? Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$date)->format('M d , Y - H : i a'):Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$date)->format('H : i  ');
  }

  function dateMonth($date)
  {
    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$date)->format('d M   Y');
  }
  function getUserName($id=0,$full=false)
  {
    $user=User::find($id);
    if($user == null)return '';
    return $full?$user->last_name.', '.$user->first_name:$user->first_name;
  }
  function getTaskNotications($value='')
  {
    $tasks=Tasks::all();
    $seenzone_list=array('');
    foreach ($tasks as  $task) {
            in_array(Auth::id(),explode('-', $task->seenzone))?array_push($seenzone_list,$task->id):'';
    }
    return Tasks::whereNotIn('id',$seenzone_list)->whereTask_assign(Auth::id())->get();

  }
  function getUpdatesNotications($value='')
  {
    $role=User::whereRole(1)->orWhere('role',3)->get();
    $update_setter=array();
    foreach ($role as $r) {
      array_push($update_setter,$r->id);
    }
    $updates=Updates::all();
    $seenzone_list=array('');

    foreach ($updates as  $update) {
            in_array(Auth::id(),explode('-', $update->seenzone))?array_push($seenzone_list,$update->id):'';
    }
      $raw_update = DB::table('pna_updates')->whereNotIn('id',$seenzone_list)->whereIn('update_setter',$update_setter)->get();

      $update=[];
      // dd(date_format(new DateTime(Auth::user()->created_at),'Y-m-d'));exit();
      foreach ($raw_update as $key => $value) {
    //dd(date_format(new DateTime($value->update_end),'Y-m-d'));
          if( date_format(new DateTime(Auth::user()->created_at),'Y-m-d') < date_format(new DateTime($value->update_end),'Y-m-d') ){
              array_push($update,$value);
          }
      }
      return   $update;
  }
  function getCommitteeName($id=0)
  {
     if($id==0) return 'none';
     $c=Committee::find($id);
     if ($c <> null)return $c->committee_title;
     return 'none';
  }
  function getUserBatch($id=0)
  {
    return User::find($id)->batch;
  }
function getUserFolders($value='')
{
  return   Folder::belongsToUser()->get();
}
function getHomeUrl(){

 if (Auth::user()->role == 1 OR Auth::user()->role == 2  ) {
    return Redirect::route('dashboard');
 }else if (Auth::user()->role == 3) {
    return Redirect::route('transaction.index');
 }else if(Auth::user()->role == 4){
    return Redirect::to('dashboard/auditor-page');
 }

}
function getBalance($user){
 return Balance::whereAuditor_id($user)->whereType(0)->sum('amount')-Balance::whereAuditor_id($user)->whereType(1)->sum('amount');
}

function getCashierBalance($user){
  return Transactions::whereTransaction_setter($user)->whereType(0)->sum('transaction_amount') - Balance::whereCashier_id($user)->whereType(0)->sum('amount');
}

function getCashierTotalBalance(){
  $total=0;
  foreach(User::whereRole(3)->get() as $key=>$value){
      $total+=getCashierBalance($value->id);
  }
  return $total;
}
function getAuditorTotalBalance(){
  $total=0;
  foreach(User::whereRole(4)->get() as $key=>$value){
      $total+=getBalance($value->id);
  }
  return $total;
}
function getPnpaaTotalBalance(){
  return Transactions::whereType(0)->sum('transaction_amount');
}
function getTotalBalanceForwardedToPn(){
  return Balance::whereType(1)->sum('amount');
}
