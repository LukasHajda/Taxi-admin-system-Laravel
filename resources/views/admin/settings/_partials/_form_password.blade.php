<div class="row mb-3">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nové heslo</label>
                    <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => 'password'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Opakujte heslo</label>
                    <input name="password_confirmation" type="password" class="form-control">
                </div>
            </div>
        </div>

    </div>
</div>
