@extends('layouts.app')

@section('content')


    <v-app id="inspire">
        <v-content>
            <v-container fluid fill-height>
                <v-layout align-center justify-center>
                    <v-flex xs12 sm8 md4>
                        <v-card class="elevation-12">
                            <v-toolbar dark color="primary">
                                <v-toolbar-title>
                                    <v-spacer></v-spacer>
                                    <v-icon>fa-id-card</v-icon>
                                    Formulario de Ingreso.
                                </v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                            @if ($errors->any())
                                <v-alert
                                        :value="true"
                                        color="error"
                                        icon="warning"
                                        outline
                                >
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </v-alert>
                            @else
                                <v-alert :value="true"
                                         color="info"
                                         icon="info"
                                         outline
                                         >Por favor Ingresa tus Datos :)</v-alert>
                            @endif
                            <v-card-text>

                                <v-form method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <v-text-field
                                            id="email"
                                            label="Correo electrónico:"
                                            label-for="email"
                                            prepend-icon="person"
                                            name="email"
                                            type="text"></v-text-field>
                                    <v-text-field id="password" prepend-icon="lock" name="password" label="Contraseña" type="password"></v-text-field>
                                    <v-switch
                                            class="pl-5"
                                            label="Recordarme"
                                            color="info"
                                            value="remember"
                                            {{ old('remember') ? 'checked="true"' : '' }}
                                            hide-details
                                    ></v-switch>
                                    <v-content class="text-xs-center">
                                        <a  href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                    </v-content>

                                    <v-card-actions  class="text-xs-center m-auto">
                                        <v-btn color="primary" type="submit">Ingresar</v-btn>
                                    </v-card-actions>

                                </v-form>


                            </v-card-text>

                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>

@endsection
