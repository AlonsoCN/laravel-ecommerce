<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>API</title>
	<style>
		table {
			text-align: center;
		}
		table tr td {
			padding: 1%;
		}
		p {
			margin: 0;
		}
	</style>
</head>
<body>
	<div>
		<h4>AUTH</h4>
		<table border="1">
			<thead>	
			<th>URL</th>
				<th>Method</th>
				<th width="50%">Params</th>
				<th>Return</th>
				<th>Description</th>
			</thead>
			<tbody>
				<tr>
					<td>/login</td>
					<td>GET</td>
					<td>-</td>
					<td>VIEW</td>
					<td>Formulario de login</td>
				</tr>
				<tr>
					<td>/login</td>
					<td>POST</td>
					<td>
						<p>email(string) : Email con el que se registro.</p>
						<p>password(string) : Contraseña</p>
					</td>
					<td>JSON</td>
					<td>Iniciar sesión.</td>
				</tr>
				<tr>
					<td>/logout</td>
					<td>GET</td>
					<td>-</td>
					<td>JSON</td>
					<td>Salir de sesión.</td>
				</tr>
			</tbody>
		</table>

		<h4>CATEGORÍAS</h4>
		<table border="1">
			<thead>
				<th>URL</th>
				<th>Method</th>
				<th width='50%'>Params</th>
				<th>Return</th>
				<th>Description</th>
			</thead>
			<tbody>
				<tr>
					<td>/categories</td>
					<td>GET</td>
					<td>-</td>
					<td>JSON</td>
					<td>Retorna todas las categorías</td>
				</tr>
				<tr>
					<td>/categories/{id}</td>
					<td>GET</td>
					<td>
						<p>id(int): ID de una categoría.</p>
					</td>
					<td>JSON</td>
					<td>Retorna una categoría</td>
				</tr>
				<tr>
					<td>/category</td>
					<td>POST</td>
					<td>
						<p>name: Nombre de la categoría</p>
					</td>
					<td>JSON</td>
					<td>Crea una categoría</td>
				</tr>
				<tr>
					<td>/category</td>
					<td>PUT</td>
					<td>
						<p>id: ID de una categoría</p>
						<p>name: Nombre de la categoría</p>
					</td>
					<td>JSON</td>
					<td>Actualiza una categoría</td>
				</tr>
				<tr>
					<td>/category</td>
					<td>DELETE</td>
					<td>
						<p>id: ID de una categoría</p>
					</td>
					<td>JSON</td>
					<td>Eliminar una categoría</td>
				</tr>
			</tbody>
		</table>

		<h4>PRODUCTOS</h4>
		<table border="1">
			<thead>
				<th>URL</th>
				<th>Method</th>
				<th width="50%">Params</th>
				<th>Return</th>
				<th>Description</th>
			</thead>
			<tbody>
				<tr>
					<td>/products</td>
					<td>GET</td>
					<td>-</td>
					<td>JSON</td>
					<td>Retorna todas las productos.</td>
				</tr>
				<tr>
					<td>/products/{id}</td>
					<td>GET</td>
					<td>
						<p>id: ID de una producto</p>
					</td>
					<td>JSON</td>
					<td>Retorna </td>
				</tr>
				<tr>
					<td>/product</td>
					<td>POST</td>
					<td>
						<p>category_id(int) : ID de una Categoría</p>
						<p>title(string) : Título del producto</p>
						<p>description(string) : Descripción de producto</p>
						<p>price(float) : Precio de un producto</p>
						<p>availability(int) : Si un producto está disponible. (0: No | 1: Si)</p>
					</td>
					<td>JSON</td>
					<td>Crea una categoría</td>
				</tr>
				<tr>
					<td>/product</td>
					<td>PUT</td>
					<td>
						<p>id: ID de una categoría</p>
						<p>category_id(int) : ID de una Categoría</p>
						<p>title(string) : Título del producto</p>
						<p>description(string) : Descripción de producto</p>
						<p>price(float) : Precio de un producto</p>
						<p>availability(int) : Si un producto está disponible. (0: No | 1: Si)</p>
					</td>
					<td>JSON</td>
					<td>Actualiza una categoría</td>
				</tr>
				<tr>
					<td>/product</td>
					<td>DELETE</td>
					<td>
						<p>id: ID de una categoría</p>
					</td>
					<td>JSON</td>
					<td>Eliminar una categoría</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>