$(function(){
    var historyListWrap = $('.history');
    if(localStorage.getItem("historyName")){
        var historyNameList = localStorage.getItem("historyName");
        var historyUrlList = localStorage.getItem("historyUrl").split(',');
        historyNameList = historyNameList.split(',');
        let set = Array.from(new Set(historyNameList));
        let set1 = Array.from(new Set(historyUrlList));
        set.forEach(function(item,index6){
            var gameA = $('<a target="_blank" href=""></a>');
            gameA.html(item);
            gameA.attr('href',set1[index6])
            gameA.appendTo(historyListWrap);
        });
    }
});
