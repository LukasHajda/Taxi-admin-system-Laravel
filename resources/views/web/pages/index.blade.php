@extends('layout.web')

@section('og_tags')
    <meta property="og:url"             content="" />
    <meta property="og:type"            content="website" />
    <meta property="og:title"           content="{{ env('APP_NAME') }}" />
    <meta property="og:description"     content="" />
    <meta property="og:image"           content="" />
    <meta property="og:image:width"     content="800" />
    <meta property="og:image:height"    content="400" />
@endsection

@section('content')
    <table>
        <tr>
            <th>Zaciatok</th>
            <th>Koniec</th>
            <th>Trzba</th>
            <th>Veduci smeny</th>
{{--            <th>Prihlasovacie meno</th>--}}
        </tr>

        @foreach($users as $user)
            @foreach($user->shifts as $shift)
                <tr>
                    <td>{{ $shift->id }}</td>
                </tr>
            @endforeach
{{--            @foreach($operator->shifts as $shift)--}}
{{--                <tr>--}}
{{--                    <td>{{ $operator->first_name . ' ' . $supervisor->last_name}}</td>--}}
{{--                    <td>{{ $shift->id }}</td>--}}
{{--                    --}}{{--                <td>{{ $shift->salary }}</td>--}}
{{--                    --}}{{--                <td>{{ $shift->supervisor->first_name }}</td>--}}
{{--                    --}}{{--                <td>{{ $driver->login_name }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
        @endforeach
    </table>
@endsection
