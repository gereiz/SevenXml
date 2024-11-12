<div class="collapsible mb-4 ms-2">
    <button
        class="flex text-white collapsible-header group/item btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
        XML Emitente
        <div class="ltr:ml-2 rtl:mr-2 shrink-0">
            <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
            <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
        </div>
    </button>

    <div class="hidden mt-2 mb-0 collapsible-content card">
        <div class="card-body overflow-auto">

            <div class="mb-3">
                <label for="emit_cnpj" class="inline-block mb-2 text-base font-medium">CNPJ<span
                        class="text-red-500">*</span></label>
                <input type="text" id="emit_cnpj" name="emit_cnpj" @if (isset($savedXmlEmit)) value="{{ $savedXmlEmit->cnpj }}" @endif disabled
                        class="xml-emit form-input border-slate-200
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
                <label for="emit_nome" class="inline-block mb-2 text-base font-medium">Nome<span
                        class="text-red-500">*</span></label>
                <input type="text" id="emit_nome" name="emit_nome" @if (isset($savedXmlEmit)) value="{{ $savedXmlEmit->nome }}" @endif disabled
                        class="xml-emit form-input border-slate-200
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
                <label for="emit_mun" class="inline-block mb-2 text-base font-medium">Munícipio<span
                        class="text-red-500">*</span></label>
                <input type="text" id="emit_mun" name="emit_mun" @if (isset($savedXmlEmit)) value="{{ $savedXmlEmit->municipio }}" @endif disabled
                        class="xml-emit form-input border-slate-200
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
                <label for="emit_uf" class="inline-block mb-2 text-base font-medium">UF<span
                        class="text-red-500">*</span></label>
                <input type="text" id="emit_uf" name="emit_uf" @if (isset($savedXmlEmit)) value="{{ $savedXmlEmit->uf }}" @endif disabled
                        class="xml-emit form-input border-slate-200
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
                <label for="emit_cep" class="inline-block mb-2 text-base font-medium">CEP<span
                        class="text-red-500">*</span></label>
                <input type="text" id="emit_cep" name="emit_cep" @if (isset($savedXmlEmit)) value="{{ $savedXmlEmit->cep }}" @endif disabled
                        class="xml-emit form-input border-slate-200
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
                <label for="emit_c_pais" class="inline-block mb-2 text-base font-medium">Cód País<span
                        class="text-red-500">*</span></label>
                <input type="text" id="emit_c_pais" name="emit_c_pais" @if (isset($savedXmlEmit)) value="{{ $savedXmlEmit->c_pais }}" @endif disabled
                        class="xml-emit form-input border-slate-200
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
                <label for="emit_pais" class="inline-block mb-2 text-base font-medium">País<span
                        class="text-red-500">*</span></label>
                <input type="text" id="emit_pais" name="emit_pais" @if (isset($savedXmlEmit)) value="{{ $savedXmlEmit->x_pais }}" @endif disabled
                        class="xml-emit form-input border-slate-200
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
                <input type="text" id="emit_insc_est" name="emit_insc_est" @if (isset($savedXmlEmit)) value="{{ $savedXmlEmit->insc_est }}" @endif disabled
                        class="xml-emit form-input border-slate-200
                        dark:border-zink-500 focus:outline-none
                        focus:border-custom-500 disabled:bg-slate-100
                        dark:disabled:bg-zink-600 disabled:border-slate-300
                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                        dark:focus:border-custom-800 placeholder:text-slate-400
                        dark:placeholder:text-zink-200"
                required>
            </div>

            <button type="button" id="edit-xml-emit"
                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                Editar
            </button>
        </div>
    </div>
</div>
