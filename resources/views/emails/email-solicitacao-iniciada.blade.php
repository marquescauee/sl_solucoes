<x-mail::message>
# Olá, {{$nome}}! Esperamos que esteja bem!

Temos uma ótima notícia para você! Sua solicitação foi gerada!

Para visualizá-la, você deve:

<ol>
    <li>Copiar o código acima ou aqui: <strong>{{$codigo}}</strong></li>
    <li>Acessar o nosso site através do botão ou clicando o link: http://127.0.0.1:8000</li>
    <li>Acessar a página de status</li>
    <li>Informar o código e clicar em buscar.</li>
  </ol>

<x-mail::button :url="'http://127.0.0.1:8000/status'">
Acesse a página de status
</x-mail::button>

Atenciosamente,<br>
{{ config('app.name') }}
</x-mail::message>
