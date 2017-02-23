	<header>
		<div><h3>Tienda en Linea</h3></div>
	</header>
	<nav>
		<ul>
			<li><a href="/Tienda/consultor/catalogo">Catalogo</a></li>
			<li><a href="/Tienda/consultor/alta">Nuevo Usuario</a></li>
			<li><a href="/Tienda/usuario/carrito">Consultar Carrito</a></li>
			<li><a href="/Tienda/usuario/carrito">Comprar lo del Carrito</a></li>
			<li><a href="/Tienda/usuario/agrega">Agregar Productos al Carrito</a></li>
			<li><a href="/Tienda/consultor/login">Login</a></li>
		</ul>
	</nav>

<style>
	*{box-sizing: border-box;}
	header{
		padding: 15px;
		background-color: #2979ff;
	}
	header div h3{
		margin: 0;
		color: white;
	}
	nav{
		/*border: 2px solid;*/
	}
	nav ul{
		/*border: 2px solid red;*/
	}
	nav ul li{
		padding: 5px 10px;
		border: 2px solid green;
		border-radius: 5px;
		cursor: pointer;
		margin-top:10px;
		display: inline-block;
	}
	nav ul li:hover{
		font-weight: bold;
	}

	nav ul li a{
		text-decoration: none;
	}
</style>