<div class="row mb-3">
    <div class="col-sm-12 col-md-9">

        {{--    Značka a Model  --}}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>
                        Značka
                        <span class="error-color">*</span>
                    </label>
                    <input name="brand" type="text" value="{{ old("brand", isset($car) ? $car->brand : '') }}" class="form-control {{ $errors->has("brand") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "brand"])
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>
                        Model
                        <span class="error-color">*</span>
                    </label>
                    <input name="model" type="text" oninput="fillUserName()" value="{{ old("model", isset($car) ? $car->model : '') }}" class="form-control {{ $errors->has("model") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "model"])
                </div>
            </div>
        </div>

        {{--    SPZ    --}}
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label>ŠPZ
                        <span class="error-color">*</span></label>
                    <input name="license_number" type="text" value="{{ old("license_number", isset($car) ? $car->license_number : '') }}" class="form-control {{ $errors->has("license_number") ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => "license_number"])
                </div>
            </div>
        </div>
    </div>
</div>
