@extends('layouts.principal')

@section('title','Exemplo de Tabelas')
@section('title-form','Emendas')

@section('breadcrumb')
    <li class="active">
        <a href="/"><strong>Home</strong></a>
    </li>
    <li>
        <a>Forms</a>
    </li>
    <li class="active">
        Cadastro
    </li>
@endsection

@section('content')
    <!-- modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            
          </div>
        </div>

      </div>
    </div>
    <!-- fim modal -->

    <!-- tabela de emendas -->
    <div class="row">
        <h3>Emendas de Incremento</h3>
        <table id="tb_imendas" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Emenda</th>
                <th>Valor da Emenda</th>
                <th>Valor da Indicação</th>
                <th>Saldo a Indicar</th>
                <th>Detalhes</th>
                
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1111111</td>

                <td>1500.000,00</td>
                <td>100.000,00</td>
                <td>100.000,00</td>
                <td>
                    <center><button type="button" class="dtl btn btn-info btn-xs">Detalhes</button></center>
                </td>                
            </tr>
            <tr>
                <td>222222222</td>
                <td>1500.000,00</td>
                <td>100.000,00</td>
                <td>100.000,00</td>
                <td><center><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Detalhes</button></center></td>
                <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                          </div>
                          <div class="modal-body">
                            <p>Some text in the modal.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                
            </tr>
            <tr>
                <td>33333333</td>
                <td>1500.000,00</td>
                <td>100.000,00</td>
                <td>100.000,00</td>
               <td><center><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Detalhes</button></center></td>
                <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                          </div>
                          <div class="modal-body">
                            <p>Some text in the modal.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
              
            </tr>
            <tr>
                <td>44444444</td>
                <td>1500.000,00</td>
                <td>100.000,00</td>
                <td>100.000,00</td>
                <td><center><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Detalhes</button></center></td>
                <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                          </div>
                          <div class="modal-body">
                            <p>Some text in the modal.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                
            </tr>
            <tr>
                <td>555555</td>
                <td>1500.000,00</td>
                <td>100.000,00</td>
                <td>100.000,00</td>
               <td><center><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Detalhes</button></center></td>
                <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                          </div>
                          <div class="modal-body">
                            <p>Some text in the modal.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                
            </tr>
            <tr>
                <td>666666666</td>
                <td>1500.000,00</td>
                <td>100.000,00</td>
                <td>100.000,00</td>
               <td><center><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Detalhes</button></center></td>
                <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                          </div>
                          <div class="modal-body">
                            <p>Some text in the modal.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                
            </tr>
            <tr>
                <td>77777777777</td>
                <td>1500.000,00</td>
                <td>100.000,00</td>
                <td>100.000,00</td>
               <td><center><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Detalhes</button></center></td>
                <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                          </div>
                          <div class="modal-body">
                            <p>Some text in the modal.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                
            </tr>
            <tr>
                <td>88888888</td>
                <td>1500.000,00</td>
                <td>100.000,00</td>
                <td>100.000,00</td>
                <td><center><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Detalhes</button></center></td>
                                
            </tr>
            <tr>
                <td>88888888</td>
                <td>1500.000,00</td>
                <td>100.000,00</td>
                <td>100.000,00</td>
               <td><center><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Detalhes</button></center></td>
                <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                          </div>
                          <div class="modal-body">
                            <p>Some text in the modal.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                
            </tr>
            <tr>
                <td>9999999999</td>
                <td>1500.000,00</td>
                <td>100.000,00</td>
                <td>100.000,00</td>
                <td><center><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Detalhes</button></center></td>
                <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                          </div>
                          <div class="modal-body">
                            <p>Some text in the modal.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                
            </tr>
            <tr>
                <td>1010101010</td>
                <td>1500.000,00</td>
                <td>100.000,00</td>
                <td>100.000,00</td>
                <td><center><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">Detalhes</button></center></td>

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Modal Grande</h4>
                        </div>
                        <div class="modal-body">
                            <p>Conteúdo</p>
                        </div>
                    </div>
                </div>
            </div>
                
            </tr>
            
           
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#tb_imendas').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fa fa-files-o fa-2x text-info"></i>',
                        titleAttr: 'Copy'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o fa-2x text-success"></i>',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-text-o fa-2x text-primary"></i>',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o fa-2x text-danger"></i>',
                        titleAttr: 'PDF'
                    }
                ]
            });
            // Bontão modal detalhes 
            $('.dtl').click(function(){
                var id = 10;
                $.ajax({
                        type: "GET",
                        url: '/resources/views/modal/modal.php',
                        data: 'id='+id,

                        beforeSend: function() {
                            $('#myModal').modal('show');
                            $('#conteudoModal').html('Loadin ...').show();
                        },
                        success: function(dados)
                        {
                            $(".modal-title").html('Realmente deseja deletar este Usuário?');
                            $(".modal-title").show();
                            $('#myModal').modal('show');
                            $("#conteudoModal").html(dados);
                            $("#conteudoModal").show();
                        }
                });

                return false;
            });

        });
    </script>
@endsection