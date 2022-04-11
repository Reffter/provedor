<x-layout>
    <h2 class="w3-text w3-center">Nova Solicitação</h2>
    <div class="w3-responsive w3-section">
        <x-formulario-solicitacao />
        <h6 class="w3-text w3-margin-left"><i>Nota: Os campos marcados com <span style="color: red"><b>*</b></span> são
                de preenchimento obrigatório</i></h6>

        @if ($errors->any())
        <p class="w3-text w3-margin-left" style="color: red">É necessário corrigir os seguintes erros:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</x-layout>

{{-- <!-- Script para preenchimento da analítica -->
<script>
function mostrarAnalitica() {
  var analitica = document.getElementById("analitica");
  var botao = document.getElementById("botaoAnalitica");
  if (analitica.style.display === "none") {
    analitica.style.display = "block";
    botaoAnalitica.innerHTML = "Esconder Analítica"
  } else {
    analitica.style.display = "none";
    botaoAnalitica.innerHTML = "Adicionar Analítica"
    var formulario = document.getElementById("analiticaSolicitacao");
    formulario.reset();
  }
}
</script> --}}
