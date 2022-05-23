<x-layout>
    @if ($errors->any())
        <section class="w3-display-container w3-panel w3-red w3-round-large">
            <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>

            <h3 class="">Os seguintes erros devem ser corrigidos:</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </section>
    @endif
    <div class="w3-container">

        <form method="POST" action="/admin/contas/registar" style="width:50%;margin:auto;">
            <h2 class="w3-text w3-center">Registo de Utilizador</h2>
            @csrf

            <input class="w3-input w3-border w3-round w3-margin-bottom" type="text" name="primeiro_nome"
                id="primeiro_nome" placeholder="Nome" value="{{ old('primeiro_nome') }}" autocomplete="off" required>

            <input class="w3-input w3-border w3-round w3-margin-bottom" type="text" name="ultimo_nome" id="ultimo_nome"
                placeholder="Apelido" value="{{ old('ultimo_nome') }}" autocomplete="off" required>

            <input class="w3-input w3-border w3-round w3-margin-bottom" type="email" name="email" id="email"
                placeholder="Endereço de Email" autocomplete="off" required>

            <input class="w3-input w3-border w3-round w3-margin-bottom" type="email" name="email_confirmation"
                id="email_confirmation" placeholder="Confirme o Email" autocomplete="off" required>

            <button class="w3-btn w3-block w3-theme-l2 w3-round w3-section" type="submit">Registar Utilizador</button>
        </form>
</x-layout>
