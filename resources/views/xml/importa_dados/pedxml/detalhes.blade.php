<div class="collapsible mb-4 ms-2">
    <button
        class="flex text-white collapsible-header group/item btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
        XML Detalhes
        <div class="ltr:ml-2 rtl:mr-2 shrink-0">
            <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
            <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
        </div>
    </button>
    <div class="hidden mt-2 mb-0 collapsible-content card">

        <div class="card-body">
            @foreach ($savedXmlDet as $det)
            <div class="collapsible mb-4 ms-2">
                <button
                    class="flex text-white collapsible-header group/item btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                    Prod. {{ $det->c_prod}}
                    <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                        <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                        <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                    </div>
                </button>
                <div class="hidden mt-2 mb-0 collapsible-content card">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="det_c_prod" class="inline-block mb-2 text-base font-medium">c_prod<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="det_c_prod" name="det_c_prod" @if (isset($det)) value="{{ $det->c_prod }}" @endif disabled
                                    class="xml-det form-input border-slate-200
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
                            <label for="det_produto" class="inline-block mb-2 text-base font-medium">Produto<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="det_produto" name="det_produto" @if (isset($det)) value="{{ $det->produto }}" @endif disabled
                                    class="xml-det form-input border-slate-200
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
                            <label for="det_u_comp" class="inline-block mb-2 text-base font-medium">u_comp<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="det_u_comp" name="det_u_comp" @if (isset($det)) value="{{ $det->u_comp }}" @endif disabled
                                    class="xml-det form-input border-slate-200
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
                            <label for="det_q_comp" class="inline-block mb-2 text-base font-medium">q_comp<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="det_q_comp" name="det_q_comp" @if (isset($det)) value="{{ $det->q_comp }}" @endif disabled
                                    class="xml-det form-input border-slate-200
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
                            <label for="det_v_un_comp" class="inline-block mb-2 text-base font-medium">v_un_comp<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="det_v_un_comp" name="det_v_un_comp" @if (isset($det)) value="{{ $det->v_un_comp }}" @endif disabled
                                    class="xml-det form-input border-slate-200
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
                            <label for="det_v_prod" class="inline-block mb-2 text-base font-medium">v_prod<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="det_v_prod" name="det_v_prod" @if (isset($det)) value="{{ formatReal($det->v_prod) }}" @endif disabled
                                    class="xml-det form-input border-slate-200
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
                            <label for="det_u_trib" class="inline-block mb-2 text-base font-medium">u_trib<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="det_u_trib" name="det_u_trib" @if (isset($det)) value="{{ $det->u_trib }}" @endif disabled
                                    class="xml-det form-input border-slate-200
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
                            <label for="det_q_trib" class="inline-block mb-2 text-base font-medium">q_trib<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="det_q_trib" name="det_q_trib" @if (isset($det)) value="{{ $det->q_trib }}" @endif disabled
                                    class="xml-det form-input border-slate-200
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
                            <label for="det_v_un_trib" class="inline-block mb-2 text-base font-medium">v_un_trib<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="det_v_un_trib" name="det_v_un_trib" @if (isset($det)) value="{{ $det->v_un_trib }}" @endif disabled
                                    class="xml-det form-input border-slate-200
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
                            <label for="det_v_ipi" class="inline-block mb-2 text-base font-medium">v_ipi<span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="det_v_ipi" name="det_v_ipi" @if (isset($det)) value="{{ $det->v_ipi }}" @endif disabled
                                    class="xml-det form-input border-slate-200
                                    dark:border-zink-500 focus:outline-none
                                    focus:border-custom-500 disabled:bg-slate-100
                                    dark:disabled:bg-zink-600 disabled:border-slate-300
                                    dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                    disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                                    dark:focus:border-custom-800 placeholder:text-slate-400
                                    dark:placeholder:text-zink-200"
                            required>
                        </div>

                        <button type="button" id="edit-xml-det"
                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                            Editar
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
