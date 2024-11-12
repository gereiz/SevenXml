@extends('layouts.master-without-nav')
@section('title')
    Dados Importados
@endsection


@section('content')

    <x-page-title title="Dados importados" pagetitle="XML" />

    <div class="w-full flex flex-col">

        <div class="card w-full " id="busca_sv" name="busca_sv">
            <div class="card-body w-full flex">
                <div class="w-full">
                    <div class="w-full">
                        <div class="flex flex-col mb-3">
                            {{-- Dados do Pedido no SV --}}
                            @include('xml.importa_dados.dados_sv')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card w-full " id="busca_sv" name="busca_sv">
            <div class="card-body w-full flex">
                <div class="w-full">
                    <div class="w-full">
                        <div class="flex flex-col mb-3">
                            {{-- Dados do Pedido no XML --}}
                            @include('xml.importa_dados.dados_xml')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card w-full " id="busca_sv" name="busca_sv">
            <div class="card-body w-full flex">
                <div class="w-full">
                    <div class="w-full">
                        <div class="flex flex-col mb-3">
                            {{-- Dados que serão atualizados no SV --}}
                            @include('xml.atualiza_dados')


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full flex justify-center">
            <button data-modal-target="extraLargeModal" type="button" id="btn_pedido_local" class="w-10/12 h-14 my-4 botao-primario text-xl font-bold">
                Atualizar Dados no SV
            </button>


        </div>
    </div>

    <div id="extraLargeModal" modal-center
        class="fixed hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div
            class="w-screen lg:w-[55rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
            <div
                class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h4 class="text-16">Atenção!</h4>
                <button data-modal-close="extraLargeModal"
                    class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500"><i
                        data-lucide="x" class="size-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <h5 class="mb-3 text-16"> os seguintes valores serão atualizados
                    no pedido {{$pedido_sv->pedi_id}}:</h5>
                {{-- lista --}}
                <ul class="list-disc list-inside">
                    <li class="text-14 font-semibold text-red-600">Valor do(s) {{count($savedXmlDet)}} Produto(s)</li>
                    <li class="text-14 font-semibold text-red-600">Valor das {{count($saveXmlCobr)}} duplicatas, {{substr($pedido_sv->pedi_condicao, -2)}} vezes</li>
                </ul>

            </div>
            <div class="flex items-center justify-center p-4 space-x-4 mt-auto border-t border-slate-200 dark:border-zink-500">
                <button type="submit" id="envia-form" name="envia-form" class="w-28 h-14 btn bg-green-500 border-green-500 text-white hover:font-bold hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                    Confirmar
                </button>

                <button data-modal-close="extraLargeModal"
                    class="w-28 h-14 btn bg-red-500 border-red-500 text-white hover:font-bold hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

{{-- @endsection --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#edit-xml-ide').click(function() {
            $('.xml-ide').prop('disabled', false);
        });

        $('#edit-xml-emit').click(function() {
            $('.xml-emit').prop('disabled', false);
        });

        $('#edit-xml-dest').click(function() {
            $('.xml-dest').prop('disabled', false);
        });

        $('#edit-xml-det').click(function() {
            $('.xml-det').prop('disabled', false);
        });

        $('#edit-xml-total').click(function() {
            $('.xml-total').prop('disabled', false);
        });

        $('#edit-xml-transp').click(function() {
            $('.xml-transp').prop('disabled', false);
        });

        $('#edit-xml-cobr').click(function() {
            $('.xml-cobr').prop('disabled', false);
        });

        $('#edit-xml-pag').click(function() {
            $('.xml-pag').prop('disabled', false);
        });



    });

</script>


