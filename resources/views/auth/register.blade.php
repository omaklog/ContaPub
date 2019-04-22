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
                                    Formulario de registro.
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

                                <v-form method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <v-text-field
                                        id="name"
                                        label="Nombre:"
                                        placeholder="Ingrese su nombre."
                                        label-for="name"
                                        prepend-icon="person"
                                        name="name"
                                        type="text">
                                    </v-text-field>
                                    <v-text-field
                                            id="email"
                                            label="Correo electrónico:"
                                            description="Por favor Ingresa tu correo electrónico."
                                            {{--v-validate="'required|email'"--}}
                                            {{--:error-messages="errors.collect('email')"--}}
                                            {{--data-vv-name="email"--}}
                                            label-for="email"
                                            prepend-icon="email"
                                            name="email"
                                            type="text">

                                    </v-text-field>
                                    <v-text-field id="password"
                                                  {{--v-validate="'required'"--}}
                                                  :error-messages="errors.collect('password')"
                                                  ref="password"
                                                  prepend-icon="lock"
                                                  name="password"
                                                  label="Contraseña"
                                                  type="password">
                                    </v-text-field>
                                    <v-text-field id="password_confirmation"
                                                  {{--v-validate="'required|confirmed:password'"--}}
                                                  {{--:error-messages="errors.collect('passwordconfirmation')"--}}
                                                  {{--data-vv-name="passwordconfirmation"--}}
                                                  placeholder="Confirma tu contraseña"
                                                  prepend-icon="lock"
                                                  name="password_confirmation"
                                                  label="Confirme contraseña"
                                                  type="password">

                                    </v-text-field>
                                    <v-content class="text-xs-center">
                                        <a  href="{{ route('login') }}">¿Ya te has registrado?</a>
                                    </v-content>

                                    <v-card-actions  class="text-xs-center m-auto">
                                        <v-btn color="primary" type="submit">Confirmar Registro</v-btn>
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
