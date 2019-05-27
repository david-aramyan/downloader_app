@extends('layouts.main')

@section('content')
    <div class="flex-center container" style="margin-top: 100px">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Url</th>
                <th scope="col">Status</th>

            </tr>
            </thead>
            <tbody>
            @if(!empty($resources))
                @foreach($resources as $resource)
                    <tr>
                        <th scope="row">{{ $resource->id }}</th>
                        <td>
                            @if($resource->status->name == 'Complete')
                                <a href="{{ asset('storage/'.$resource->name) }}" download>{{ $resource->url }}
                                </a>
                            @else
                                {{ $resource->url }}
                            @endif
                        </td>
                        <td>{{ $resource->status->name }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection

