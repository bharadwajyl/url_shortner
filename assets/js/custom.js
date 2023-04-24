$("form").on("submit", function(){
    event.preventDefault();
    
    $(this).children().children(".btn").css("pointer-events","none");
    $(this).children().children(".btn").html("Processing...");
    $(this).children().children(".btn").attr("tabindex","-1");
    
    //Ajax
    $.ajax({
        type:"POST",
        url:"root/",
        data:$(this).serialize() + "&FormType=shortenurl",
        success:function(result){
            $(this).children().children(".btn").css("pointer-events","auto");
            $(this).children().children(".btn").html("Shorten");
            $(this).children().children(".btn").attr("tabindex","1");
            result.match(/success/g) ? $('body').load(window.location.href + '#body') : alert(result);
        }
    });
});

function deletion(id){
    //Ajax
    $.ajax({
        type:"POST",
        url:"root/",
        data:"&FormType=urldeletion&id="+id,
        success:function(result){
            result.match(/success/g) ? setTimeout(function(){$('body').load(window.location.href + '#body')}, 1000) : alert(result);
        }
    });
}
