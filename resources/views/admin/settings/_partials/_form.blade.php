<div class="row mb-3">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" disabled value="{{ $user->email }}" class="form-control">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Používateľské meno</label>
                    <input type="text" disabled value="{{ $user->username }}" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Meno</label>
                    <input name="name" type="text" value="{{ old('name', isset($user) ? $user->name : '') }}" class="form-control {{ $errors->has('name') ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => 'name'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Priezvisko</label>
                    <input name="surname" type="text" value="{{ old('surname', isset($user) ? $user->surname : '') }}" class="form-control {{ $errors->has('surname') ? 'parsley-error' : '' }}">
                    @include('admin._partials._errors', ['column' => 'surname'])
                </div>
            </div>
        </div>

    </div>
</div>
