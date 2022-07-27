@extends('admin.layouts.base')

{{-- @section('pageTitle', '{{$comic->title}}') --}}
{{-- Why the above is not working properly --}}
{{-- @section('pageTitle', $comic['title']) --}}

@section('mainContent')
    <main>
        <h1>{{ $post->title }}</h1>
        <table>
            <thead>
                <tr>
                    <th>Campo:</th>
                    <th>Valore:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($post->toArray() as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                </tr>
                <td></td>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
