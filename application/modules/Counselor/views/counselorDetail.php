
	<div class="modal-body" id="counselor_detail_table">
		<table class="table table-striped">
			<tr>
				<td>Counselor ID :</td>
				<td><?=$counselorDtl['c_id'];?></td>
			</tr>
			<tr>
				<td>Full Name :</td>
				<td><?=$counselorDtl['c_fname'].' '.$counselorDtl['c_mname'].' '.$counselorDtl['c_lname'];?></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><?=$counselorDtl['c_email']?></td>
			</tr>
			<tr>
				<td>CTC Year. :</td>
				<td><?=$counselorDtl['c_ctc_year']?></td>
			</tr>
			<tr>
				<td>CTC Code :</td>
				<td><?=$counselorDtl['c_code']?></td>
			</tr>
			<tr>
				<td>Permanent Address :</td>
				<td><?=ucfirst($counselorDtl['c_p_address'])?></td>
			</tr>
			<tr>
				<td>Temporary Address :</td>
				<td><?=ucfirst($counselorDtl['c_t_address'])?></td>
			</tr>
			<tr>
				<td>Phone No. :</td>
				<td><?=$counselorDtl['c_phone']?></td>
			</tr>
			<tr>
				<td>Qualification :</td>
				<td><?=ucfirst($counselorDtl['c_qualification'])?></td>
			</tr>
		</table>
		<br>

		<!-- <table class="table table-striped">
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
				<?php //foreach ($productDetail as $key => $row): ?>
					<?php 
						//$amount = $row['product_unit_price']*$row['product_quantity'];
						//$discount_percent = $row['discount_percent'];
					 ?>
				<tr>
					<td><?//=$row['product_name'];?></td>
					<td><?//=$row['product_unit_price'];?></td>
					<td><?//=$row['product_quantity'];?></td>
					<td><?//=$row['discount_percent'];?></td>
					<td><?php// echo ($amount-($amount*$discount_percent)/100); ?></td>
				</tr>
				<?php// endforeach; ?>
			</tbody>
			<tfoot align="right">
				<tr>
					<td colspan="3"></td>
					<td>Sub Total (In Rs.) :</td>
					<td><?//=$purchaseDetail['sub_total_amount'];?></td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td>Vat Amount (In Rs.) :</td>
					<td><?//=$purchaseDetail['vat_amount'];?></td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td>Grand Total (In Rs.) :</td>
					<td><?=$purchaseDetail['total_amount'];?></td>
				</tr>
			</tfoot>
		</table> -->
	</div><!-- end modal body -->
	<div class="modal-footer">
		<button type="button" class="btn btn-default btn-flat" id="closeModal">Close</button>
	</div>