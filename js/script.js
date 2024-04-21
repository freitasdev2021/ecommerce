jQuery(function(){
    montaForms()
    $(".error-input").hide()

    $('input[type=name]').bind('input',function(){
        str = $(this).val().replace(/[^A-Za-z\u00C0-\u00FF\-\/\s]+/g,'');
        str = str.replace(/[\s{ \2 }]+/g,' ');
        if(str == " ")str = "";
        $(this).val( str );
    });

    $('input[type=email]').bind('input',function(){
        str = $(this).val().replace(/[^A-Za-z0-9\-\_\.\@]+/g,'');
        if(str == " ")str = "";
        $(this).val( str );
    });

})

function validaEmail(email){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
}

function formataTelefone(num){
    var str = "";
    num = num.replace(/[^0-9]+/g,'');
    num = num.substring(0,11);
    for(i=0;i < num.length; i++){
        if(i==0){str = str +'('};
        if(i==2){str = str +') '};
        if(num.length == 10)
            if(i==6){str = str +'-'};
        if(num.length == 11)
            if(i==7){str = str +'-'};
        str = str+ (num[i].toString());
    }
    return str;
}

function validaData(data){
    var regex = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
    return regex.test(data);
}

function montaForms(){
    $("#getLead").on("hide.bs.modal",function(){
        $(".input input").parents(".input").find(".error-input").hide()
        $(".input label").removeClass("text-danger")
        $(".input input").removeClass("border-danger")

        $(".select select").parents(".select").find(".error-input").hide()
        $(".select label").removeClass("text-danger")
        $(".select select").removeClass("border-danger")

        $(".textarea textarea").parents(".textarea").find(".error-input").hide()
        $(".textarea label").removeClass("text-danger")
        $(".textarea textarea").removeClass("border-danger")
    })

    $(".btPdp").on("click",function(){
        $("#getPdp").modal("show")
    })

    $(".bt_excluir").on("click",function(){
        alert("aa")
    })

    $(".bt_login").on("click",function(e){
        e.preventDefault()
        login()
    })

    $("#exportar").on("click",function(){
        exportarXlsx()
    })
    $("#limpar").on("click",function(){
        if(confirm("Deseja limpar a base de leads?")){
            limparLeads()
        }
    })

    $("input[name=telefone]").keyup(function(){
        $(this).val(formataTelefone($(this).val()))
    })

    $("input[name=nascimento]").keyup(function(){
        $(this).val(formataData($(this).val()))
    })

    $("#btnWhatsapp").on("click",function(){
        //alert($("#getLead").length)
        $("#getLead").modal("show")
    })

    $(".bt_enviar").on("click",function(e){
        e.preventDefault()
        enviarFormulario(".matriculese",false)
    })
    $(".bt_lead").on("click",function(e){
        e.preventDefault()
        enviarFormulario(".getLead",true)
    })
}

function enviarFormulario(form,zap){
    if(!validaCampos(form))return false
    //return false
    if(!zap){
        dadosCrm = {
            'nome'      : $("input[name=nome]",form).val(),
            'nascimento': $("input[name=nascimento]",form).val(),
            'cidade'    : $("input[name=cidade]",form).val(),
            'area'      : $("select[name=area]",form).val(),
            'email'     : $("input[name=email]",form).val(),
            'telefone'  : $("input[name=telefone]",form).val(),
            'Origem'    : $("input[name=Origem]",form).val(),
            'action'    : "setRegistro"
        }   
    }else{
        dadosCrm = {
            'nome'     : $("input[name=nome]",form).val(),
            'email'    : $("input[name=email]",form).val(),
            'telefone' : $("input[name=telefone]",form).val(),
            'Origem'    : $("input[name=Origem]",form).val(),
            'action'    : "setRegistro"
        }
    }
    // alert(dadosCrm.Origem)
    // return false
    $.ajax({
        method : "POST",
        url    : "./configs/return.php",
        beforeSend : function(){
            $(".carregamento").show()
        },
        data    : dadosCrm
    }).done(function(retorno){
        json = jQuery.parseJSON(retorno);
        if(json.mensagem == "Dados enviados com sucesso! aguarde o contato" || json.mensagem == "Houve um erro, contate a equipe!"){
            alert(json.mensagem)
        }
        if(json.mensagem == "Houve um erro de preenchimento"){
            if(json.erro_telefone){
                $(".input input[name=telefone]").parents(".input").find(".error-input").show().html(json.erro_telefone)
                $(".input input[name=telefone]").parent().find("label").addClass("text-danger")
                $(".input input[name=telefone]").addClass("border-danger")
            }
            if(json.erro_email){
                $(".input input[name=email]").parents(".input").find(".error-input").show().html(json.erro_email)
                $(".input input[name=email]").parent().find("label").addClass("text-danger")
                $(".input input[name=email]").addClass("border-danger")
            }
        }else{
            if(zap){
                window.location.href="https://api.whatsapp.com/send/?phone=31991303397&text=Ola!";
            }
        }
    })
}

