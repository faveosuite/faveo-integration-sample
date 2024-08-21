@extends('welcome')


@section('content')
   <x-get-api-details :description="$description" :name="$name" :endpoint="$endpoint" :method="$method" :parameters="$parameters" />
@endsection
