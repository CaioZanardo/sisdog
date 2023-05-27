<?php require "../_helpers/index.php";
echo siteHeader("Gerenciar Raças");
require("../_config/connection.php");
require("../dao/raca.php");

$message = false;
$racaDAO = new Raca();

if ($_GET) {
	if (isset($_GET["message"])) {
		$message = $_GET["message"];
	}	
}
?>
<section class="container mt-5 mb-5">

	<?php if ($message) : ?>
		<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<?= $message ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<div class="row mb-3">
		<div class="col">
			<h1>racas</h1>
		</div>
		<div class="col d-flex justify-content-end align-items-center">
			<a class="btn btn-primary" href="add.php">Adicionar</a>
		</div>
	</div>

	

	<table class="table table-striped table-bordered text-center">
		<thead class="table-dark">
			<tr>
				<th>ID</th>
				<th>Raça</th>	
				<th>Ações</th>	
			</tr>
		</thead>
		<tbody>
			<?php foreach ($racaDAO->getAll() AS $raca) : ?>
				<tr>
					<td>
						<?= "#".$raca->id ?>
					</td>
					<td>
						<?= $raca->raca ?>
					</td>									
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-outline-primary" onclick="confirmDelete(<?= $raca->id ?>)">
								Excluir
							</button>
							<a href="edit.php?id=<?= $raca->id ?>" class="btn btn-outline-primary">
								Editar
							</a>
							<a href="view.php?id=<?= $raca->id ?>" class="btn btn-outline-primary">
								Ver
							</a>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		<tfooter class="table-dark">
			<tr>
				<th>ID</th>
				<th>Raça</th>				
				<th>Ações</th>
			</tr>
		</tfooter>
	</table>
</section>


<script>
	const confirmDelete = (productId) => {
		const response = confirm("Deseja realmente excluir esta raca?")
		if (response) {
			window.location.href = "delete.php?id=" + productId
		}
	}
</script>

<?php require("../_partials/footer.php"); ?>