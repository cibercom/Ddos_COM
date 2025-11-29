(function() {
    var metaElements = document.getElementsByTagName('meta'),
        i            = metaElements.length,
        el;
    
    while (i--) {
        el = metaElements[i];
        if (el.name.toLowerCase() == 'viewport') {
            el.parentNode.removeChild(el);
        }
    }
})();