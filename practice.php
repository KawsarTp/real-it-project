<table class="table" id="items">
	<thead>
	<tr>
		<th>Code</th>
		<th>Products</th>
		<th>Price</th>
		<th>In Stock</th>
		<th>Batch No.</th>
		<th>Expiry</th>
		<th>Qty</th>
		<th>Discount %</th>
		<th>Tax</th>
		<th>Sub Total</th>
	</tr>
	</thead>
	<tbody>
		<?php
		$product_inventory = $this->Constant_model->product_inventory();
		$totalinventory = 0;

		foreach ($product_inventory as $inventory)
		{
			$totalinventory = $totalinventory + $inventory->subTotal;
			?>
		<tr  id="item_row_<?=$inventory->id;?>" class="dynamic_row">
			<td><?=$inventory->product_code?></td>
			<td><?=$inventory->name?></td>
			<td><input id="rate<?=$inventory->id;?>"  readonly="" style="width: 75px;" class="form-control rate" type="text" value="<?=$inventory->purchase_price?>" /></td>
			<td><?=$inventory->qty?></td>
			<td><input size="3" class="form-control" type="text" value="<?=$inventory->batch_no?>"></td>
			<td><input size="3" class="form-control datepicker_class" type="text" value="<?=$inventory->expire_date?>"></td>
			<td><input id="qty<?=$inventory->id;?>" style="width: 75px;" class="form-control pcs" type="text" value="<?=$inventory->ordered_qty?>" /></td>
			<td><input  style="width: 75px;" class="form-control discount" type="text" value="<?=$inventory->discount_percentage?>"></td>
			<td><input style="width: 75px;" class="form-control" type="text" value="<?=$inventory->tax?>"></td>
			<td><span class="net_amount"><?=$inventory->subTotal?></span></td>
		<tr>
		<?php }?>
		<tr>
			<td colspan="8">&nbsp;</td>
			<td>Grand Total Price</td>
			<td><span id="total_net"> <?=number_format($totalinventory,2)?></span></td>
		</tr>
	</tbody>
</table>


<script>
$(document).ready(function(){
	$(".table").delegate(".dynamic_row input, select", "blur", function() {
		calamount();
	});

	function calamount()
	{
		totalnetamount = 0;
		$("#items").find('.dynamic_row').each(function (i) {
			var $fieldset = $(this);

			var pcs        = ($('.pcs', $fieldset).val());
			var rate       = ($('.rate', $fieldset).val());
			var discount  = ($('.discount', $fieldset).val());

			if(pcs.trim()==''){
				pcs=0;
				$('.rate', $fieldset).val('0');
			}
			if(discount.trim()==''){
				discount=0;
				$('.discount', $fieldset).val('0');
			}
			var grossamount = 0.00;
			var grossamount = parseFloat(pcs*rate).toFixed(2);
			var discountamt = parseFloat((discount/100)*grossamount).toFixed(2);
			var netamount   = parseFloat(grossamount-discountamt).toFixed(2);
			$('.net_amount', $fieldset).html(netamount);

			totalnetamount = parseFloat(totalnetamount) + parseFloat(netamount);
			$("#total_net").text(parseFloat(totalnetamount).toFixed(2));
		});
	}
});
</script>