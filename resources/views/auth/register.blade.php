@extends('layouts.app')

@section('conteudo')


        <x-slot name="logo">
            <a href="/">
                <x-application-logo width="82" />
            </a>
        </x-slot>

        <h2 class="my-4">Cadastro de Funcionários</h2>
        <x-auth-session-status class="mb-3" :status="session('status')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="d-flex justify-content-center">
            <!-- Validation Errors -->


            <form style="max-width: 400px; width: 400px" class="border border-2 shadow bg-light p-4 " method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted me-3 text-decoration-none" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>

                        <x-button>
                            {{ __('Casdastrar') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>

@endsection
