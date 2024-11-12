<div class="collapsible mb-4 ms-2">
    <button
        class="flex text-white collapsible-header group/item btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
        XML cobrança
        <div class="ltr:ml-2 rtl:mr-2 shrink-0">
            <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
            <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
        </div>
    </button>
    <div class="hidden mt-2 mb-0 collapsible-content card">
        <div class="card-body">

            @foreach ($saveXmlCobr as $cobr)
                <div class="collapsible mb-4 ms-2">
                    <button
                        class="flex text-white collapsible-header group/item btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                        {{ formatDate($cobr->d_venc) }}
                        <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                            <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                            <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                        </div>
                    </button>
                    <div class="hidden mt-2 mb-0 collapsible-content card">
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="cobr_n_fat" class="inline-block mb-2 text-base font-medium">n_fat<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="cobr_n_fat" name="cobr_n_fat" @if (isset($cobr)) value="{{ $cobr->n_fat }}" @endif disabled
                                        class="xml-cobr form-input border-slate-200
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
                                <label for="cobr_v_orig" class="inline-block mb-2 text-base font-medium">v_orig<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="cobr_v_orig" name="cobr_v_orig" @if (isset($cobr)) value="{{ formatReal($cobr->v_orig) }}" @endif disabled
                                        class="xml-cobr form-input border-slate-200
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
                                <label for="cobr-v_liq" class="inline-block mb-2 text-base font-medium">v_liq<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="cobr-v_liq" name="cobr-v_liq" @if (isset($cobr)) value="{{ formatReal($cobr->v_liq) }}" @endif disabled
                                        class="xml-cobr form-input border-slate-200
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
                                <label for="cobr_d_venc" class="inline-block mb-2 text-base font-medium">v_dup<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="cobr_d_venc" name="cobr_d_venc" @if (isset($cobr)) value="{{ $cobr->v_dup }}" @endif disabled
                                        class="xml-cobr form-input border-slate-200
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
                                <label for="cobr_v_dup" class="inline-block mb-2 text-base font-medium">v_dup<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="cobr_v_dup" name="cobr_v_dup" @if (isset($cobr)) value="{{ $cobr->v_dup }}" @endif disabled
                                        class="xml-cobr form-input border-slate-200
                                        dark:border-zink-500 focus:outline-none
                                        focus:border-custom-500 disabled:bg-slate-100
                                        dark:disabled:bg-zink-600 disabled:border-slate-300
                                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                                        dark:focus:border-custom-800 placeholder:text-slate-400
                                        dark:placeholder:text-zink-200"
                                required>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

            <button type="button" id="edit-xml-cobr"
                    class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                Editar
            </button>

        </div>
    </div>
</div>
