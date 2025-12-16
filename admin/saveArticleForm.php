<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mes articles</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>

	<div id="" class="container-fluid p-4">
		<form method="POST" action="saveArticle.php" enctype="multipart/form-data" id="form" class="form-group row g-3 mx-auto mt-5 mb-5 w-50 border-primary p-4 shadow rounded-3">

			<div class="">

				<div class="field-container col-md-12 mb-4">
					<label for="nomArticle">Nom de l'article : </label>
					<input type="text" name="nomArticle" class="form-control" id="nomArticle">
					<span class="messageSpan" id="spanNomArticle"></span>
				</div>

				<div class="field-container col-md-12 mb-4">
					<label for="description">Description : </label>
					<input type="text" name="description" class="form-control" id="description">
					<span class="messageSpan" id="spanDescription"></span>		
				</div>	
	
				<div class="field-container col-md-12 mb-4">
					<label for="categorie">Catégories: </label>
					<select class="form-select" name="categorie" id="categorie">
						<option value="" selected></option>
						<option value="ordinateurs">Ordinateurs</option>
						<option value="imprimantes">Imprimantes</option>
						<option value="telephones">Téléphones</option>
						<option value="accessoires">Accessoires</option>
					</select>
					<span class="messageSpan" id="spanCategorie"></span>			
				</div>

				<div class="row">
					<div class="field-container col-md-6 mb-4">
                        <label for="prixUnitaire">Prix Unitaire : </label>
                        <input type="number" min="1" name="prixUnitaire" class="form-control" id="prixUnitaire">	
                        <span class="messageSpan" id="spanPrixUnitaire"></span>			
                    </div>	
                    
                    <div class="field-container col-md-6 mb-4">
                        <label for="qteStock">Quantité : </label>
                        <input type="number" min="1" name="qteStock" class="form-control" id="qteStock">	
                        <span class="messageSpan" id="spanQteStock"></span>			
                    </div>
				</div>

                <div class="field-container col-md-12 mb-4">
					<label for="image">Image : </label>
					<input type="file" name="image" accept="image/*" class="form-control" id="image">	
					<span class="messageSpan" id="spanImage"></span>			
				</div>

				<input type="hidden" value="enregistrer" name="action">

				<div class="col-md-12 mb-4">
									
				</div>

				<div id="enregistrer" class="col-12">
           	 		<button type="submit" id="button" class="btn btn-primary">Enregistrer</button>
        		</div>

			</div>
			
		</form>
	</div>
	

	<!--<script type="text/javascript" src="js/script.js"></script>-->
</body>
</html>