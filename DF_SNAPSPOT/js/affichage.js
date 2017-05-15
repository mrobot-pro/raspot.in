window.onload = (function () {
    var res = document.getElementsByClassName('resume');
    //ajout d'Ã©couteur quand on clique sur un Ã©lÃ©ment
    for (var i = 0; i < res.length; i++) {
        res[i].addEventListener('click', function (e) {
            var elem;
            //si le target est la vignette on rÃ©cupÃ¨re son parent
            if (e.target.className == 'vignette') {
                elem = e.target.parentElement;
            } else {
                elem = e.target;
            }
            //reset des elements deja agrandis
            resetRes();
            //on change la classe de l'Ã©lÃ©ment Ã  agrandir
            elem.className = 'visionne';
        })
    }

    function resetRes() {
        //on rÃ©cupÃ¨re les Ã©lÃ©ments agrandis et on leur redonne leur classe d'origine
        var res = document.getElementsByClassName('visionne');
        for (var i = 0; i < res.length; i++) {
            res[i].className = 'resume';
        }
    }
});