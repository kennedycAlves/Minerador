@extends('layouts.appuser', ["current" => "clientes"])

@section('body')

  


<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Lista de Clientes</h5>
        @if(isset($clts))
        
            <table class="table table-ordered table-hover ml-3">
                <thead>
                    <tr>    
                        
                        <th>Nome</th>
                        <th>CNPJ</th>
                                               
                    </tr>
                </thead>
                <tbody>
                                                          
                    <tr>
                         
                         <td>{{ $clts->nome }}</td>
                         <td>{{ $clts->cnpj }}</td>
                         <td>                                                                                              
                            <a href="/clientes/autoeditar/{{ Auth::user()->id }}" class="btn btn-sm btn-primary">Editar</a> 
                         </td>
                        
                    </tr>        
                </tbody>
            </table>
            
        <div class='container'>
            
            <div class="alert alert-primary mb-1 ml-0" role="alert">
                Visualização e Edição de áreas de interesse e chaves de buscas
            </div>
            <div class="row">
              
                <div class="form-group">
                    
                    @foreach($clts->areaInteresse as $key1 => $listaCltsArea)
                    {{--  <form>  --}}
                    <form action="/autoedit/save/{{$clts->id }}/{{$listaCltsArea->id}}" method="POST">
                        @csrf
                        <div class="card-group ml-2 my-3">
                            <div class="card">
                                <div class="card-body">                       
                                    <div class="alert alert-dark mb-1" role="alert">
                                        Área Interesse:
                                    </div> 
                                    <input type="text" class="form-control interesse" name="nome_interesse" id="nome_interesse" value="{{ $listaCltsArea->nome_interesse }}">
                                     
                                    <div class="alert alert-dark mt-4 mb-1" role="alert">
                                        Chaves de Buscas
                                    </div> 
                                    @foreach($listaCltsArea->chaveBuscaArea as $key => $listaCltsAreaChaves)
                                    
                                        <input type="text" class="form-control chave" name="nome_chave{{$key}}" id="nome_chave{{$key}}" value="{{ $listaCltsAreaChaves->nome_chave }}">  
                                                                    
                                    @endforeach
                                    <div class="form-check mt-3 ">
                                        @if($listaCltsArea->mineracao == "on")
                                             <input type="checkbox" class="onoffswitch-checkbox" id="inline"  name="mineracao" checked> 
                                        @elseif($listaCltsArea->mineracao != "on")                                            
                                            <input type="checkbox" class="onoffswitch-checkbox" id="inline"  name="mineracao"> 
                                        @endif   
                                        <label class="form-check-label" for="defaultCheck1">
                                        Habilitar mineração
                                        </label>
                                    </div> 
                                    {{--  <button  type="button" class="btn btn-primary mt-1 ml-3 mt-3 salvar" id="salvar" >Salvar</button>  --}}
                                    <button  type="submit" class="btn btn-primary mt-1 ml-3 mt-3 salvar" id="salvar"  >Salvar</button>
                                    <button type="cancel" class="btn btn-danger mt-3" id="excluir">Cancelar</button> 
                                    
                                   
                                </div>
                            </div>
                        </div>    
                           
                    </div>
                </form>       
                                        
                    @endforeach
                        
             </div>
             {{--  <button  type="button" class="btn btn-primary mt-1 ml-3 mt-3 listar" id="listar" data-toggle="modal" data-target="#myModal" >listar</button>  --}}
             <button  type="button" class="btn btn-link ml-3 mt-3 btn-lg" id="listar"></button>
             <button  type="button" class="btn btn-sencondary ml-1 mt-3 btn-lg" id="reloadLista">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                </svg>
            </button>
            <div class="spinner-border spinner-border-lg text-primary" role="status" style="display:none">
                
            </div>
            
                                   
        </div>   
    </div>   

   

        @endif 
     