function limparLeads(){
    window.location.href="../processamento/limparLeads.php";
}

function exportarXlsx(){
    window.location.href="../processamento/exportExcel.php";
}

function login(){
    $.ajax({
        method : "POST",
        url    : "../configs/return.php",
        data    : {
            action : "login",
            username : $("input[name=username]","#form_acesso").val(),
            password : $("input[name=password]","#form_acesso").val()
        }
    }).done(function(retorno){
        alert(retorno)
        if(retorno == "Logado"){
            window.location.href="index.php";
        }else{
            alert("Dados incorretos")
        }
    })
}

function formataData(num){
    var str = "";
    num = num.replace(/[^0-9]+/g,'');
    num = num.substring(0,8);
    for(i=0;i < num.length; i++){
        if(i==2){str = str +'/'};
        if(i==4){str = str +'/'};
        str = str+ (num[i].toString());
    }
    return str;
}

function validaCampos(form){
    var inputs = [];
    $(".input input").parents(".input").find(".error-input").hide()
    $(".input label").removeClass("text-danger")
    $(".input input").removeClass("border-danger")

    $(".select select").parents(".select").find(".error-input").hide()
    $(".select label").removeClass("text-danger")
    $(".select select").removeClass("border-danger")

    $(".textarea textarea").parents(".textarea").find(".error-input").hide()
    $(".textarea label").removeClass("text-danger")
    $(".textarea textarea").removeClass("border-danger")

    $(".input input",form).each(function(){
        if($(this).val().length < $(this).attr("minlength")){
            inputs.push($(this).attr("name"))
        }
        if($(this).attr("type") == 'email'){
            if(!validaEmail($(this).val())){
                inputs.push($(this).attr("name"))
            }
        }
        if($(this).attr("type") == 'date'){
            alert("aa")
            if(!validaData($(this).val())){
                inputs.push($(this).attr("name"))
            }
        }
    })

    $(".select select",form).each(function(){
        if($(this).val() == ""){
            inputs.push($(this).attr("name"))
        }
    })

    if(inputs.length > 0){
        $(inputs).each(function(index,val){
            $(".input input[name='"+val+"']",form).parents(".input").find(".error-input").show()
            $(".input input[name='"+val+"']",form).parents(".input").find("label").addClass("text-danger")
            $(".input input[name='"+val+"']",form).addClass("border-danger")

            $(".select select[name='"+val+"']",form).parents(".select ").find(".error-input").show()
            $(".select select[name='"+val+"']",form).parents(".select ").find("label").addClass("text-danger")
            $(".select select[name='"+val+"']",form).addClass("border-danger")

            $(".textarea textarea[name='"+val+"']",form).parents(".textarea ").find(".error-input").show()
            $(".textarea textarea[name='"+val+"']",form).parents(".textarea ").find("label").addClass("text-danger")
            $(".textarea textarea[name='"+val+"']",form).addClass("border-danger")

        })
        return false
    }
    return true
}