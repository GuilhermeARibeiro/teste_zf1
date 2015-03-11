<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
		<?php echo $this->action('navigation','index', array('page' => $this->page))?>
      </div><!-- /.container -->
    </div><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">
            <h1>Teste</h1>
            <p>lista de Produtos.</p>
          </div>
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Categoria 1</h2>
              <p>Valor: a partir de R$ 5,00</p>
            <p><a class="btn btn-default" href="<?php echo $this->url(array('controller'=>'index', 'action'=>'listar','id'=>1))?>">Mais detalhes &raquo;</a></p>
            </div><!--/span-->

            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Categoria 2</h2>
               <p>Valor: a partir de R$ 10,00</p>
              <p><a class="btn btn-default" href="<?php echo $this->url(array('controller'=>'index', 'action'=>'listar','id'=>2))?>">Mais detalhes &raquo;</a></p>
            </div><!--/span-->

            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Categoria 3</h2>
               <p>Valor: a partir de R$ 15,00</p>
              <p><a class="btn btn-default" href="<?php echo $this->url(array('controller'=>'index', 'action'=>'listar','id'=>3))?>">Mais detalhes &raquo;</a></p>
            </div><!--/span-->

          </div><!--/row-->
        </div><!--/span-->

      </div><!--/row-->