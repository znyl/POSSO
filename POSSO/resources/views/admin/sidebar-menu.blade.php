<li class="header">MENU</li>
<li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i><span>Dashboard</span><i class="fa fa-angle-left"></i></a></li>
<li><a href="{{url('/admin/category/index')}}"><i class="fa fa-dashboard"></i><span>Category</span><i class="fa fa-angle-left"></i></a></li>
<li class="treeview">
	<a href="#"><i class="fa fa-book"></i><span>Catalog</span><i class="fa fa-angle-left"></i></a>
	<ul class="treeview-menu">
		<li><a href="{{url('admin/product/index')}}"></i><span>Product</span><i class="fa fa-angle-left"></i></a></li>
		<li><a href="{{url('admin/discount/index')}}"></i><span>Discounted Product</span><i class="fa fa-angle-left"></i></a></li>
		<li><a href="{{url('admin/discount/addForm')}}"></i><span>Set Discount</span><i class="fa fa-angle-left"></i></a></li>
	</ul>
</li>

<li>
	<a href="#"><i class="fa fa-book"></i><span>List Order</span><i class="fa fa-angle-left"></i></a>
	<ul class="treeview-menu">
		<li><a href="{{url('admin/order/index')}}"><i class="fa fa-dashboard"></i><span>Active Order</span><i class="fa fa-angle-left"></i></a></li>
		<li><a href="{{url('admin/orderCustom/index')}}"><i class="fa fa-dashboard"></i><span>Custom Order</span><i class="fa fa-angle-left"></i></a></li>
		<li><a href="{{url('admin/order/delivered')}}"><i class="fa fa-dashboard"></i><span>Delivered Order</span><i class="fa fa-angle-left"></i></a></li>
		<li><a href="{{url('admin/order/rent')}}"><i class="fa fa-dashboard"></i><span>Rented Product</span><i class="fa fa-angle-left"></i></a></li>
		<li><a href="{{url('admin/order/all')}}"><i class="fa fa-dashboard"></i><span>All Order history</span><i class="fa fa-angle-left"></i></a></li>
	</ul>
	
<li class="treeview">
  <a href="#"><i class="fa fa-gear"></i><span>Settings</span><span class="pull-right-container"><i class="fa fa-angle-left"></i></span></a>
  <ul class="treeview-menu">
    <li><a href="{{ url('admin/setting/user/index') }}"><i class="fa fa-angle-right"></i><span>User</span></a></li>
    <li><a href="{{ url('admin/setting/slider/index')}}"><i class="fa fa-angle-right"></i><span>Banner</span></a>
    <li><a href="{{url('admin/setting/email/index')}}"><i class="fa fa-angle-right"></i><span>Email</span></a></li>
  </ul>
</li>