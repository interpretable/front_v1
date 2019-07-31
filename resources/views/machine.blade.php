@extends('layouts.app')

@section('content')

{{$machine->name}}
<br>
<ul class="collapsible">
    <li>
        <div class="collapsible-header"><i class="material-icons">filter_drama</i>Logs</div>
        <div class="collapsible-body">
            @foreach ($machine->logs as $log)
                @foreach ($log->cards as $card)
                    <p>Carte :  {{$card->name}}</p> 
                    <p>Carte :  {{$card->thematic_id}}</p> 
                    <p>{{$card->time}}</p>        
                @endforeach
            @endforeach
        
        </div>
    </li>
</ul>
        


@stop