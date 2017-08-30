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

<li><a href="{{url('admin/order/index')}}"><i class="fa fa-dashboard"></i><span>Order</span><i class="fa fa-angle-left"></i></a></li>
<li class="treeview">
  <a href="#"><i class="fa fa-gear"></i><span>Settings</span><span class="pull-right-container"><i class="fa fa-angle-left"></i></span></a>
  <ul class="treeview-menu">
    <li><a href=""><i class="fa fa-angle-right"></i><span>User</span></a></li>
    <li><a href=""><i class="fa fa-angle-right"></i><span>Banner</span></a>
  </ul>
</li>