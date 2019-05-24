@extends('layouts.app')

@section('content')

{{$machine->name}}
<br>
Déroulement de la séance

@foreach ($machine->logs)
    @
@endforeach

<?php
var_dump($machine->logs);
?>

@stop