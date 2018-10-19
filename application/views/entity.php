<table border="0">
  <tbody>
  <tr><td colspan="4"><hr></tr>
  <tr><td><label for="e_doc_type">Tipo de entidad: </label>
  </td><td><select name="e_doc_type[]">
        <?php foreach($entitys as $e):?>
        <option value="<?=$e->id?>"><?=$e->nombre?></option>
      <?php endforeach;?>
      </select>
  </td></tr>
  <tr>
    <td><label for="e_doc">Nit:</label>
    </td><td><input name="e_doc[]" placeholder=" 1.568.678.098" type="number">
  </td></tr>
  <tr>
	<td><label for="e_names">Nombre</label>
	</td><td><input name="e_names[]" placeholder="Bancolombia" type="text">

	</td><td><label for="e_monto">Monto de la deuda</label>
	</td><td><input name="e_monto[]" placeholder="8'000.000" type="number">
    </td></tr>
  <tr>
	<td><label for="e_date">Fecha en que contrajo la deuda</label>
	</td><td><input name="e_date[]" placeholder=" 13/12/1990" type="date">
	</td><td><label for="e_date_end[]">Fecha fijada de pago</label>
	</td><td><input name="e_date_end[]" placeholder="dd / mm / aaaa" type="date">
    </td></tr>
  </table>