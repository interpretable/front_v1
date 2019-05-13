@extends('layouts.app')

@section('content')

<!-- LIST EVERY ITEM -->
<div id="scenario-manager">
    <h3>Liste des cartes</h3>
    <div class="row">

        <!--<ul class="collapsible">
                @foreach ($thematics as $thematic)
                    <li>
                        <div class="collapsible-header"><i class="material-icons">filter_drama</i>{{$thematic->name}}</div>
                        <div class="collapsible-body">
                                @foreach ($items as $item)
                                    @if($thematic->id == $item->thematic_id)
                                    
                                    @endif
                                @endforeach
                        </div>
                    </li>
                @endforeach
        </ul>-->

        @foreach ($items as $item)
        <div class="col s6 m4 l3">
            <div class="card">
                <div class="card-image">
                    <img src="{{$item->card_picture}}" width="100%">
                </div>
                <div class="card-content">
                    <span class="card-title">{{$item->name}}</span>
                    <p>Card_Id : {{$item->card_id}}</p>
                </div>
                <div class="card-action center-align">
                    <a class="btn-floating btn-large waves-effect waves-light blue modal-trigger"
                        href="#modal-{{$item->id}}"><i class="material-icons">edit</i></a>
                    <a class="btn-floating btn-large waves-effect waves-light blue"
                        href="scenarios/delete/{{$item->id}}"><i class="material-icons">delete</i></a>
                </div>
                <!-- UPDATE FORM -->
                <!-- Modal Structure -->
                <div id="modal-{{$item->id}}" class="modal edit_item">
                    <div class="modal-content">
                        <h4>{{$item->name}}</h4>
                        <div class="table_preview col l6 m12 s12">
                            <div class="gabarit"></div>
                            <div class="zones">
                                @foreach ($item->medias as $media)
                                    <img src="{{$media}}">
                                @endforeach
                            </div>
                        </div>
                        
                            {{Form::open(array('url' => 'scenarios/update/'.$item->id, 'method' => 'post', 'enctype'=>"multipart/form-data"))}}

                            {{Form::token()}}

                            <div class="row">
                                <div class="input-field col l6 m12 s12">
                                {{Form::label('name', 'Nom de la carte')}}
                                {{Form::text('name', $item->name)}}
                                </div>

                                <div class="input-field col l6 m12 s12">
                                {{Form::label('card_id', "Id de la carte")}}
                                {{Form::text('card_id', $item->card_id)}}
                                </div>

                                {{Form::label('parent_id', 'Thématique associée')}}
                                <div class="input-field col l6 m12 s12">
                                    <select id="parent_id" name="thematic_id">
                                        @foreach ($thematics as $thematic) 
                                            @if($thematic->id == $item->thematic_id)
                                                <option selected value="{{$thematic->id}}">{{$thematic->name}}</option>
                                            @else
                                                <option value="{{$thematic->id}}">{{$thematic->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div class="row">

                            <br>

                            <div id="input_zones"></div>
                            
                            <div class="modal-footer">
                            {{Form::submit('Valider')}}

                            {{Form::close()}}
                            </div>
                    </div>


                </div>
                <!-- END UPDATE FORM -->
            </div>
        </div>
        @endforeach
        <div class="col s6 m4 l3">
            <div class="card blue darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Ajouter une carte</span>
                    <div class="card-action center-align">
                        <a class="btn-floating btn-large waves-effect waves-light red"><i
                                class="material-icons modal-trigger" href="#add_item">add</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- ADD Item -->
<div id="add_item" class="modal">
    <div class="modal-content">
        <h4>Ajouter une carte</h4>

        <!--<div class="row">
            <div class="col l6 m12 s12">
                <button class="btn_add_zone">ADD ZONE</button>
                <button class="btn_delete_zone">REMOVE ZONE</button>
                <div class="table_preview">
                    <div class="gabarit"></div>
                    <div class="zones"></div>
                </div>
            </div>-->


        {{Form::open(array('url' => 'scenarios/create', 'method' => 'post', 'enctype'=>"multipart/form-data"))}}
            {{Form::token()}}

            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        {{Form::label('media', 'Card_picture', 'class="white-text"')}}
                        {{Form::file('card_picture')}}  
                    </div>
                    <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                    </div>
                </div>


                <div class="input-field col l6 m12 s12">
                    {{Form::label('name', 'Nom de la carte')}}
                    {{Form::text('name')}}
                </div>

                <div class="input-field col l6 m12 s12">
                    {{Form::label('card_id', "Id de la carte")}}
                    {{Form::text('card_id')}}
                </div>


                {{Form::label('parent_id', 'Thématique associée')}}
                <div class="input-field col l12 m12 s12">
                    <select id="parent_id" name="parent_id">
                        @foreach ($thematics as $thematic)
                            <option value="{{$thematic->id}}">{{$thematic->name}}</option>
                        @endforeach
                    </select>
                </div>

                <h4>Zones</h4>

                <div class="file-field input-field col l6 m12 s12"">
                        <div class="btn">
                            {{Form::label('media', 'Zone1', 'class="white-text"')}}
                            {{Form::file('zone1')}} 
                        </div>
                        <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                        </div>
                </div>

                <div class="file-field input-field col l6 m12 s12"">
                        <div class="btn">
                            {{Form::label('media', 'Zone2', 'class="white-text"')}}
                            {{Form::file('zone2')}} 
                        </div>
                        <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                        </div>
                </div>

                <div class="file-field input-field col l6 m12 s12"">
                        <div class="btn">
                            {{Form::label('media', 'Zone3', 'class="white-text"')}}
                            {{Form::file('zone3')}} 
                        </div>
                        <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                        </div>
                </div>

                <div class="file-field input-field col l6 m12 s12"">
                        <div class="btn">
                            {{Form::label('media', 'Zone4', 'class="white-text"')}}
                            {{Form::file('zone4')}} 
                        </div>
                        <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                        </div>
                </div>
            </div>

            <!--<div id="input_zones"></div>-->

            {{Form::submit()}}

        {{Form::close()}}
    </div>
</div>
</div>


<div>
    @stop
