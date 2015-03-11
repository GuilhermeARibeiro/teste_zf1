   <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
		<?php echo $this->action('navigation','index')?>
      </div><!-- /.container -->
    </div><!-- /.navbar -->
132
    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">

          <div class="row">
			<table class="table table-striped">
				<tr>
					<th>Produto</th>
					<th>Valor</th>
					<th>Promoção</th>
					<th>Validade</th>
					<th style="width: 100px">&nbsp;</th>
				</tr>
				<tr>
					<td>Adesivo de papel</td>
					<td>R$ 5,00</td>
					<td>R$ 2,50</td>
					<td>06/02/2015</td>
					<td> <a href="#" class="btn btn-primary btn-lg ">Comprar</a></td>
				</tr>
				<tr>
					<td>Adesivo de papel</td>
					<td>R$ 10,00</td>
					<td>R$ 5,00</td>
					<td>06/02/2015
					<td> <a href="#" class="btn btn-primary btn-lg ">Comprar</a></td>
				</tr>
				<tr>
					<td>Adesivo de papel</td>
					<td>R$ 15,00</td>
					<td>R$ 10,00</td>
					<td>06/02/2015</td>
					<td> <a href="#" class="btn btn-primary btn-lg ">Comprar</a></td>
				</tr>
			</table>

			<div class="well sidebar-nav">
                <ul class="nav">
		     <li><h2>Filtro</h2></li>
		     <li>Data inicial 04/02/2015</li>
		     <li>Data final   06/02/2015</li>
	            </ul>
            </div>

          </div><!--/row-->
        </div><!--/span-->


      </div><!--/row-->

      <hr>

    </div><!--/.container-->