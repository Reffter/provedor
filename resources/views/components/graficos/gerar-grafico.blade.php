@include('common._head')
<div>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
            // Create the data table.
            var data = google.visualization.arrayToDataTable([
                ['Assunto', 'Quantidade'],
                @php
                $index = 0;
                if(isset($data_inicio) and isset($data_fim)){
                    $ids = \App\Models\EstadoSolicitacao::whereBetween('data_inicio',  [$data_inicio, $data_fim])->get('solicitacao_id');
                    $solicitacoes = \App\Models\Solicitacao::whereIn('solicitacao_id', $ids)->get();
                    $ids_analitica = collect();
                    foreach($solicitacoes as $solicitacao){
                        if($solicitacao->analitica){
                            $ids_analitica->add($solicitacao->analitica->analitica_id);
                        }
                    }

                    foreach ($natureza->assunto as $assunto){
                        ++$index;
                        $label = strtolower(substr($natureza->descricao, 0, 1));
                        $count = \App\Models\AssuntoAnalitica::where('assunto_id', $assunto->assunto_id)->whereIn('analitica_id', $ids_analitica)->count();
                        echo "['". $label.$index."', $count],\n";
                    }
                }
                else{
                    foreach ($natureza->assunto as $assunto){
                        ++$index;
                        $label = strtolower(substr($natureza->descricao, 0, 1));
                        $count = \App\Models\AssuntoAnalitica::where('assunto_id', $assunto->assunto_id)->count();
                        echo "['". $label.$index."', $count],\n";
                    }
                }

                @endphp
                ],
                false); // 'false' means that the first row contains labels, not data.

            // Set chart options
            var options = {
                title: ' {{ $natureza->descricao }}',
                titleTextStyle: {
                    fontSize: 20,
                },
                width: 500,
                height: 500,
                legend: {
                    position: "none"
                },
                hAxis: {
                    title: 'Assunto',
                    titleTextStyle: {
                        fontSize: 13,
                        bold: true,
                        italic: false
                    },
                    format: '0'
                },
                vAxis: {
                    title: 'Quantidade',
                    titleTextStyle: {
                        fontSize: 13,
                        bold: true,
                        italic: false
                    },
                    format: '0'
                },
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</div>

<div id="chart_div"></div>
<div class="w3-container">
    <ul class="w3-ul">
        @php
        foreach ($natureza->assunto as $assunto){
            ++$index;
            $label = strtolower(substr($natureza->descricao, 0, 1));
            echo "<li>".$label.$index." | <b>".$assunto->subcategoria."</b>"." - ".$assunto->descricao."</li>";
        }
        @endphp
    </ul>
</div>
<div class="w3-row-padding w3-margin-top w3-center">
    <x-botao-tabela function="Voltar"></x-botao-tabela>
</div>

