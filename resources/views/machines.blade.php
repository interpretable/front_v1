@extends('layouts.app')

@section('content')


<div class="row">
    @foreach($machines as $machine)
        <div class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                <span class="card-title">{{$machine->name}}</span>
                <p>IP : {{$machine->ip}}</p>
                <p>Historique des logs : </p>
                <ul>
                    @foreach ($machine->logs as $log)
                    <li>{{$log}}</li>
                    @endforeach
                </ul>
                </div>
                <div class="card-action">
                <a href="machine/{{$machine->id}}">Statistiques</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@stop