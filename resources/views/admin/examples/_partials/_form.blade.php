<div class="row mb-3">
    <div class="col-sm-12 col-md-9">
        @include('admin._partials._lang_tabs')

        <div class="tab-content mb-4">
            @foreach(config('settings.languages') as $key => $lang)
                <div class="tab-pane p-3 {{ $loop->first ? 'active' : '' }}" id="{{ $key }}" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>
                                    Názov
                                    <span class="text-uppercase">{{ $key }}</span>
                                    <span class="error-color">*</span>
                                </label>
                                <input name="name_{{ $key }}" type="text" value="{{ old("name_$key", isset($item) ? $item->{"name_$key"} : '') }}" class="form-control {{ $errors->has("name_$key") ? 'parsley-error' : '' }}">
                                @include('admin._partials._errors', ['column' => "name_$key"])
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>
                                    Typ
                                    <span class="text-uppercase">{{ $key }}</span>
                                    <span class="error-color">*</span>
                                </label>
                                <input name="type_{{ $key }}" type="text" value="{{ old("type_$key", isset($item) ? $item->{"type_$key"} : '') }}" class="form-control {{ $errors->has("type_$key") ? 'parsley-error' : '' }}">
                                @include('admin._partials._errors', ['column' => "type_$key"])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Krátky popis
                                    <span class="text-uppercase">{{ $key }}</span>
                                    (max. 150 znakov)
                                    <span class="error-color">*</span></label>
                                <textarea name="short_{{ $key }}" class="form-control {{ $errors->has("short_$key") ? 'parsley-error' : '' }}">{{ old("short_$key", isset($item) ? $item->{"short_$key"} : '') }}</textarea>
                                @include('admin._partials._errors', ['column' => "short_$key"])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>
                                    Podrobný popis
                                    <span class="text-uppercase">{{ $key }}</span>
                                    <span class="error-color">*</span>
                                </label>
                                <textarea name="description_{{ $key }}" class="form-control tinymce {{ $errors->has("description_$key") ? 'parsley-error' : '' }}">{{ old("description_$key", isset($item) ? $item->{"description_$key"} : '') }}</textarea>
                                @include('admin._partials._errors', ['column' => "description_$key"])
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Cena za kus (€)</label>
                    <input name="price" type="text" value="{{ old('price', isset($item) ? $item->price : '') }}" class="form-control price-input {{ $errors->has('price') ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => 'price'])
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label class="label-center">Zobraziť</label>

                    <div>
                        <input name="show" type="hidden" value="0">
                        <input name="show" id="show-check" switch="success" type="checkbox" value="1" {{ old('show') == 1 ? 'checked' : (isset($item) && $item->show ? 'checked' : '') }} class="form-control checkbox {{ $errors->has('show') ? 'parsley-error' : '' }}" />
                        <label for="show-check" data-on-label="Áno" data-off-label="Nie"></label>
                        @include('admin._partials._errors', ['column' => 'show'])
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Kategória <span class="error-color">*</span></label>
                    <select name="category_id" class="form-control select2">
                        <option value="">Vyberte kategóriu</option>
                        @for($i = 0; $i < 5; $i++)
                            <option value="{{-- $category->id --}}" {{-- old('category_id') == $category->id ? 'selected' : (isset($item) && $item->category_id == $category->id ? 'selected' : '') --}}>
                                {{-- $category->name_sk --}}
                                Lorem ipsum
                            </option>
                        @endfor
                    </select>
                    @include('admin._partials._errors', ['column' => 'category_id'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nasledujúci deň distribúcie</label>
                    <div>
                        <div class="input-group">
                            <input name="distribution_date" type="text" value="{{ old('distribution_date', (isset($item) ? $item->distribution_date : '')) }}" class="form-control datepicker-autoclose {{ $errors->has('distribution_date') ? 'parsley-error' : '' }}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        @include('admin._partials._errors', ['column' => 'distribution_date'])
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
