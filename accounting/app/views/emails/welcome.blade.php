<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
 <style type="text/css">
  .receipt{padding: 20px;border: 10px solid rgb(51,204,204); margin: 5px;}
</style>
</head>
<body>
<div class="col-md-4 receipt">
  <div class="row">
     <div class="col-md-6">
      <img src="{{asset('assets/front-page/images/pnpaa-logo-small.png')}}" alt="logo">
    </div>
    <div class="col-md-6">
      <p>Date : {{{  dateMonth($data->transaction_date)  }}} </p>
    </div>
    <div class="col-md-12">
      <p>Payee : {{{ getUserName($data->user_id,true)}}} </p>
      <p>Recieved From : {{{ getUserName($data->user_id,true) }}} </p>
      <p>On : {{{  dateMonth($data->transaction_date) }}} </p>
    </div>
    <div class="col-md-12">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Description</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>{{{ $data->transaction_purpose }}}</td>
            <td>Php {{{ $data->transaction_amount }}}</td>
          </tr>
          <tr>
            <td colspan="2">TOTAL</td>
            <td>Php {{{ $data->transaction_amount }}}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-6 col-md-offset-6">
      <p>Recorded by : {{{  getUserName($data->transaction_setter,true)}}}</p>
    </div>
  </div>
</div>
</body>
</html>