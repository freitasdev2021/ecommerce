

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


$("body").css("background-image","url('img/fundoBranco.jpg')");
$(".loader").hide();
$(".navegacao a").css("background","#234D9D");

$(".navegacao a").removeClass("bg-white text-dark");

$(".navegacao a").css("color","white");

$(".navegacao a").on("mouseover",function(){
    $(this).css("background","white");
    $(this).css("color","black");
})

$(".navegacao a").on("mouseout",function(){
    $(this).css("background","#234D9D");
    $(this).css("color","white");
})
//
$(".navegacao a").on("click",function(){
    var pagina = "views/"+$(this).attr("data-value");
    $(this).addClass('bg-white text-dark').siblings().removeClass('bg-white text-dark');
    //alert(pagina);
    paginacaoDados(pagina);
    
})
//FUNÇÃO QUE ACIONA O AJAX
function paginacaoDados(pagina){
    //AJAX QUE LISTAM OS DADOS
    $.ajax({
       beforeSend: function(){
        $(".loader").show();
        $(".conteudo").hide();
       },
       url: pagina,
       cache : false
       }).done(function(resultado){
        //alert(pagina)
           $('.conteudo').html(resultado);
           $(".loader").hide();
           $(".conteudo").show();
           $(".logoCentral").hide();
           $("body").css("background","white");
           //setTimeout(listarDados(),2000);

           $('input[type=name]').bind('input',function(){
            str = $(this).val().replace(/[^A-Za-z\u00C0-\u00FF\(\)\/\s]+/g,'');
            str = str.replace(/[\s{ \2 }]+/g,' ');
            if(str == " ")str = "";
            $(this).val( str );
        });

        $('input[type=email]').bind('input',function(){
            str = $(this).val().replace(/[^A-Za-z0-9\-\_\.\@]+/g,'');
            if(str == " ")str = "";
            $(this).val( str );
        });

       });  
       //
   }









