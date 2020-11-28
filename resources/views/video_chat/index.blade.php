@extends('layouts.app')

@section('content')
    <div style=" display: flex; justify-content: center;">{{ $user['email'] }}</div>
    <video-chat :user="{{ $user }}" :others="{{ $others }}" pusher-key="{{ config('broadcasting.connections.pusher.key') }}" pusher-cluster="{{ config('broadcasting.connections.pusher.options.cluster') }}"></video-chat>
@endsection

