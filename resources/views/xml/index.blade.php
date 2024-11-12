@extends('layouts.master')
@section('title')
    XML
@endsection
@section('content')

<div id="page">
    <x-page-title title="Importar XML" pagetitle="XML" />

    <div class="w-full flex flex-col">
        <form action="#" method="POST" enctype="multipart/form-data">>
            @csrf
            <div class="card w-full " id="busca_sv" name="busca_sv">
                <div class="card-body w-full flex">
                    <div class="w-6/12">
                        <div class="w-full">
                            <div class="flex flex-col mb-3">
                                <label for="num_pedido_sv" class="inline-block mb-2 text-base font-medium">
                                    Número do Pedido SV
                                    <span class="text-red-500">*</span>
                                </label>

                                <div class="w-6/12 flex space-x-4 mb-3 h-12">
                                    <input type="number" id="pedido_sv" name="pedido_sv" class="form-input input-form">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="w-6/12" id="busca_local" name="busca_local">
                        <h6 class="mb-4 text-15">Importar XML</h6>

                        <input
                            type="file" id="xml" name="xml" accept=".xml"
                            class="cursor-pointer form-file form-file-sm border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                        >
                    </div>

                </div>

            </div>

            <div class="w-full flex justify-center">
                <button type="button" id="btn_pedido_local" class="w-10/12 h-14 my-4 botao-primario text-xl font-bold">
                    Carregar os dados para edição
                </button>
            </div>
        </form>
    </div>

</div>

@endsection

@push('scripts')
    {{-- <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-file-upload.init.js') }}"></script> --}}
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>


@endpush

{{-- JQuery --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('#btn_pedido_local').click(function() {
            var pedido_sv = $('#pedido_sv').val();

            // pega o arquivo do input
            var xml = $('#xml').prop('files')[0];

            var formData = new FormData();

            formData.append('pedido_sv', pedido_sv);
            formData.append('xml', $('#xml').prop('files')[0]);


            if (pedido_sv == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Informe o número do pedido SV!',
                });
            } else if ($('#xml').val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Selecione o arquivo XML!',
                });
            } else {


            // desabilita o botão para evitar cliques duplos
            $(this).prop('disabled', true);

            // muda o texto do botão
            $(this).text('Aguarde...');


                $.ajax({
                url: "{{url('importaDados')}}",
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: formData,
                processData: false,
                contentType: false,
                    success: function(res) {

                        if (res) {
                            Swal.fire({
                            icon: 'success',
                            title: 'Sucesso!',
                            text: 'Pedido Localizado no Suas Vendas!',
                            }).then((result) => {
                                // exibe a view importaDados passando a resposta
                                $('#page').html(res);

                            });
                        }
                    },
                    error: function(res) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Erro ao localizar o pedido no Suas Vendas!',
                        }).then((result) => {
                            $(this).text('Carregar os dados para edição');
                            console.log(res);
                        });
                    }
                });

            }
        });


    });


</script>




