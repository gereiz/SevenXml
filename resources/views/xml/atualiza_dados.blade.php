<div class="w-full flex flex-col">
    <div class="flex w-full">
        <div class="flex flex-col w-4/12 mb-4">
            <label for="sv_ped_obs" class="inline-block text-base font-medium">
                Observações
                <span class="text-green-500">*</span>
            </label>
            <input type="text" value="{{$pedido_sv->pedi_condicao}}" id="sv_ped_obs"class="w-10/12 form-input input-form"disabled>
        </div>

        <div class="flex flex-col w-4/12 mb-4">
            <p class="text-lg font-bold">Os valores desse XML serão multiplicados por <span class="text-green-500">{{substr($pedido_sv->pedi_condicao, -2)}}</span> </p>
        </div>
    </div>

    <div class="w-full mb-4" id="atualiza_dados" name="xml_sv">
        <div class="collapsible">
            <button id="btn_ped_sv"
                class="flex text-white collapsible-header group/item btn bg-green-500 border-green-500 hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                Dados que serão atualizados no SV
                <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                    <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                    <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                </div>
            </button>
            <div class="hidden mt-2 mb-0 collapsible-content card">
                <div class="card-body flex justify-around">
                    {{-- Campos no XML --}}
                    <div class="flex flex-col w-5/12 space-y-4 mb-4">
                        {{-- Cria um checkbox para edição dos campos --}}
                        <div class="flex flex-col w-full mb-4">
                            <label for="edit_xml" class="inline-block text-base font-medium">
                                <input type="checkbox" id="edit_xml" class="form-checkbox input-form">
                                Editar Campos
                            </label>
                        </div>
                        <div class="collapsible mb-4">
                            <button id="btn_ped_sv"
                                class="flex text-white collapsible-header group/item btn bg-green-500 border-green-500 hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                                Itens do XML <span class="ms-2 font-bold">{{count($savedXmlDet)}}</span>
                                <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                                    <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                                    <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                                </div>
                            </button>
                            <div class="hidden mt-2 mb-0 collapsible-content card border border-green-200 max-h-[25rem] overflow-auto">
                                <div id="itens_pedido" class="card-body flex flex-col">

                                    @foreach ($savedXmlDet as $item)

                                        <div class="flex flex-col w-full mb-4">
                                            <label for="xml_prod_nome" class="inline-block text-base font-medium">
                                                Nome do Produto
                                                <span class="text-green-500">*</span>
                                            </label>
                                            <input type="text" value="{{$item->produto}}" id="xml_prod_nome" name="xml_prod_nome" class="form-input input-form edit-xml-prod" disabled>
                                        </div>

                                        <div class="flex flex-col w-full mb-4">
                                            <label for="xml_prod_nome" class="inline-block text-base font-medium">
                                                Cód do Produto
                                                <span class="text-green-500">*</span>
                                            </label>
                                            <input type="text" value="{{$item->c_prod}}" id="xml_prod_cod" name="xml_prod_cod" class="form-input input-form edit-xml-prod" disabled>
                                        </div>

                                        <div class="flex flex-col w-full mb-4">
                                            <label for="xml_prod_vlr" class="inline-block text-base font-medium">
                                                Preço do Produto
                                                <span class="text-green-500">*</span>
                                            </label>
                                            <input type="text" value="{{formatReal($item->v_prod / $item->q_comp)}}" id="xml_prod_vlr" name="xml_prod_vlr" class="form-input input-form edit-xml-prod" disabled>
                                        </div>

                                        <div class="flex flex-col w-full mb-4">
                                            <label for="xml_prod_qtde" class="inline-block text-base font-medium">
                                                Quantidade
                                                <span class="text-green-500">*</span>
                                            </label>
                                            <input type="text" value="{{$item->q_comp}}" id="xml_prod_qtde" name="xml_prod_qtde" class="form-input input-form edit-xml-prod" disabled>
                                        </div>

                                        <div class="flex flex-col w-full mb-4">
                                            <label for="xml_prod_ipi" class="inline-block text-base font-medium">
                                                IPI (Produto)
                                                <span class="text-green-500">*</span>
                                            </label>
                                            <input type="text" value="{{formatReal($item->v_ipi)}}" id="xml_prod_ipi" name="xml_prod_ipi" class="form-input input-form edit-xml-prod" disabled>
                                        </div>

                                        <div class="flex flex-col w-full mb-6">
                                            <label for="xml_prod_vlr_total" class="inline-block text-base font-medium">
                                                Valor Total dos Produtos
                                                <span class="text-green-500">*</span>
                                            </label>
                                            <input type="text" value="{{formatReal($item->v_prod)}}" id="xml_prod_vlr_total" name="xml_prod_vlr_total" class="form-input input-form edit-xml-prod"disabled>
                                        </div>

                                        {{-- cria uma linha horizontal --}}
                                        <hr class="w-full border-2 border-green-200 mb-10">
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="collapsible mb-4">
                            <button id="btn_ped_sv"
                                class="flex text-white collapsible-header group/item btn bg-green-500 border-green-500 hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                                Duplicatas do XML <span class="ms-2 font-bold">{{count($saveXmlCobr)}}</span>
                                <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                                    <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                                    <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                                </div>
                            </button>
                            <div class="hidden mt-2 mb-0 collapsible-content card border border-green-200 max-h-[12rem] overflow-auto">
                                <div id="itens_pedido" class="card-body flex flex-col">
                                    @foreach ($saveXmlCobr as $dup)
                                        <div class="flex flex-col w-full mb-4">
                                            <label for="xml_vlr_dup" class="inline-block text-base font-medium">
                                                Valor da Duplicata
                                                <span class="text-green-500">*</span>
                                            </label>
                                            <input type="text" value="{{formatReal($dup->v_dup)}}" id="xml_vlr_dup" name="xml_vlr_dup" class="form-input input-form edit-xml-dup" disabled>
                                        </div>

                                        <div class="flex flex-col w-full mb-10">
                                            <label for="xml_dup_venc" class="inline-block text-base font-medium">
                                                Vencimento
                                                <span class="text-green-500">*</span>
                                            </label>
                                            <input type="text" value="{{formatDate($dup->d_venc)}}" id="xml_dup_venc" name="xml_dup_venc" class="form-input input-form edit-xml-dup" disabled>
                                        </div>

                                    @endforeach

                                </div>
                            </div>
                        </div>


                        <div class="flex flex-col w-full">
                            <label for="xml_ipi_total" class="inline-block text-base font-medium">
                                Valor IPI Total
                                <span class="text-green-500">*</span>
                            </label>
                            <input type="text" value="{{$savedXmlTotal->v_ipi}}" id="xml_ipi_total" name="xml_ipi_total" class="form-input input-form edit-xml-total" disabled>
                        </div>

                        <div class="flex flex-col w-full">
                            <label for="xml_vlr_nf" class="inline-block text-base font-medium">
                                Valor Total dos Produtos
                                <span class="text-green-500">*</span>
                            </label>
                            <input type="text" value="{{formatReal($savedXmlTotal->v_nf - $savedXmlTotal->v_ipi)}}" id="xml_vlr_nf" name="xml_vlr_nf" class="form-input input-form edit-xml-total" disabled>
                        </div>

                        <div class="flex flex-col w-full">
                            <label for="xml_vlr_nf" class="inline-block text-base font-medium">
                                Valor Total da NF
                                <span class="text-green-500">*</span>
                            </label>
                            <input type="text" value="{{formatReal($savedXmlTotal->v_nf)}}" id="xml_vlr_nf" name="xml_vlr_nf" class="form-input input-form edit-xml-total" disabled>
                        </div>

                    </div>

                    {{-- Campos no SV --}}
                    <div class="flex flex-col w-5/12 space-y-4 mb-4">
                        <div class="collapsible mb-4">
                            <button id="btn_ped_sv"
                                class="flex text-white collapsible-header group/item btn bg-green-500 border-green-500 hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                                Itens do Pedido <span class="ms-2 font-bold">{{count($pedido_sv->pedi_itens)}}</span>
                                <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                                    <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                                    <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                                </div>
                            </button>
                            <div class="hidden mt-2 mb-0 collapsible-content card border border-green-200 max-h-[28rem] overflow-auto">
                                <div id="itens_pedido" class="card-body flex flex-col">
                                    {{-- Cria um checkbox para edição dos campos --}}
                                    {{-- <div class="flex flex-col w-full mb-4">
                                        <label for="edit_sv" class="inline-block text-base font-medium">
                                            <input type="checkbox" id="edit_sv" class="form-checkbox input-form mb-10">
                                            Editar Campos
                                        </label>
                                    </div> --}} ''

                                    <form id="form-dados">
                                        {{-- @csrf --}}
                                        @foreach ($pedido_sv->pedi_itens as $item)

                                            @foreach ($produtos as $produto)
                                                @if($produto['codigo'] == $item->peit_prod_id)
                                                    <div class="flex flex-col w-full mb-4">
                                                        <label for="sv_prod_nome" class="inline-block text-base font-medium">
                                                            Desrição do Produto
                                                            <span class="text-green-500">*</span>
                                                        </label>
                                                        <input type="text" value="{{$produto['nome']}}" id="sv_prod_nome"class="form-input input-form sv_prod" disabled>
                                                    </div>

                                                    <div class="flex flex-col w-full mb-4">
                                                        <label for="sv_prod_id" class="inline-block text-base font-medium">
                                                            Cód do Produto
                                                            <span class="text-green-500">*</span>
                                                        </label>
                                                        <input type="text" value="{{$produto['referencia']}}" id="sv_prod_id" class="form-input input-form sv_prod" disabled>
                                                    </div>

                                                @endif

                                            @endforeach


                                            <div class="flex flex-col w-full mb-4">
                                                <label for="sv_prod_preco" class="inline-block text-base font-medium">
                                                    Preço do Produto
                                                    <span class="text-green-500">*</span>
                                                </label>
                                                <input type="text" value="{{formatReal($item->peit_preco)}}" id="sv_prod_preco"class="form-input input-form sv_prod" disabled>
                                            </div>

                                            <div class="flex flex-col w-full mb-4">
                                                <label for="sv_prod_qtde" class="inline-block text-base font-medium">
                                                    Quantidade
                                                    <span class="text-green-500">*</span>
                                                </label>
                                                <input type="text" value="{{$item->peit_qtde}}" id="sv_prod_qtde"class="form-input input-form sv_prod" disabled>
                                            </div>

                                            <div class="flex flex-col w-full mb-4">
                                                <label for="sv_prod_ipi" class="inline-block text-base font-medium">
                                                    IPI (Produto)
                                                    <span class="text-green-500">*</span>
                                                </label>
                                                <input type="text" value="{{formatReal($item->peit_ipi)}}" id="sv_prod_ipi"class="form-input input-form sv_prod" disabled>
                                            </div>

                                            <div class="flex flex-col w-full mb-6">
                                                <label for="sv_prod_total" class="inline-block text-base font-medium">
                                                    Valor Total dos Produtos
                                                    <span class="text-green-500">*</span>
                                                </label>
                                                <input type="text" value="{{formatReal($item->peit_preco  * $item->peit_qtde)}}" id="sv_prod_total" class="form-input input-form sv_prod" disabled>
                                            </div>

                                            {{-- cria uma linha horizontal --}}
                                            <hr class="w-full border-2 border-green-200 mb-10">

                                        @endforeach

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="collapsible mb-4">
                            <button id="btn_ped_sv"
                                class="flex text-white collapsible-header group/item btn bg-green-500 border-green-500 hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                                Duplicatas do SV <span class="ms-2 font-bold">{{count($pedido_sv->pedi_parcelas_recebimento)}}</span>
                                <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                                    <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                                    <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                                </div>
                            </button>
                            <div class="hidden mt-2 mb-0 collapsible-content card border border-green-200 max-h-[12rem] overflow-auto">
                                <div id="itens_pedido" class="card-body flex flex-col">
                                    @foreach ($pedido_sv->pedi_parcelas_recebimento as $dup)
                                        <div class="flex flex-col w-full mb-4">
                                            <label for="sv_dup_vlr" class="inline-block text-base font-medium">
                                                Valor da Duplicata
                                                <span class="text-green-500">*</span>
                                            </label>
                                            <input type="text" value="{{formatReal($dup->pepa_valor)}}" id="sv_dup_vlr"class="form-input input-form sv_dup" disabled>
                                        </div>

                                        <div class="flex flex-col w-full mb-10">
                                            <label for="sv_dup_data" class="inline-block text-base font-medium">
                                                Vencimento
                                                <span class="text-green-500">*</span>
                                            </label>
                                            <input type="text" value="{{formatDate($dup->pepa_data)}}" id="sv_dup_data"class="form-input input-form sv_dup" disabled>
                                        </div>


                                    @endforeach

                                </div>
                            </div>
                        </div>


                        <div class="flex flex-col w-full">
                            <label for="sv_nf_ipi" class="inline-block text-base font-medium">
                                Valor Total (Produtos + IPI)
                                <span class="text-green-500">*</span>
                            </label>
                            <input type="text" value="-" id="sv_nf_ipi" class="form-input input-form sv_nf"disabled>
                        </div>

                        <div class="flex flex-col w-full">
                            <label for="sv_nf_total" class="inline-block text-base font-medium">
                                Valor Total da NF
                                <span class="text-green-500">*</span>
                            </label>
                            <input type="text" value="-" id="sv_nf_total" class="form-input input-form sv_nf" disabled>
                            <input type="text" value="{{$pedido_sv->pedi_id}}" id="sv_id_pedido" class="hidden" disabled>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('#edit_xml').click(function(){
            if($(this).is(':checked')){
                $('.edit-xml-prod').prop('disabled', false);
                $('.edit-xml-dup').prop('disabled', false);
                $('.edit-xml-total').prop('disabled', false);
            }else{
                $('.edit-xml-prod').prop('disabled', true);
                $('.edit-xml-dup').prop('disabled', true);
                $('.edit-xml-total').prop('disabled', true);
            }
        });

        $('#envia-form').click(function() {

            // desabilita o botão para evitar cliques duplos
            // $(this).prop('disabled', true);

            // muda a cor do botão
            $(this).removeClass(['bg-green-500', 'hover:bg-green-600', 'focus:bg-green-600', 'active:bg-green-600']);
            $(this).addClass('bg-gray-800');

            // muda o texto do botão
            $(this).text('Enviando...');

            // desabilita o evento de submit do form
            $('#form-dados').submit(function(e) {
                e.preventDefault();
            });

            // cria um array para armazenar os dados
            var dados = {};
            var listaProdutos = {};
            var listaDuplicatas = {};
            var listaTotal = {};
            var listaXml = {};
            var i = 0;
            var obs = $('#sv_ped_obs').val();
            var pedId = $('#sv_id_pedido').val();

            // percorre os campos dos produtos
            $('.edit-xml-prod').each(function(){
                // cria um objeto para armazenar os dados
                var obj = {
                    [$(this).attr('id')]: $(this).val()

                };

                // inclui o produto no objeto dados
                dados = {...dados, ...obj};
                console.log(dados);             //Georgie
                if(Object.keys(dados).length == 6){
                    listaProdutos[i] = {...listaProdutos[i], ...dados};
                    dados = {};
                    i++;
                }

            // console.log(listaProdutos);
            });


            // percorre os campos das duplicatas
            $('.edit-xml-dup').each(function(){
                // cria um objeto para armazenar os dados
                var obj = {
                    [$(this).attr('id')]: $(this).val()

                };

                // inclui a duplicata no objeto dados
                dados = {...dados, ...obj};

                if(Object.keys(dados).length == 2){
                    listaDuplicatas[i] = {...listaDuplicatas[i], ...dados};
                    dados = {};
                    i++;
                }
            });

            // percorre os campos do total
            $('.edit-xml-total').each(function(){
                // cria um objeto para armazenar os dados
                var obj = {
                    [$(this).attr('id')]: $(this).val()

                };

                // inclui o total no objeto dados
                dados = {...dados, ...obj};

                if(Object.keys(dados).length == 2){
                    listaTotal[i] = {...listaTotal[i], ...dados};
                    dados = {};
                    i++;
                }
            });

            listaXml = {
                'xml_produtos': listaProdutos,
                'xml_duplicatas': listaDuplicatas,
                'xml_total': listaTotal,
                'obs' : obs,
                'ped_id' : pedId
            };



            // envia os dados por ajax

            $.ajax({
                // url: $('#form-dados').attr('action'),
                url: "{{route('atualiza.dados')}}",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: listaXml,
                // processData: false,
                // contentType: false,
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: 'Dados atualizados com sucesso!',
                    }).then((result) => {

                        window.location.href = "{{url('/xml')}}";
                    });
                },
                error: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: 'Erro ao atualizar os dados!',
                    });
                }
            });



        });
    });
</script>
