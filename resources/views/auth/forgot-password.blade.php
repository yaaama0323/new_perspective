@include('head')
<x-guest-layout>
    <x-auth-card>
        <!-- <x-slot name="logo">
        </x-slot> -->
<div class="reset">
        <h1>パスワード再発行</h1>

        <div class="reset_message">
            {{ __('メールアドレスを入力してください。 届いたURLからパスワード変更画面に 進めます。.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="reset_contents">
                <x-input-label for="email" :value="__('メールアドレス')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="">
                <x-primary-button>
                    {{ __('リセットリンクを送信') }}
                </x-primary-button>
            </div>
        </form>
</div>
    </x-auth-card>
</x-guest-layout>
