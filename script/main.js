document.onkeyup = function(e) {
      if (e.altKey && e.which == 76) {
        if (window.confirm('Login to CMS?')) {
          window.open('/cms', '_blank');
        }
     }
};
