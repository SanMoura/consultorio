<script>

    
    $(document).ready(function () {
        $('.cpf').mask('000.000.000-00', {reverse: true});
    
    });

  

    $('.cep').focusout(
    function () {
        var cep = $(this).val();

        axios.get("https://viacep.com.br/ws/"+cep+"/json/", {
            
        })
        .then(function (response) {
            $('.bairro').val(response.data['bairro']);
            $('.endereco').val(response.data['logradouro']);
            $('.complemento').val(response.data['complemento']);
            $('.cidade').val(response.data['localidade']);
            
        })
        .catch(function (error) {
            console.log(error);
        }); 
    });

    function dataAtualFormatada(){
    var data = new Date(),
        dia  = data.getDate().toString(),
        diaF = (dia.length == 1) ? '0'+dia : dia,
        mes  = (data.getMonth()+1).toString(), //+1 pois no getMonth Janeiro começa com zero.
        mesF = (mes.length == 1) ? '0'+mes : mes,
        anoF = data.getFullYear();
    return diaF+"/"+mesF+"/"+anoF;
}

    $('#inputPesquisaPaciente').keyup(
    function () 
    {
        var pesquisa = $(this).val();

        axios.post("{{route('listaPacientes')}}", {
            pesquisa: '%'+pesquisa+'%'
        })
        .then(function (response) {
          
            var resultado = response.data;
   
            if (resultado[0] != null){
            

            if (resultado[0].nm_paciente == null || pesquisa == '' || resultado[0].nm_paciente == ''){
                $('#retornoPacientes').html(
                    '<tr>'
                    +'<td class="text-center" colspan="2"><a href="{{route('pacientes.index')}}"' 
                    +'class="btn btn-sm btn-default">Cadastrar novo paciente</a></td>'
                    +'</tr>'
                );
            }else{
                $('#retornoPacientes').empty();
                for (let i = 0; i < resultado.length; i++) {
                    $('#retornoPacientes').append(
                    '<tr>'
                    +'<td>'+resultado[i].nm_paciente+'</td>'
                    +'<td>'+resultado[i].cpf+'</td>'
                    +'<td>'+dataAtualFormatada(resultado[i].dt_nascimento)+'</td>'
                    +'<td class="text-right"><a href="{{route('atendimento.create')}}?paciente='+resultado[i].id+'" class="btn btn-sm btn-default">Atender</a></td>'
                    +'</tr>'
                ); 
                }                 
            }
            }else(
                $('#retornoPacientes').html(
                    '<tr>'
                    +'<td class="text-center" colspan="2"><a href="{{route('pacientes.index')}}"' 
                    +'class="btn btn-sm btn-default">Cadastrar novo paciente</a></td>'
                    +'</tr>')
            )
        })
        .catch(function (error) {
            console.log(error);
        }); 
    });

    function nomePacienteConfirmaChegada(par) {
    var nomePac = document.getElementById(par.id).parentNode.parentNode.querySelector('.paciente').innerText;
        $('#retornoNomePacChegada').html(nomePac);
    }
    $('#btn_modal_horario').click(
    function () {
        var dia = $('#dt_agendamento').val();
        console.log(dia);
        axios.post("{{route('horariosAtendimento')}}", {
            dia: dia
        })
        .then(function (response) {
            //console.log(response.data);
            $('#retornoHorarios').html(response.data);
            $('#horarioSelecionadoTela').html(dia);
        })
    }
    );

    function selectHorario(e){
        let hora = $(e).attr('id');

        if (document.querySelector('.selectHora') != null){
            document.querySelector('.selectHora').removeAttribute('class');
        }
        $(e).addClass('selectHora');

        $('#horarioSelecionadoPost').val(hora);
        $('#horarioSelecionadoTela').val(hora);
        
    }
</script>