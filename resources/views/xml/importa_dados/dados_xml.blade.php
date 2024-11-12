<div class="w-full mb-4" id="xml_sv" name="xml_sv">
    <div class="collapsible">
        <button id="btn_ped_sv"
            class="flex text-white collapsible-header group/item btn bg-amber-500 border-amber-500 hover:text-white hover:bg-amber-600 hover:border-amber-600 focus:text-white focus:bg-amber-600 focus:border-amber-600 focus:ring focus:ring-amber-100 active:text-white active:bg-amber-600 active:border-amber-600 active:ring active:ring-amber-100 dark:ring-amber-400/20">
            Dados do Pedido no XML
            <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
            </div>
        </button>
        <div class="hidden mt-2 mb-0 collapsible-content card">
            <div class="card-body flex flex-col">
                <div class="flex w-full justify-between mb-4">
                    <div class="flex flex-col w-5/12">
                        <label for="ped_forn" class="inline-block mb-2 text-base font-medium">
                            Fornecedor
                            <span class="text-amber-500">*</span>
                        </label>
                        <input type="text" value="{{$savedXmlEmit->nome}}" id="ped_forn"class="form-input input-form"disabled>
                    </div>

                    <div class="flex flex-col w-5/12">
                        <label for="ped_cli" class="inline-block mb-2 text-base font-medium">
                            Cliente
                            <span class="text-amber-500">*</span>
                        </label>
                        <input type="text" value="{{$savedXmlDest->nome}}" id="ped_cli"class="form-input input-form"disabled>
                    </div>
                </div>


                {{-- Primeira Linha --}}
                <div class="w-full flex flex-col">
                    <div class="w-full flex flex-col sm:flex-row md:flex-row lg:flex-row xl:flex-row">

                        {{-- identificaçao --}}
                        @include('xml.importa_dados.pedxml.identificacao')

                        {{-- Emitente --}}
                        @include('xml.importa_dados.pedxml.emitente')

                        {{-- Destinatário --}}
                        @include('xml.importa_dados.pedxml.destinatario')

                        {{-- Detalhes --}}
                        @include('xml.importa_dados.pedxml.detalhes')

                        {{-- Total --}}
                        @include('xml.importa_dados.pedxml.total')

                        {{-- transportadora --}}
                        @include('xml.importa_dados.pedxml.transportadora')

                        {{-- cobrança --}}
                        @include('xml.importa_dados.pedxml.cobranca')

                        {{-- pagamento --}}
                        @include('xml.importa_dados.pedxml.pagamento')

                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