</div>

    <div class="modal fade" id="myModal">
        <<div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Licitações mineradas com base nas chaves de buscas configuradas</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <p class="text-right"></p>
                    Estados:
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected value="todos">Todos</option>
                        {{--  <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>  --}}
                      </select>        
                    <table class="table table-ordered table-hover ml-3 licita">
                        <thead>
                            <tr>         
                                <th>Área de interesse</th>
                                <th>Órgão Licitante</th>
                                <th>Tipo de edital</th>
                                <th>Edital</th>
                                <th>UASG</th>
                                <th>Objeto</th>
                                <th>Estado</th>
                                <th>Abertura</th>
                                <th>Entrega</th>
                                <th>Link de acesso</th>
                    
                            </tr>
                        </thead>
                        <tbody>
                                  
                        </tbody>
                        
                    </table>
                    <div class="d-flex teste justify-content-center">
                        <div class="spinner-border teste" role="rulr" display="none">
                          <span class="sr-only">Loading...</span>
                        </div>
                      </div>  
                    <nav id="paginationNav">
                        <ul class="pagination justify-content-end">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>   

    

            
       

@endsection       
       

@section('jstop')
    <script type="text/javascript">
        $('.spinner-border').hide();
    </script>


@endsection



@section('js')


    <script type="text/javascript">

                

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $('#listar').click(function(){

            $('.modal').modal('show');
            $('[data-toggle="popover"]').popover();
            
            
        
        });

        {{--  $('.page-link').click(function(){
            $('.modal').modal('hide');
            $('.modal').modal('show');
            $('[data-toggle="popover"]').popover();
            
        
        });  --}}


    
    
        $(document).ready(function(){
            $('#inline').click(function(){
                
                if(!$(this).is('checked')){
                    $(this).val("on")      
                }
                else{
                    $(this).val("off")

                }
            
            });
        });

        function montarLinha(objeo) {
            
            var linha = "<tr>" +
                "<td>" + objeo.nome_interesse + "</td>" + 
                "<td>" + objeo.orgao + "</td>" +
                "<td>" + objeo.tipo_edital + "</td> "+
                "<td>" + objeo.edital + "</td>" +
                "<td>" + objeo.uasg + "</td>" +
                '<td><button type="button" class="btn btn-secondary btn-popover btn-sm" data-toggle="popover"  data-content="'+objeo.objeto+'">Visualizar..</button></td>' +
                "<td>" + objeo.estado + "</td>" +
                "<td>" + objeo.data_abertura + "</td>" +
                "<td>" + objeo.entrega + "</td>" +
                "<td><a href="+objeo.link+" type='button' class='btn btn-sm btn-success' target='_blank' rel='noopener noreferrer'>Acessar</a></td>" +
                "<td>" +
                '<button class="btn btn-sm btn-danger" onclick="remover(' + objeo.id + ')"> Apagar </button> ' +
                "</td>" +
                "</tr>";
                
                
            return linha;
        }

        function montarLinhaSelect(data){
            
            
            var linha = "<option value="+data.estado+">"+data.estado+"</option>";
            return linha;
           
        }

        function limpaSelect(){

            var estados = [];
            $('.form-select>option').each(function(i, value){

                {{--  console.log(value.value);  --}}
                
                estados.push(value.value);


            });

            $('.form-select>option').remove();

            
            var arrayLimpo = estados.filter(function(este, i) {
                return estados.indexOf(este) === i;
                
            });
            
           
            
            for(i=0; i<=arrayLimpo.length; i++){

                var linha = "<option value="+arrayLimpo[i]+">"+arrayLimpo[i]+"</option>";

                $('.form-select').append(linha);

                {{--  console.log(arrayLimpo[i]);  --}}

            
 

            }
            $(".form-select option[value='undefined']").remove();
        }
           

           

        function getNextItem(data) {
          
            $(".licita>tbody>tr").remove();
            $('.form-select>option').remove();
            i = data.current_page+1;
            if (data.current_page == data.last_page) 
                s = '<li class="page-item disabled">';
            else
               
                s = '<li class="page-item">';
            s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">Próximo</a></li>';
                
            return s;
        }

        function getPreviousItem(data) {
            
            $(".licita>tbody>tr").remove();
            $('.form-select>option').remove();
            i = data.current_page-1;
            if (data.current_page == 1) 
                s = '<li class="page-item disabled">';
            else
                s = '<li class="page-item">';
            s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">Anterior</a></li>';
               
            return s;
        }

        function getItem(data, i) {
            $(".licita>tbody>tr").remove();
            $('.form-select>option').remove();
            
           
            
            if (data.current_page == i) 
                s = '<li class="page-item active">';
            else
                s = '<li class="page-item">';
            s += '<a class="page-link" ' + 'pagina="'+i+'" ' + ' href="javascript:void(0);">' + i + '</a></li>';
               
      
            return s;
        }

        function montarPaginator(data) {
    
            $("#paginationNav>ul>li").remove();
    
            $("#paginationNav>ul").append(
                getPreviousItem(data)
            );
            // for (i=1;i<=data.last_page;i++) {
            //     $("#paginationNav>ul").append(
            //         getItem(data,i)
            //     );
            // }
            
            n = 2;
            
            if (data.current_page - n/2 <= 1)
                inicio = 1;
            else if (data.last_page - data.current_page < n)
                inicio = data.last_page - n + 1;
            else 
                inicio = data.current_page - n/2;
            
            fim = inicio + n-1;
    
            for (i=inicio;i<=fim;i++) {
                $("#paginationNav>ul").append(
                    getItem(data,i)
                );
            }
            $("#paginationNav>ul").append(
                getNextItem(data)
            );
        }

        function montarTabela(data) {
            $('.teste').show();
            window.setTimeout(function() {
                $('.teste').hide();
                $(".licita>tbody>tr").remove();
                
                for(i=0;i<data.data.length;i++){
                    linha = montarLinha(data.data[i]);
                    $('.licita>tbody').append(linha);
                    $('[data-toggle="popover"]').popover();
                    

                }
            },2000);
        }

        function montarTabelaselect(data) {

            $('.teste').show();
            window.setTimeout(function() {
                $('.teste').hide();
                $(".licita>tbody>tr").remove();
                
                for(i=0;i<data.length;i++){
                    linha = montarLinha(data[i]);
                    $('.licita>tbody').append(linha);
                    $('[data-toggle="popover"]').popover();
                    

                }
            },2000);
            
        }

        function montarSelect(data){

            $('.form-select').append("<option selected value='Todos'>Todos</option>");
            var estados = [];
            for(i=0;i<data.data.length;i++){

                
                linha = montarLinhaSelect(data.data[i]);
                $('.form-select').append(linha);
                

            }
           


        }


            function carregarClientes(pagina) {

                

                $.get('/licitacoes/{{$clts->id}}',{page: pagina}, function(resp) {
                 
                    montarTabela(resp);
                    montarPaginator(resp);
                    montarSelect(resp);
                    limpaSelect();
                    {{--  limpaSelect1();  --}}
                    $("#paginationNav>ul>li>a").click(function(){
                        // console.log($(this).attr('pagina') );
                        carregarClientes($(this).attr('pagina'));
                    });
                
                    
                    
                    $('.form-select').change(function(){
                        $(".licita>tbody>tr").remove();
                        var opcao = $(this).val();
                        if(opcao == "Todos"){

                            montarTabela(resp);

                            
                        }else{

                            var  returnData = $.grep(resp.data, function(selecao) {

                                return(selecao.estado == opcao+" ");

                            });

                            montarTabelaselect(returnData);


                        }

                
                    });


                    $(".text-right").html("(" + resp.from + " / " + resp.to +  ")" );
                        
                    $("#listar").html(resp.total +" Licitações mineradas");
                    

                        
                });    

            }


            $('#reloadLista').click(function(){

                $(this).hide();
                $("#listar").hide();
                $('.spinner-border').show();
                window.setTimeout(function() {
                    $('.teste').hide();

                    $.get('/licitacoes/{{$clts->id}}', function(resp) {


                        $("#listar").html(resp.total +" Licitações mineradas");
                        $("#listar").show();
                        $('.spinner-border').hide();
                        $('#reloadLista').show();

                    });

                },2000);

            });

        {{--  $.ajax({
        
            url : '/licitacoes/'+{{$clts->id}},
            type: "GET",
            dataType: "json",
            success: function(data){
                console.log(data)
                montarPaginator(data);
                
                
                for(i=0;i<data.data.length;i++){
                    linha = montarLinha(data.data[i]);
                    $('.licita>tbody').append(linha);
                    

                }
            },
            error: function(erro){
                console.log(erro);
            }  
        });  --}}

       

        $(function(){
            carregarClientes(1);
           
           

  
        });
        

    </script>
       
       
       



 

            






@endsection

