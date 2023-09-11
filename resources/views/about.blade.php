<x-layouts.app
    title="Contact"
    meta-description="Contact meta description"
>
<h1 class="my-4 font-serif text-3xl text-center text-blue-600 dark:text-blue-500">Acerca de mi</h1>

@auth

    <div class="text-white mx-2">
        Autenticated User :
        {{ Auth::user()->name}}
        <br>
        Email User :
        {{ Auth::user()->email}}
    </div>

@endauth

</x-layouts.app>

