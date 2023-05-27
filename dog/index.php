<?php require "../_helpers/index.php";
echo siteHeader("Gerenciar Dogs");
require("../_config/connection.php");
require("../dao/dog.php");


$message = false;
if ($_GET && $_GET["message"]) {
	$message = $_GET["message"];
}
$dogs = new dog();
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
			<h1>dog</h1>
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
				<th>Porte</th>
				<th>Nac</th>				
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dogs->getAll() AS $dog) : ?>
				<tr>
					<td>
						<?= "#".$dog->id?>
					</td>

					<td>
						<?= $dog->raca ?>
					</td>
					
					<td>
						<?= $dog->porte ?>
					</td>
					
					<td>
						<?= $dog->nac ?>
					</td>					
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-outline-primary" onclick="confirmDelete(<?= $dog->id ?>)">
								Excluir
							</button>
							<a href="edit.php?id=<?= $dog->id ?>" class="btn btn-outline-primary">
								Editar
							</a>
							<a href="view.php?id=<?= $dog->id ?>" class="btn btn-outline-primary">
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
				<th>raca</th>
				<th>porte</th>
				<th>nac</th>				
				<th>Ações</th>
			</tr>
		</tfooter>
	</table>
</section>

<script>
	const confirmDelete = (idDog) => {
		const response = confirm("Deseja realmente excluir a dog?")
		if (response) {
			window.location.href = "delete.php?id=" + idDog
		}
	}
</script>

<?php require("../_partials/footer.php"); ?>