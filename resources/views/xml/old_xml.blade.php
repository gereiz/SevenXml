@extends('layouts.master')
@section('title')
    XML
@endsection
@section('content')

    <x-page-title title="Dados do XML" pagetitle="XML" />

    <div class="w-full flex justify-between">

        <div class="w-4/12 card-body">
            <h6 class="mb-4 text-15">Dados Importados</h6>

            <div class="w-full flex flex-col sm:flex-row md:flex-row lg:flex-row xl:flex-row">

                {{-- identificaçao --}}
                <div class="collapsible mb-4 ms-2">
                    <button
                        class="flex text-white collapsible-header group/item btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                        XML Identificação
                        <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                            <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                            <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                        </div>
                    </button>
                    <div class="hidden mt-2 mb-0 collapsible-content card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="c_uf" class="inline-block mb-2 text-base font-medium">Cód UF <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="c_uf" name="c_uf" @if (isset($savedXmlIde)) value="{{ $savedXmlIde->c_uf }}" @endif disabled
                                        class="xml-ide form-input border-slate-200
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
                                <label for="c_nf" class="inline-block mb-2 text-base font-medium">Cód NF <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="c_nf" name="c_nf" @if (isset($savedXmlIde)) value="{{ $savedXmlIde->c_nf }}" @endif disabled
                                        class="xml-ide form-input border-slate-200
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
                                <label for="n_nf" class="inline-block mb-2 text-base font-medium">Nº NF <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="n_nf" name="n_nf" @if (isset($savedXmlIde)) value="{{ $savedXmlIde->n_nf }}" @endif disabled
                                        class="xml-ide form-input border-slate-200
                                        dark:border-zink-500 focus:outline-none
                                        focus:border-custom-500 disabled:bg-slate-100
                                        dark:disabled:bg-zink-600 disabled:border-slate-300
                                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                                        dark:focus:border-custom-800 placeholder:text-slate-400
                                        dark:placeholder:text-zink-200"
                                required>
                            </div>
                            <button type="button" id="edit-xml-ide"
                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                Editar
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Emitente --}}
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
                        <div class="card-body">

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

                {{-- Destinatário --}}
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

                {{-- Detalhes --}}
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
                                            <input type="text" id="det_v_prod" name="det_v_prod" @if (isset($det)) value="{{ $det->v_prod }}" @endif disabled
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

                {{-- Total --}}
                <div class="collapsible mb-4 ms-2">
                    <button
                        class="flex text-white collapsible-header group/item btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                        XML Total
                        <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                            <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                            <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                        </div>
                    </button>
                    <div class="hidden mt-2 mb-0 collapsible-content card">
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="total_v_prod" class="inline-block mb-2 text-base font-medium">v_prod<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="total_v_prod" name="total_v_prod" @if (isset($savedXmlTotal)) value="{{ $savedXmlTotal->v_prod }}" @endif disabled
                                        class="xml-total form-input border-slate-200
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
                                <label for="total_v_ipi" class="inline-block mb-2 text-base font-medium">v_ipi<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="total_v_ipi" name="total_v_ipi" @if (isset($savedXmlTotal)) value="{{ $savedXmlTotal->v_ipi }}" @endif disabled
                                        class="xml-total form-input border-slate-200
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
                                <label for="total_v_nf" class="inline-block mb-2 text-base font-medium">v_nf<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="total_v_nf" name="total_v_nf" @if (isset($savedXmlTotal)) value="{{ $savedXmlTotal->v_nf }}" @endif disabled
                                        class="xml-total form-input border-slate-200
                                        dark:border-zink-500 focus:outline-none
                                        focus:border-custom-500 disabled:bg-slate-100
                                        dark:disabled:bg-zink-600 disabled:border-slate-300
                                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                                        dark:focus:border-custom-800 placeholder:text-slate-400
                                        dark:placeholder:text-zink-200"
                                required>
                            </div>


                            <button type="button" id="edit-xml-total"
                                    class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                Editar
                            </button>

                        </div>
                    </div>
                </div>

                {{-- transportadora --}}
                <div class="collapsible mb-4 ms-2">
                    <button
                        class="flex text-white collapsible-header group/item btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                        XML transportadora
                        <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                            <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                            <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                        </div>
                    </button>
                    <div class="hidden mt-2 mb-0 collapsible-content card">
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="transp_nome" class="inline-block mb-2 text-base font-medium">Nome<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="transp_nome" name="transp_nome" @if (isset($saveXmlTransp)) value="{{ $saveXmlTransp->nome }}" @endif disabled
                                        class="xml-transp form-input border-slate-200
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
                                <label for="transp_q_vol" class="inline-block mb-2 text-base font-medium">q_vol<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="transp_q_vol" name="transp_q_vol" @if (isset($saveXmlTransp)) value="{{ $saveXmlTransp->q_vol }}" @endif disabled
                                        class="xml-transp form-input border-slate-200
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
                                <label for="transp_esp" class="inline-block mb-2 text-base font-medium">esp<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="transp_esp" name="transp_esp" @if (isset($saveXmlTransp)) value="{{ $saveXmlTransp->esp }}" @endif disabled
                                        class="xml-transp form-input border-slate-200
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
                                <label for="transp_peso_liq" class="inline-block mb-2 text-base font-medium">peso_liq<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="transp_peso_liq" name="transp_peso_liq" @if (isset($saveXmlTransp)) value="{{ $saveXmlTransp->peso_liq }}" @endif disabled
                                        class="xml-transp form-input border-slate-200
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
                                <label for="transp_peso_bru" class="inline-block mb-2 text-base font-medium">peso_bru<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="transp_peso_bru" name="transp_peso_bru" @if (isset($saveXmlTransp)) value="{{ $saveXmlTransp->peso_bru }}" @endif disabled
                                        class="xml-transp form-input border-slate-200
                                        dark:border-zink-500 focus:outline-none
                                        focus:border-custom-500 disabled:bg-slate-100
                                        dark:disabled:bg-zink-600 disabled:border-slate-300
                                        dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                        disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                                        dark:focus:border-custom-800 placeholder:text-slate-400
                                        dark:placeholder:text-zink-200"
                                required>
                            </div>


                            <button type="button" id="edit-xml-transp"
                                    class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                Editar
                            </button>

                        </div>
                    </div>
                </div>

                {{-- cobrança --}}
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
                                        Dup {{ $cobr->d_venc }}
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
                                                <input type="text" id="cobr_v_orig" name="cobr_v_orig" @if (isset($cobr)) value="{{ $cobr->v_orig }}" @endif disabled
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
                                                <input type="text" id="cobr-v_liq" name="cobr-v_liq" @if (isset($cobr)) value="{{ $cobr->v_liq }}" @endif disabled
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

                {{-- pagamento --}}
                <div class="collapsible mb-4 ms-2">
                    <button
                        class="flex text-white collapsible-header group/item btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                        XML pagamento
                        <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                            <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                            <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                        </div>
                    </button>
                    <div class="hidden mt-2 mb-0 collapsible-content card">
                        <div class="card-body">

                            @foreach ($saveXmlPag as $pag)
                                <div class="collapsible mb-4 ms-2">
                                    <button
                                        class="flex text-white collapsible-header group/item btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                        XML pagamento
                                        <div class="ltr:ml-2 rtl:mr-2 shrink-0">
                                            <i data-lucide="chevron-down" class="hidden size-4 group-[.show]/item:inline-block"></i>
                                            <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]/item:hidden"></i>
                                        </div>
                                    </button>
                                    <div class="hidden mt-2 mb-0 collapsible-content card">
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <label for="pag_v_pag" class="inline-block mb-2 text-base font-medium">v_pag<span
                                                        class="text-red-500">*</span></label>
                                                <input type="text" id="pag_v_pag" name="pag_v_pag" @if (isset($pag)) value="{{ $pag->v_pag }}" @endif disabled
                                                        class="xml-pag form-input border-slate-200
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

                            <button type="button" id="edit-xml-pag"
                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                Editar
                            </button>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
@push('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush

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
