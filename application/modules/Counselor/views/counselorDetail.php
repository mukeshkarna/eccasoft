<div class="modal-header">
	<h3 class="modal-title">Purchase Detail</h3>
</div>
	<div class="modal-body" id="purchase_detail_table">
		<table class="table table-striped">
			<tr>
				<td>Purchase ID :</td>
				<td><?=$purchaseDetail['purchase_id'];?></td>
			</tr>
			<tr>
				<td>Supplier Name :</td>
				<td><?=$purchaseDetail['supplier_name']?></td>
			</tr>
			<tr>
				<td>Branch :</td>
				<td><?=$purchaseDetail['branch_name']?></td>
			</tr>
			<tr>
				<td>Bill No. :</td>
				<td><?=$purchaseDetail['bill_no']?></td>
			</tr>
			<tr>
				<td>Date of Purchase :</td>
				<td><?=$purchaseDetail['bill_date_eng']?></td>
			</tr>
			<tr>
				<td>Remarks :</td>
				<td><?=$purchaseDetail['remarks']?></td>
			</tr>
		</table>
		<br>

		<table class="table table-striped">
			<thead style="background: #008833; color:#fff;">
				<tr>
					<th>Product Name</th>
					<th>Unit Price (In Rs.)</th>
					<th>Quantity</th>
					<th>Discount Percent (In %)</th>
					<th>Total (In Rs.)</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($productDetail as $key => $row): ?>
					<?php 
						$amount = $row['product_unit_price']*$row['product_quantity'];
						$discount_percent = $row['discount_percent'];
					 ?>
				<tr>
					<td><?=$row['product_name'];?></td>
					<td><?=$row['product_unit_price'];?></td>
					<td><?=$row['product_quantity'];?></td>
					<td><?=$row['discount_percent'];?></td>
					<td><?php echo ($amount-($amount*$discount_percent)/100); ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot align="right">
				<tr>
					<td colspan="3"></td>
					<td>Sub Total (In Rs.) :</td>
					<td><?=$purchaseDetail['sub_total_amount'];?></td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td>Vat Amount (In Rs.) :</td>
					<td><?=$purchaseDetail['vat_amount'];?></td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td>Grand Total (In Rs.) :</td>
					<td><?=$purchaseDetail['total_amount'];?></td>
				</tr>
			</tfoot>
		</table>
	</div><!-- end modal body -->
	<div class="modal-footer">
		<button type="button" class="btn btn-default btn-flat" id="closeModal">Close</button>
	</div>