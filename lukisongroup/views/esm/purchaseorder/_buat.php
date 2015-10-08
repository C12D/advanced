<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;

//use terlebih dahulu
use yii\bootstrap\Modal;

use lukisongroup\models\esm\Barang;
use lukisongroup\models\esm\ro\Requestorder;
use lukisongroup\models\esm\ro\Rodetail;
use lukisongroup\models\esm\ro\RodetailSearch;

use lukisongroup\models\master\Barangumum;
use lukisongroup\models\master\Suplier;

use lukisongroup\models\esm\po\Podetail;

?>

<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
	<div class="col-xs-12 col-md-3">
    <?php Pjax::begin(['id'=>'pjax-users']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'KD_RO',
			[
	            'format'=>'raw',
	            'value' => function ($data){
	                $count = Rodetail::find()
	                    ->where([
	                        'KD_RO'=>$data->KD_RO,
	                    ])
	                    ->count();
	 
	                if(!empty($count)){
	                    return  Html::a('<button type="button" class="btn btn-primary btn-xs">View</button>',['detail','kd_ro'=>$data->KD_RO,'kdpo'=>$_GET['kdpo']],[
	                                                    'data-toggle'=>"modal",
	                                                    'data-target'=>"#myModal",
	                                                    'data-title'=> $data->KD_RO,
	                                                    ]); // ubah ini
	                } else {
	                    return '<button type="button" class="btn btn-danger btn-xs">No Data</button>';
	                }
	            }
	        ],
        ],
   		]); 
    ?>
    <?php Pjax::end(); ?>
	
	<?php
		$this->registerJs("
		    $('#myModal').on('show.bs.modal', function (event) {
		        var button = $(event.relatedTarget)
		        var modal = $(this)
		        var title = button.data('title') 
		        var href = button.attr('href') 
		        modal.find('.modal-title').html(title)
		        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
		        $.post(href)
		            .done(function( data ) {
		                modal.find('.modal-body').html(data)
		            });
		        })
		");

		Modal::begin([
		    'id' => 'myModal',
		    'header' => '<h4 class="modal-title">...</h4>',
		]);
		 
		echo '...';
		 
		Modal::end();
	?>
	
	</div>


	<div class="col-xs-12 col-md-9">
		  <?= Yii::$app->session->getFlash('error'); ?>

		<h2 style="margin-top:0px;">&nbsp;&nbsp;&nbsp; 
		<?php 
			$brg = Suplier::find('NM_SUPPLIER')->where(['KD_SUPPLIER'=>$quer->KD_SUPPLIER])->one(); 
			echo $brg->NM_SUPPLIER;
		?>
		</h2>

<hr/>	
<?php
$kdpo = $_GET['kdpo'];

$form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['esm/purchaseorder/createpo'],
]);
?>



	<table class="table table-bordered table-striped"  style="border-collapse:collapse;">
		<thead style="background-color:orange;">
			<tr>
				<th>#</th>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Qty</th>
				<th>Unit</th>
				<th>Harga / Unit</th>
				<th>Total</th>
			</tr>
		</thead>
		
		<tbody>
			<?php $a=0; foreach ($podet as $po => $rows) { $a=$a+1; ?>
			
			<tr style="cursor:pointer;">

			<?php 
				$ckBrg = explode('.', $rows->KD_BARANG);
				if($ckBrg[0] == 'BRG'){
					$nmBrg = Barang::find('NM_BARANG','HARGA')->where(['KD_BARANG'=>$rows->KD_BARANG])->one();
				} else if($ckBrg[0] == 'BRGU') {
					$nmBrg = Barangumum::find('NM_BARANG','HARGA')->where(['KD_BARANG'=>$rows->KD_BARANG])->one();
				}

	      		$ckUnit = preg_replace("/[^A-Z\']/", '', $rows->UNIT);
	      		if($ckUnit == 'U'){
					$brg = lukisongroup\models\master\Unitbarang::find('NM_UNIT')->where(['KD_UNIT'=>$rows->UNIT])->one();
	      		} else {
					$brg = lukisongroup\models\esm\Unitbarang::find('NM_UNIT')->where(['KD_UNIT'=>$rows->UNIT])->one();
	      		}

			?>

				<td class=" accordion-toggle" data-toggle="collapse" data-target="#demo<?php echo $a; ?>"><?php echo $a; ?></td>
				<td class=" accordion-toggle" data-toggle="collapse" data-target="#demo<?php echo $a; ?>"><?php echo $rows->KD_BARANG; ?> </td>
				<td class=" accordion-toggle" data-toggle="collapse" data-target="#demo<?php echo $a; ?>"><?php echo $nmBrg->NM_BARANG; ?></td>
				<td class=" accordion-toggle" data-toggle="collapse" data-target="#demo<?php echo $a; ?>">
					<?php echo $rows->QTY; ?>
					<input type="hidden" name="dqty" id="dqty<?php echo $a; ?>" value="<?php echo $rows->QTY; ?>" />
				</td>
				<td class=" accordion-toggle" data-toggle="collapse" data-target="#demo<?php echo $a; ?>"><?php echo $brg->NM_UNIT; ?></td>
				<td>
					<input type="text" name="hargaBarang[]" id="hargaBarang<?php echo $a; ?>" value="<?php echo $nmBrg->HARGA; ?>"  onchange="hrga()" onkeypress="hrga()" onkeyup="hrga()" required />
					<input type="hidden" name="kdBarang[]" id="kdBarang[]" value="<?php echo $rows->KD_BARANG; ?>"  required />
				</td>
				<td>
					<input type="text" name="total[]" id="total<?php echo $a; ?>" value="" disabled />
				</td>

			</tr>

	        <tr >
	            <td colspan="7"  class="hiddenRow"  style="padding:0px;">
            	<div class="accordian-body collapse" id="demo<?php echo $a; ?>" style="padding:10px;">
        		
        		<table class="table table-hover">
					<thead style="background-color:#FF8533;">
						<tr>
							<th>Kode RO</th>
							<th>Devisi</th>
							<th>Quantity</th>
							<th></th>
						</tr>
					</thead>

					<?php
						$form = ActiveForm::begin([
						    'method' => 'post',
						    'action' => ['esm/purchaseorder/spo?kdpo='.$kdpo],
						    'id' => 'detpo'.$a,
						]);
					?>
					<tbody>
						<?php 
							$pod = Podetail::find()->where(['ID_DET_PO'=>$rows->ID])->andWhere('STATUS <> 3')->all(); 
							$b=0; foreach ($pod as $pods => $pode) { $b=$b+1; 

							$ro_dep = Requestorder::find('KD_DEP')->where(['KD_RO'=> $pode->KD_RO])->one(); 
						?>
						<tr>
							<td><?php echo $pode->KD_RO; ?></td>
							<td><?php echo $ro_dep->KD_DEP; ?></td>
							<td id="<?php echo 'a'.$a.''.$b; ?>" onclick="edit(<?php echo $a.''.$b; ?>)">
								<?php echo $pode->QTY; ?>
							</td>

							<td style="display:none;" id="<?php echo 'b'.$a.''.$b; ?>">
							<div class="row">
							  <div class="col-xs-2">
							  	<input type="text" class="form-control" value="<?php echo $pode->QTY; ?>" name="qty[]" />
							  	<input type="hidden" class="form-control" value="<?php echo $pode->ID; ?>" name="id[]" />
							  	<input type="hidden" class="form-control" value="<?php echo $rows->ID; ?>" name="idpo" />
							  </div>
							  <div class="col-xs-8">
							  	<input type="text" class="form-control" value="<?php echo $pode->NOTE; ?>" placeholder="Keterangan" name="ket[]" />
							  </div>
							</div>
							</td>

							<td>
								<a href="delpo?idpo=<?php echo $pode->ID; ?>&kdpo=<?php echo $kdpo; ?>" onclick="return confirm('Anda yakin ingin menghapus file ini?');" ><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
        		</table>

        		<div style="text-align:right;">
        			<button type="button" class="btn btn-success btn-sm" onclick="document.getElementById('detpo<?php echo $a; ?>').submit();">Ubah Qty</button>
        		</div>

				<?php
					ActiveForm::end(); 
				?>

            	</div>  
	            </td>
	        </tr>

			<?php } ?>

			<tr>
				<td colspan="5"></td>
				<td style="text-align:right; font-size:13pt; font-weight:bold;">Sub Total</td>
				<td>
					<input type="text" name="ttlHrg" id="ttlHrg" value="" disabled />
				</td>
			</tr>

			<tr>
				<td colspan="5"></td>
				<td style="text-align:right; font-size:13pt; font-weight:bold;">Disc.</td>
				<td>
					<input type="text" name="disc" id="disc" value="<?php echo $quer->DISC; ?>" onchange="hrga()" onkeypress="hrga()" onkeyup="hrga()" />
				</td>
			</tr>

			<?php if($quer->PAJAK == 0){ $pjk = '10'; }else{ $pjk = $quer->PAJAK; } ?>
			<tr>
				<td colspan="5"></td>
				<td style="text-align:right; font-size:13pt; font-weight:bold;">Pajak 
					<input type="number" id="pajak" name="pajak" style="width:60px;" value="<?php echo $pjk; ?>" min="0" onchange="hrga()" onkeypress="hrga()" onkeyup="hrga()" /> %
				</td>
				<td>
					<input type="text" name="hrgPjk" id="hrgPjk" value="" disabled />
				</td>
			</tr>

			<tr>
				<td colspan="5"></td>
				<td style="text-align:right; font-size:13pt; font-weight:bold;">Total</td>
				<td>
					<input type="text" name="ttlHrgPjk" id="ttlHrgPjk" value="" disabled />
				</td>
			</tr>

		</tbody>
	</table>	

	<input type="hidden" name="kdpo" id="kdpo" value="<?php echo $kdpo; ?>" required/>

	<button type="submit" class="btn btn-warning btn-sm">Buat PO</button>


	<input type="hidden" name="ttlLop" id="ttlLop" value="<?php echo $a; ?>" required/>

<?php ActiveForm::end(); ?>
		<script>
		window.onload = function(){ hrga(); }

		function hrga(){
			lop = document.getElementById('ttlLop').value;
			pjk = document.getElementById('pajak').value / 100;
			disc = document.getElementById('disc').value;

			var b = 0;
			for(a=1; a<=lop; a++){
				var qty = document.getElementById('dqty'+a).value;
				var hrg = document.getElementById('hargaBarang'+a).value;
				var hsl = parseInt(qty) * parseInt(hrg);
				document.getElementById('total'+a).value = hsl;
				var b = parseInt(b) + parseInt(hsl);
			}
			document.getElementById('ttlHrg').value = b;
			var hrgDsc = b - disc;

			var hrgPjk = pjk * hrgDsc;
			document.getElementById('hrgPjk').value = hrgPjk;
			document.getElementById('ttlHrgPjk').value = hrgDsc + hrgPjk;
		}


		function edit(kd){
			document.getElementById('a'+kd).style.display="none";
			document.getElementById('b'+kd).style.display="block";
		}	

		</script>

	</div>
</div>
