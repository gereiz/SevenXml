<div class="w-full mb-4" id="xml_sv" name="xml_sv">
    <div class="collapsible">
        <button id="btn_ped_sv"
            class="flex text-white collapsible-header group/item btn bg-red-500 border-red-500 hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">
            Dados do Pedido no SV
            <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
            </div>
        </button>
        <div class="hidden mt-2 mb-0 collapsible-content card">
            <div class="card-body flex flex-col">
                <div class="flex w-full justify-between mb-4">
                    <div class="flex flex-col w-1/12">
                        <label for="ped_forn" class="inline-block mb-2 text-base font-medium">
                            Código do Pedido
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" value="{{$pedido_sv->pedi_id}}" id="ped_forn"class="form-input input-form"disabled>
                    </div>

                    <div class="flex flex-col w-5/12">
                        <label for="ped_forn" class="inline-block mb-2 text-base font-medium">
                            Fornecedor
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" value="{{$fornecedor}}" id="ped_forn"class="form-input input-form"disabled>
                    </div>

                    <div class="flex flex-col w-5/12">
                        <label for="ped_cli" class="inline-block mb-2 text-base font-medium">
                            Cliente
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" value="{{$cliente}}" id="ped_cli"class="form-input input-form"disabled>
                    </div>
                </div>

                {{-- Primeira Linha --}}
                <div class="w-full flex flex-col">
                    <div class="collapsible">
                        <button id="btn_ped_sv"
                            class="flex text-white collapsible-header group/item btn bg-red-500 border-red-500 hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">
                            Itens do Pedido
                            <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                                <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                                <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                            </div>
                        </button>
                        <div class="hidden mt-2 mb-0 collapsible-content card">
                            <div id="itens_pedido" class="card-body flex flex-col">
                            
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
</div>