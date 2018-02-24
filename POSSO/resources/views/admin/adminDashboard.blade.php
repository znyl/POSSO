@extends('admin/admin-layout')
@section('dashboard')
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $data['custom_order'] }}</h3>

              <p>Active Custom Order</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('/admin/orderCustom/index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $data['active_order'] }}</h3>

              <p>Active Order</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3> {{ $data['unprocessed_order'] }}</h3>

              <p>Unprocessed Order</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $data['cancel'] }}</h3>

              <p>Cancelled Order</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
@stop
@section('box-title')
Contact Us
@stop
@section('box-body')
<table class="table table-condensed table-striped table-hover table-bordered" id="dataTable">
  <thead>
    <tr>
      <td>#</td>
      <td>Nama</td>
      <td>E-mail</td>
      <td>Status</td>
      <td>Tgl. Masuk</td>
    </tr>
  </thead>
  <tbody>
    @foreach($contactus as $index => $value)
    <tr>
      <td>{{ $index+1 }}</td>
      <td>{{ $value['name'] }}</td>
      <td>{{ $value['email'] }}</td>
      <td>{{ $value['status'] }}</td>
      <td>{{ date('d-m-Y H:i:s', strtotime($value['created_at'])) }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop