<?
	include('funciones/functions.php');
	print generarClave();
	f_header()
?>
<ul id="pagination-digg">
	<li class="previous-off">«Previous</li>
	<li class="active">1</li>
	<li><a href="?page=2">2</a></li>
	<li><a href="?page=3">3</a></li>
	<li><a href="?page=4">4</a></li>
	<li><a href="?page=5">5</a></li>
	<li><a href="?page=6">6</a></li>
	<li><a href="?page=7">7</a></li>
	<li class="next"><a href="?page=8">Next »</a></li>
</ul>
<?
f_footer()
?>