@include('head')
<x-guest-layout>
    <x-auth-card>
    <div class="login_top_text">
    <h1>ログイン画面</h1>
    <a>メールアドレス、パスワードを入力した後、ログインボタンを押してください</a>
    </div>
        
        <!-- <x-slot name="logo" class="login_top"> 
            
        </x-slot> -->
    </div>

        <!-- Session Status -->
        <x-auth-session-status class="" :status="session('status')" />
    <div class="login_form">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
            
                <x-input-label for="email" :value="__('translation.Email Address')" />
                <div class=""><x-text-input id="email" class="block mt-1 " type="email" name="email" :value="old('email')" required autofocus /></div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            

            <!-- Password -->
            <div class="mt-4">
                
                <x-input-label for="password" :value="__('translation.Password')" />

                <div class=""><x-text-input id="password" class="block mt-1" type="password" name="password" required autocomplete="current-password"/></div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('translation.Remember Me') }}</span>
                </label>
            </div>
            <div class="login_button_wrapper">
             <x-primary-button class="ml-3">
                    {{ __('translation.Login') }}
             </x-primary-button>
            </div>

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('translation.Forgot Your Password?') }}
                    </a>
                @endif

                
            </div>
            <div class="login_back">
            <a href="/">戻る </a>
            </div>
        </form>
</div>

        
    </x-auth-card>
   
</x-guest-layout>
