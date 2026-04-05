/**
 * Small UI helpers after Bootstrap removal (alerts, DaisyUI <dialog> triggers).
 */
(function () {
  'use strict';

  document.addEventListener('click', function (e) {
    var dismissAlert = e.target.closest('[data-dismiss="alert"]');
    if (dismissAlert) {
      e.preventDefault();
      var alertEl = dismissAlert.closest('.alert');
      if (alertEl) {
        alertEl.remove();
      }
      return;
    }

    var openModal = e.target.closest('[data-open-modal]');
    if (openModal) {
      e.preventDefault();
      var id = openModal.getAttribute('data-open-modal');
      if (id) {
        var dlg = document.getElementById(id);
        if (dlg && typeof dlg.showModal === 'function') {
          dlg.showModal();
        }
      }
      return;
    }

    var tab = e.target.closest('a[data-toggle="tab"]');
    if (tab) {
      e.preventDefault();
      var href = tab.getAttribute('href');
      if (!href || href.charAt(0) !== '#') return;
      var wrap = tab.closest('.nav-tabs-custom') || document.body;
      var ul = tab.closest('ul.nav-tabs');
      if (ul) {
        ul.querySelectorAll('li').forEach(function (li) {
          li.classList.remove('active');
        });
        var parentLi = tab.closest('li');
        if (parentLi) parentLi.classList.add('active');
      }
      wrap.querySelectorAll('.tab-pane').forEach(function (pane) {
        pane.classList.remove('active');
      });
      var pane = document.querySelector(href);
      if (pane) pane.classList.add('active');
    }
  });
})();
