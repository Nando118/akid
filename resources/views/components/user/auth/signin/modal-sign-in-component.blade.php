<dialog id="modal_sign_in" class="modal">
    <div class="modal-box">
        <h3 class="text-lg text-center font-bold">Sign In</h3>
        <form action="{{ route('login.post') }}" method="POST" class="my-3">
            @csrf
            <label class="input input-bordered flex items-center gap-2 mb-3">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 16 16"
                  fill="currentColor"
                  class="h-4 w-4 opacity-70">
                  <path
                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                </svg>
                <input name="identifier" type="text" class="grow" placeholder="Username/Email" />
            </label>
            @error('identifier')
                <span class="text-red-500 text-sm mt-1 mb-2 block">{{ $message }}</span>
            @enderror
            <label class="input input-bordered flex items-center gap-2 mb-3">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 16 16"
                fill="currentColor"
                class="h-4 w-4 opacity-70">
                <path
                    fill-rule="evenodd"
                    d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                    clip-rule="evenodd" />
                </svg>
                <input name="password" type="password" class="grow" placeholder="Password" />
            </label>
            @error('password')
                <span class="text-red-500 text-sm mt-1 mb-2 block">{{ $message }}</span>
            @enderror
            <div class="flex justify-center mt-4">
                <button type="submit" class="btn btn-primary w-full">Sign In</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <p>Don't have an account yet? <button class="btn btn-link p-0 m-0 align-baseline" onclick="modal_sign_up.showModal(); modal_sign_in.close()">Sign Up Here</button></p>
        </div>
        <div class="text-center">
            <p>Forgot your password? <button type="button" class="btn btn-link p-0 m-0 align-baseline" onclick="modal_forgot_password.showModal(); modal_sign_in.close()">Reset Password</button></p>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
