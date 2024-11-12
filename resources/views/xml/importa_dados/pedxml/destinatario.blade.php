<div class="collapsible mb-4 ms-2">
    <button
        class="flex text-white collapsible-header group/item btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
        XML Destinatário
        <div class="ltr:ml-2 rtl:mr-2 shrink-0">
            <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
            <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
        </div>
    </button>
    <div class="hidden mt-2 mb-0 collapsible-content card">
        <div class="card-body">

            <div class="mb-3">
                <label for="dest_cnpj" class="inline-block mb-2 text-base font-medium">CNPJ<span
                        class="text-red-500">*</span></label>
                <input type="text" id="dest_cnpj" name="dest_cnpj" @if (isset($savedXmlDest)) value="{{ $savedXmlDest->cnpj }}" @endif disabled
                        class="xml-dest form-input border-slate-200
                        dark:border-zink-500 focus:outline-none
                        focus:border-custom-500 disabled:bg-slate-100
                        dark:disabled:bg-zink-600 disabled:border-slate-300
                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                        dark:focus:border-custom-800 placeholder:text-slate-400
                        dark:placeholder:text-zink-200"
                required>
            </div>

            <div class="mb-3">
                <label for="dest_nome" class="inline-block mb-2 text-base font-medium">Nome<span
                        class="text-red-500">*</span></label>
                <input type="text" id="dest_nome" name="dest_nome" @if (isset($savedXmlDest)) value="{{ $savedXmlDest->nome }}" @endif disabled
                        class="xml-dest form-input border-slate-200
                        dark:border-zink-500 focus:outline-none
                        focus:border-custom-500 disabled:bg-slate-100
                        dark:disabled:bg-zink-600 disabled:border-slate-300
                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                        dark:focus:border-custom-800 placeholder:text-slate-400
                        dark:placeholder:text-zink-200"
                required>
            </div>

            <div class="mb-3">
                <label for="dest_logradouro" class="inline-block mb-2 text-base font-medium">Logradouro<span
                        class="text-red-500">*</span></label>
                <input type="text" id="dest_logradouro" name="dest_logradouro" @if (isset($savedXmlDest)) value="{{ $savedXmlDest->logradouro }}" @endif disabled
                        class="xml-dest form-input border-slate-200
                        dark:border-zink-500 focus:outline-none
                        focus:border-custom-500 disabled:bg-slate-100
                        dark:disabled:bg-zink-600 disabled:border-slate-300
                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                        dark:focus:border-custom-800 placeholder:text-slate-400
                        dark:placeholder:text-zink-200"
                required>
            </div>

            <div class="mb-3">
                <label for="dest_nro" class="inline-block mb-2 text-base font-medium">Número<span
                        class="text-red-500">*</span></label>
                <input type="text" id="dest_nro" name="dest_nro" @if (isset($savedXmlDest)) value="{{ $savedXmlDest->numero }}" @endif disabled
                        class="xml-dest form-input border-slate-200
                        dark:border-zink-500 focus:outline-none
                        focus:border-custom-500 disabled:bg-slate-100
                        dark:disabled:bg-zink-600 disabled:border-slate-300
                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                        dark:focus:border-custom-800 placeholder:text-slate-400
                        dark:placeholder:text-zink-200"
                required>
            </div>

            <div class="mb-3">
                <label for="dest_bairro" class="inline-block mb-2 text-base font-medium">Bairro<span
                        class="text-red-500">*</span></label>
                <input type="text" id="dest_bairro" name="dest_bairro" @if (isset($savedXmlDest)) value="{{ $savedXmlDest->bairro }}" @endif disabled
                        class="xml-dest form-input border-slate-200
                        dark:border-zink-500 focus:outline-none
                        focus:border-custom-500 disabled:bg-slate-100
                        dark:disabled:bg-zink-600 disabled:border-slate-300
                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                        dark:focus:border-custom-800 placeholder:text-slate-400
                        dark:placeholder:text-zink-200"
                required>
            </div>

            <div class="mb-3">
                <label for="dest_mun" class="inline-block mb-2 text-base font-medium">Munícipio<span
                        class="text-red-500">*</span></label>
                <input type="text" id="dest_mun" name="dest_mun" @if (isset($savedXmlDest)) value="{{ $savedXmlDest->municipio }}" @endif disabled
                        class="xml-dest form-input border-slate-200
                        dark:border-zink-500 focus:outline-none
                        focus:border-custom-500 disabled:bg-slate-100
                        dark:disabled:bg-zink-600 disabled:border-slate-300
                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                        dark:focus:border-custom-800 placeholder:text-slate-400
                        dark:placeholder:text-zink-200"
                required>
            </div>

            <div class="mb-3">
                <label for="dest_uf" class="inline-block mb-2 text-base font-medium">UF<span
                        class="text-red-500">*</span></label>
                <input type="text" id="dest_uf" name="dest_uf" @if (isset($savedXmlDest)) value="{{ $savedXmlDest->uf }}" @endif disabled
                        class="xml-dest form-input border-slate-200
                        dark:border-zink-500 focus:outline-none
                        focus:border-custom-500 disabled:bg-slate-100
                        dark:disabled:bg-zink-600 disabled:border-slate-300
                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                        dark:focus:border-custom-800 placeholder:text-slate-400
                        dark:placeholder:text-zink-200"
                required>
            </div>

            <div class="mb-3">
                <label for="dest_cep" class="inline-block mb-2 text-base font-medium">CEP<span
                        class="text-red-500">*</span></label>
                <input type="text" id="dest_cep" name="dest_cep" @if (isset($savedXmlDest)) value="{{ $savedXmlDest->cep }}" @endif disabled
                        class="xml-dest form-input border-slate-200
                        dark:border-zink-500 focus:outline-none
                        focus:border-custom-500 disabled:bg-slate-100
                        dark:disabled:bg-zink-600 disabled:border-slate-300
                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                        dark:focus:border-custom-800 placeholder:text-slate-400
                        dark:placeholder:text-zink-200"
                required>
            </div>

            <div class="mb-3">
                <label for="dest_insc_est_dest" class="inline-block mb-2 text-base font-medium">Inscrição Estadual<span
                        class="text-red-500">*</span></label>
                <input type="text" id="dest_insc_est_dest" name="dest_insc_est_dest" @if (isset($savedXmlDest)) value="{{ $savedXmlDest->indIEDest }}" @endif disabled
                        class="xml-dest form-input border-slate-200
                        dark:border-zink-500 focus:outline-none
                        focus:border-custom-500 disabled:bg-slate-100
                        dark:disabled:bg-zink-600 disabled:border-slate-300
                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                        dark:focus:border-custom-800 placeholder:text-slate-400
                        dark:placeholder:text-zink-200"
                required>
            </div>

            <div class="mb-3">
                <label for="emit_insc_est" class="inline-block mb-2 text-base font-medium">Inscrição Estadual<span
                        class="text-red-500">*</span></label>
                <input type="text" id="emit_insc_est" name="emit_insc_est" @if (isset($savedXmlDest)) value="{{ $savedXmlDest->insc_est }}" @endif disabled
                        class="xml-dest form-input border-slate-200
                        dark:border-zink-500 focus:outline-none
                        focus:border-custom-500 disabled:bg-slate-100
                        dark:disabled:bg-zink-600 disabled:border-slate-300
                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                        dark:focus:border-custom-800 placeholder:text-slate-400
                        dark:placeholder:text-zink-200"
                required>
            </div>

            <button type="button" id="edit-xml-dest"
                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                Editar
            </button>
        </div>
    </div>
</div>
