@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card w-75">
                <div class="cabeca-card my-4" style="font-size: 30px">{{ __('Contate-nos ou nos faça uma visita!') }}</div>

                <div class="card-body">
                    <iframe style="border-radius: 20px; margin:auto;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3386.45794842163!2d-48.64621038433137!3d-27.504118750437776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95274c238acb5491%3A0xcf609780b95fa8f4!2sProinfo%20Solu%C3%A7%C3%B5es%20em%20Inform%C3%A1tica!5e1!3m2!1spt-BR!2sbr!4v1667234778520!5m2!1spt-BR!2sbr" width="900" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="card-footer mt-2">
                    {{__('Telefone: (48) 99988-7755')}}
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body {
        background-color: white;
    }
</style>
@endsection
