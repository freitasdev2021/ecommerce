jQuery(function(){
    //INICIO DA PAGINA
    //DEFINE AS MASCARAS E TRATAM OS CAMPOS
    $(document).ready(function(){
       montaBotoes();
       montaTabela("Site")
    })

    //FUNÇÃO QUE MONTA BOTOES
    function montaBotoes(){
        $(".navLeads nav a").on("click",function(){
            montaTabela($(this).attr("data-page"))
        })
        //
        $("select[name=actions]").on("change",function(){
            if($(this).val() == "Exportar"){
                exportarXlsx($(this).attr("data-page"))
            }else if($(this).val() == "Limpar"){
                if(confirm("Deseja limpar a base de leads?")){
                    limparXlsx($(this).attr("data-page"))
                }
            }
        })
    }

    function montaTabela(tabela){
        $.ajax({
            url : "../configs/return.php",
            method : "POST",
            data : {
                action : "Leads",
                table : tabela
            }
        }).done(function(retorno){
            $("#"+tabela).html(retorno)
            $("select[name=actions]").attr("data-page",tabela)
        })
    }

    function exportarXlsx(table){
        window.location.href='../configs/exportExcel.php?action='+table
    }

    function limparXlsx(table){
        $.ajax({
            url : "../configs/return.php",
            method : "POST",
            data : {
                action : "apagaLeads",
                table : table
            }
        }).done(function(retorno){
           montaTabela(table)
        })
    }

})


