
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{asset('css/materialize/materialize/css/materialize.min.css')}}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
        .no-padding{
            padding : 0 !important;
        }
        .no-margin{
            margin: 0 !important;
        }
      </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class=" col s8 offset-s2">
                    <ul class="collapsible" id="produto_list" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header">
                                <div class="row no-margin">
                                    <div class="col s1">
                                        <i class="material-icons">filter_drama</i>
                                    </div>
                                    <div class="col s2">
                                        nome
                                    </div>
                                    <div class="col s6">
                                        decrição
                                    </div>
                                    <div class="col s1">
                                        preço
                                    </div>
                                    <div class="col s1">
                                        qtd
                                    </div>
                                    <div class="col s1">
                                        ativo
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-body">
                                <form class="row">
                                    <input type="hidden" name="id" value="" />
                                    <div class="col s6">
                                        <input type="text" name="nome" placeholder="Nome" />
                                    </div>
                                    <div class="col s6">
                                        <input type="text" name="desc" placeholder="Descrição" />
                                    </div>
                                    <div class="col s4">
                                        <input type="text" name="preco" placeholder="Preço" />
                                    </div>
                                    <div class="col s4">
                                        <input type="number" name="qtd" placeholder="Quantidade" />
                                    </div>
                                    <div class="col s4">
                                        Ativo
                                        <!-- Switch -->
                                        <div class="switch">
                                            <label>
                                            Off
                                            <input type="checkbox">
                                            <span class="lever"></span>
                                            On
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col s5">
                                        <a class="waves-effect waves-light btn">button</a>
                                        <a class="waves-effect red waves-light btn"><i class="material-icons">mode_edit</i></a>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>    
        </div>      

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="{{asset('js/jquery/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('css/materialize/materialize/js/materialize.min.js')}}"></script>
        <script>
        $(document).ready( function () {
            getProdutos();
            $('.collapsible').collapsible();
        });
        function getProdutos(){
            $.ajax({
                type: "GET",
                url: "{{url('/produto')}}",
                dataType: 'json',
                success: function(data) {
                    $('#produto_list').empty();
                    $.each(data, function(i, produto) {
                        //alert(produto.product_name);
                        var isActive = null;
                        if(produto.is_active == 1){
                            isActive = "checked";
                        }
                        var nome = produto.product_name;
                        var desc;
                        var price;
                        var amount;
                        var is_active;
                        if(produto.product_description == 'null'){
                            desc = "";
                        }else{
                            desc = produto.product_description;
                        }
                        if(produto.product_price == 'null'){
                            price = "";
                        }else{
                            price = produto.product_price;
                        }
                        if(produto.product_amount == 'null'){
                            priamountce = "";
                        }else{
                            amount = produto.product_amount;
                        }
                        if(produto.is_active == 'null'){
                            is_active = "";
                        }else{
                            is_active = produto.is_active;
                        }
                        

                        var toAppend = '<li>'  + 
 '                               <div class="collapsible-header">  '  + 
 '                                   <div class="row no-margin">  '  + 
 '                                       <div class="col s1">  '  + 
 '                                           <i class="material-icons">filter_drama</i>  '  + 
 '                                       </div>  '  + 
 '                                       <div class="col s2">  '  + 
 '                                           '+ produto.product_name + 
 '                                       </div>  '  + 
 '                                       <div class="col s6">  '  + 
 '                                           '+ desc  +
 '                                       </div>  '  + 
 '                                       <div class="col s1">  '  + 
 '                                           '+ price  +
 '                                       </div>  '  + 
 '                                       <div class="col s1">  '  + 
 '                                           '+ amount  +
 '                                       </div>  '  + 
 '                                       <div class="col s1">  '  + 
 '                                           '+ is_active  +
 '                                       </div>  '  + 
 '                                   </div>  '  + 
 '                               </div>  '  + 
 '                               <div class="collapsible-body">  '  + 
 '                                   <form class="row" action="#" id="form-'+produto.id_product+'">  '  + 
 '                                       <input type="hidden" name="id" value="'+produto.id_product+'" />  '  + 
 '                                       <div class="col s6">  '  + 
 '                                           <input type="text" name="nome-'+produto.id_product+'" placeholder="Nome" value="'+produto.product_name+'" />  '  + 
 '                                       </div>  '  + 
 '                                       <div class="col s6">  '  + 
 '                                           <input type="text" name="desc-'+produto.id_product+'" placeholder="Descrição" value="'+produto.product_description+'" />  '  + 
 '                                       </div>  '  + 
 '                                       <div class="col s4">  '  + 
 '                                           <input type="text" name="preco-'+produto.id_product+'" placeholder="Preço" value="'+produto.product_price+'" />  '  + 
 '                                       </div>  '  + 
 '                                       <div class="col s4">  '  + 
 '                                           <input type="number" name="qtd-'+produto.id_product+'" placeholder="Quantidade" value="'+produto.product_amount+'" />  '  + 
 '                                       </div>  '  + 
 '                                       <div class="col s4">  '  + 
 '                                           Ativo  '  + 
 '                                           <!-- Switch -->  '  + 
 '                                           <div class="switch">  '  + 
 '                                               <label>  '  + 
 '                                               Off  '  + 
 '                                               <input type="checkbox" name="is-active-'+produto.id_product+'" '+isActive+'>  '  + 
 '                                               <span class="lever"></span>  '  + 
 '                                               On  '  + 
 '                                               </label>  '  + 
 '                                           </div>  '  + 
 '                                       </div>  '  + 
 '                                       <div class="col s5">  '  + 
 '                                           <a class="waves-effect waves-light btn" onclick="updateProduto('+produto.id_product+')">salvar</a>  '  + 
 '                                           <a class="waves-effect red waves-light btn"><i class="material-icons">mode_edit</i></a>  '  + 
 '                                       </div>  '  + 
 '                                   </form>  '  + 
 '                               </div>  '  + 
 '                          </li> ';
                       $('#produto_list').append(toAppend);
                    });
                },
            });
        }
        function updateProduto(id){
            alert($("input[name=preco-"+id+"]").val());
            $.ajax({
                type: "POST",
                url: "{{url('/produto/update/')}}/"+id,
                data : {
                    product_name : $("input[name=nome-"+id+"]").val(),
                    product_description : $("input[name=desc-"+id+"]").val(),
                    product_price : $("input[name=preco-"+id+"]").val(),
                    product_amount : $("input[name=qtd-"+id+"]").val(),
                    is_active : $("input[name=is-active-"+id+"]").val(),
                },
                dataType: 'json',
                success: function(data) {
                    alert(data);
                }
            });
        }
        </script>
    </body>
  </html>