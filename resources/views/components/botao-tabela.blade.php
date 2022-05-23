@props(['function', 'id'])


@if(($function === "Consultar"))
<form>
    <button formaction="/solicitacao/{{ $id }}" class="w3-btn w3-green w3-round"> {!! $function !!} </button>
</form>
@endif

@if(($function === "Editar"))
<form>
    <button formaction="/solicitacao/editar/{{ $id }}" class="w3-btn w3-blue w3-round"> {!! $function !!} </button>
</form>
@endif

@if(($function === "Arquivar"))
<form>
    <button formaction="/solicitacao/arquivar/{{ $id }}" class="w3-btn w3-red w3-round"> {!! $function !!} </button>
</form>
@endif

@if(($function === "Desarquivar"))
<form>
    <button formaction="/solicitacao/desarquivar/{{ $id }}" class="w3-btn w3-red w3-round"> {!! $function !!} </button>
</form>
@endif

{{-- Administração --}}

@if(($function === "Editar Conta"))
<form>
    <button formaction="/admin/contas/editar/{{ $id }}" class="w3-btn w3-blue w3-round"> {!! $function !!} </button>
</form>
@endif

@if(($function === "Desativar Conta"))
<form>
    <button formaction="/admin/contas/desativar/{{ $id }}" class="w3-btn w3-red w3-round "> {!! $function !!} </button>
</form>
@endif

@if(($function === "Ativar Conta"))
<form>
    <button formaction="/admin/contas/ativar/{{ $id }}" class="w3-btn w3-green w3-round "> {!! $function !!} </button>
</form>
@endif