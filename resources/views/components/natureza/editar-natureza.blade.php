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

        <form method="POST" action="/admin/analitica/naturezas/editar" style="width:50%;margin:auto;">
            <h2 class="w3-text w3-center">Editar Natureza</h2>
            @csrf

            <!-- Enviar o ID da natureza no POST Request -->
            <input type="hidden" name="natureza_id" value="{{ $natureza->natureza_id }}">

            <input class="w3-input w3-border w3-round w3-margin-bottom" type="text" name="descricao"
                id="descricao" placeholder="Tipo de Natureza" value={{ $natureza->descricao }} autocomplete="off" required>

            <button class="w3-btn w3-block w3-theme-l2 w3-round w3-section" type="submit">Confirmar Alteração</button>
        </form>

</x-layout>
