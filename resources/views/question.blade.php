@extends('layout.layout')
@section('content')
<h1 class="text-3xl font-bold mb-3 text-center">Preguntas Frecuentes</h1>
<div class="px-44 py-5">
  <div id="accordion-collapse" data-accordion="collapse">
    @foreach ($get_faq as $key => $item)
      <h2 id="accordion-collapse-heading-{{$key}}">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right hover:bg-slate-200 hover:rounded-md gap-3" data-accordion-target="#accordion-collapse-body-{{$key}}" aria-expanded="true" aria-controls="accordion-collapse-body-{{$key}}">
          <span>{{$item->ask}}</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
      </h2>
      <div id="accordion-collapse-body-{{$key}}" class="hidden rounded-md transition-all duration-300 ease-in-out" aria-labelledby="accordion-collapse-heading-{{$key}}">
        <div class="p-5">
          <p class="mb-2 text-gray-700">{{$item->answer}}</p>        
        </div>
      </div>
    @endforeach
    
  </div>
</div>
<h1 class="h-screen"></h1>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const accordionButtons = document.querySelectorAll('[data-accordion-target]');

    accordionButtons.forEach(button => {
        button.addEventListener('click', function () {
            const target = document.querySelector(this.getAttribute('data-accordion-target'));

            // Toggle hidden class
            if (target.classList.contains('hidden')) {
                target.classList.remove('hidden');                                                                                             
                this.setAttribute('aria-expanded', 'true');
            } else {
                target.classList.add('hidden');
                this.setAttribute('aria-expanded', 'false');
            }
        });
    });
});
</script>
@endsection
