<h1 class="text-center text-md"><?=$titulo?></h1>


<table class="table table-border mt-3">
  <thead>
    <colgroup>
      <col style='width: 5%'>
      <col style='width: 35%'>
      <col style='width: 15%'>
      <col style='width: 35%'>
      <col style='width: 10%'>

    </colgroup>

    <tr>

      <th>ID</th>
      <th>Nombre</th>
      <th>Color Piel</th>
      <th>publicado</th>
      <th>Altura</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach($datos as $registro):?>
      <tr>
        <td><?=$registro['id']?></td>
        <td><?=$registro['superhero_name']?></td>
        <td><?=$registro['hair_colour']?></td>
        <td><?=$registro['publisher_name']?></td>
        <td><?=$registro['weight_kg']?></td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>