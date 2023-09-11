<x-layouts.app
    title="Crear nuevo Post"
    meta-description="Formulario para crear un nuevo post"
>

<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Create new Post</h1>

<!-- @dump($post->title)  -->
<form class="max-w-xl px-8 py-4 mx-auto bg-white dark:text-sky-500" action="{{ route('posts.store') }}" method="POST">
    @csrf

    @include('posts.form-fields')

<div class="flex items-center justify-between mt-4">
<a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-600 text-slate-400 focus:border-slate-500 focus:outline-none" href="{{ route('posts.index') }}">Back</a>

<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Send</button>

</div>
</form>




</x-layout.app>