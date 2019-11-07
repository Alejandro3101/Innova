$(".nuevocodigodiv").height(0);
$(".tipoProyecto").change(function(){
    if($(this).val()=='Sin Recursos'){
        $(".nuevocodigodiv").addClass('invisible');
        $(".nuevocodigodiv").height(0);
    }else if($(this).val()=='Con Recursos'){
        $(".nuevocodigodiv").height(45.5);
        $(".nuevocodigodiv").removeClass('invisible');
    }
});