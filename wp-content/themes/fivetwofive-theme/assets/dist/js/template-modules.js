"use strict";

(function ($, d) {
  'use strict';

  $(function () {
    var animatedModules = d.querySelectorAll('.ftf-module-hidden');

    if (animatedModules.length > 0) {
      animatedModules.forEach(function (animatedModule) {
        ScrollReveal().reveal('#' + animatedModule.id, JSON.parse(animatedModule.dataset.animation));
      });
    }
  });
})(jQuery, document);